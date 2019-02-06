<?php
/**
 * Created by PhpStorm.
 * User: arsen
 * Date: 11/25/2018
 * Time: 5:06 PM
 */

namespace CommerceML\Constructors;


class Products extends \CommerceML\Implementation\Products
{
    /**
     * Product constructor.
     * @param $products
     */
    public function __construct (array $products)
    {
        $this->products = $products;
    }
}