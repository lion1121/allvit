<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    protected $filters;


    public function __construct($resource,$filters)
    {
        parent::__construct($resource);
        $this->resource = $resource;
        $this->filters = $filters;

    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->filters,
            $this->resource
        ];
    }

    public function with($request)
    {
        return [
            $this->filters,
            $this->resource
        ];
    }
}
