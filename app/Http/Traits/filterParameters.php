<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 28.01.19
 * Time: 18:31
 */

namespace App\Http\Traits;


trait filterParameters
{

    /**
     * @param $allProducts
     * Returns filters values depends on chosen category and user input(filter)
     * @return array
     */
    public function filterParameters($allProducts) :array
    {
        {
            // Load vendors filter
            $vendors = $allProducts->sortBy('vendor')->groupBy('vendor')->map(function ($vendor) {
                return $vendor->count();
            });

            // Load attributes filter (Taste or Size)
            $attributesArrays = $allProducts->where('attributes', '!=', null)->sortBy('attributes')
                ->groupBy('attributes')->keys()->map(function ($attribute) {
                    $attributeArray = json_decode($attribute, true);
                    return array_combine($attributeArray['Вкус'], $attributeArray['quantity']);
                });
            $tastes = [];
            for ($i = 0; $i < count($attributesArrays); $i++) {
                $keys = array_keys($attributesArrays[$i]);
                for ($k = 0; $k < count($attributesArrays[$i]); $k++) {
                    if (!array_key_exists($keys[$k], $tastes)) {
                        $tastes[$keys[$k]] = 1;
                    } else {
                        $tastes[$keys[$k]] += 1;
                    }
                }
            }

            //Load max / min prices filter
            $min = $allProducts->where('price', $allProducts->min('price'))->first();
            $max = $allProducts->where('price', $allProducts->max('price'))->first();

            //Load goals filter
            $goals = $allProducts->where('goals', '!=', null)->map(function ($item) {
                $goalArray = json_decode($item->goals);
                return $goalArray;
            });
            $allGoals = [];
            foreach ($goals as $goalsElement) {
                foreach ($goalsElement as $item => $value) {
                    if (!array_key_exists($value, $allGoals)) {
                        $allGoals[$value] = 1;
                    } else {
                        $allGoals[$value] += 1;
                    }
                }
            }

            //Load ingredients filser
            $ingredients = $allProducts->where('ingredients', '!=', null)->map(function ($item) {
                $attributeArray = json_decode($item->ingredients);
                return $attributeArray;
            });
            $allIngredients = [];
            foreach ($ingredients as $ingredientElement) {
                foreach ($ingredientElement as $item => $value) {
                    if (!array_key_exists($value, $allIngredients)) {
                        $allIngredients[$value] = 1;
                    } else {
                        $allIngredients[$value] += 1;
                    }
                }
            }
        }

        return  [
            'vendors' => $vendors,
            'attributesArrays' => $attributesArrays,
            'tastes' => $tastes,
            'min' => $min,
            'max' => $max,
            'allGoals' => $allGoals,
            'allIngredients' => $allIngredients
        ];
    }

}