<?php
/**
 * Created by PhpStorm.
 * User: sergey-pc
 * Date: 07.02.19
 * Time: 15:20
 */

namespace App\Filters;
use App\Filters\Product\VendorFilter;
use App\Filters\Product\GoalFilter;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class FiltersAbstract
{
    protected $request;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /** If passing filter parameter exists in defined filters list return query
     * @param Builder $builder
     * @return Builder
     */
    public function filter(Builder $builder)
    {
        foreach ($this->getFilters() as $filter => $value) {
           $this->resolveFilter($filter)->filter($builder, $value);
        }

    }

    /** Call filter class depends on filter key
     * @param $filter
     * @return mixed
     */
    protected function resolveFilter($filter)
    {
        return new $this->filters[$filter];
    }

    /** Return cleared array
     * @return array
     */
    protected function getFilters()
    {
        return $this->filterFilters($this->filters);
    }


    /** Method allows add new unregistered filters to existing
     * @param array $filters
     * @return array
     */
    public function add(array $filters)
    {
        return $this->filters = array_merge($this->filters,$filters);
    }

    /**
     * Check are input filters in defined list ($filters)
     * @param
     * @return array
     */
    protected function filterFilters($filters)
    {
        return array_filter($this->request->only(array_keys($this->filters)));
    }

}