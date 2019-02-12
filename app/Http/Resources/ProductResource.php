<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    protected $filters;
    protected $products;
    protected $pagitation;

    public function __construct(mixed $resource,$products,$filters)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->filters = $filters;
        $this->products = $products;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toJson($request)
    {
       return [
           'listing' => $this->products,
           'sidebar' => $this->filters,
       ];
    }
}
