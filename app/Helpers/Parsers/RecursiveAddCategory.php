<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 11.01.19
 * Time: 14:35
 */

namespace App\Helpers\Parsers;


use App\ProdCategory;

trait RecursiveAddCategory
{
    public function addCategory($categoryElement, $parentId = null)
    {
            if ($categoryElement->count() === 0) {
                $this->addCategory($categoryElement);
            } else {
                $input['inner_id'] = $categoryElement->Ид;
                $input['name'] = $categoryElement->Наименование;
                $input['description'] = $categoryElement->Наименование;
                $input['parent_id'] = $parentId;

                $category = ProdCategory::updateOrCreate(['inner_id' => $input['inner_id']], $input);
                $catId = $category->id;

                foreach ($categoryElement->ГруппыСайта->ГруппаСайта as $subElement) {
                    echo '<pre>';
                    print_r($subElement);
                    echo '</pre>';

                    $this->addCategory($subElement, $catId);
                }
            }
        }

}