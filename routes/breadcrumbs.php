<?php

// Home
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
$trail->push('Главная', route('home'));
});


Breadcrumbs::for('category', function ($trail, $category) {
    if ($category->parent) {
        $trail->parent('category', $category->parent);
    } else {
        $trail->parent('home');
    }
    $trail->push($category->name, route('category', $category->slug));
});

Breadcrumbs::for('product', function ($trail, $product) {
    $category = $product->categories()->first();
    $trail->parent('category', $category);
    $trail->push($product->name, route('product', $product->slug));
});