<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdCategoryController extends Controller
{
    //
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
