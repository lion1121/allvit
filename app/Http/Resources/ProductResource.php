<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    protected $selectedFilters;
    protected $categoryFilters;


    public function __construct($resource, $selectedFilters, $categoryFilters)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->selectedFilters = $selectedFilters;
        $this->categoryFilters = $categoryFilters;

    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->selectedFilters,
            $this->categoryFilters,
            $this->resource
        ];
    }

    public function with($request)
    {
        return [
            $this->selectedFilters,
            $this->categoryFilters,
            $this->resource
        ];
    }
}
