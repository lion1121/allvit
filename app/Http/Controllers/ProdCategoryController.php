<?php

namespace App\Http\Controllers;

use App\ProdCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ProdCategoryController extends Controller
{

    public function getAllCategories(Request $request)
    {
        $category = DB::table('prod_categories')->where('name', $request->body)
            ->orWhere('name', 'like', '%' . $request->category . '%')->get();
        echo json_encode($category);
    }

    public function getCategoryByPromocodeId(Request $request)
    {
        $category = DB::table('prod_categories')->where('name', $request->body)
            ->orWhere('name', 'like', '%' . $request->category . '%')->get();
        echo json_encode($category);
    }

}
