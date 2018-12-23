<?php

namespace App\Http\Controllers\Voyager;

use App\Promocode;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $promocodes = Promocode::all();
        return view('vendor.voyager.promocode.index', compact(['promocodes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $validator =  Validator::make($request->all(),[
                'name' => 'required|min:4|max:15',
                'quantity' => 'required|min:1|max:10',
                'started' => 'required|date',
                'finished' => 'required|date',
                'categories' => 'min:1|max:10',
                'products' => 'min:1|max:10',
            ]);
            if($validator->fails()){
                return response()->json(['errors'=>$validator->errors()->all()]);
            } else {
                $input = [];
                $input['name'] = $request->name;
                $input['quantity'] = $request->quantity;
                $input['started_at'] = date('Y.m.d', strtotime($request->started) );
                $input['finished_at'] = date('Y.m.d', strtotime($request->finished) );
                $input['summ'] = $request->summValue;
                $promocode = Promocode::create($input);

                $promocodeId = $promocode->id;
                $lastPromocode = Promocode::findOrFail($promocodeId);
                //Clear array from non important values
                foreach ($request->categories as $category){
                    $lastPromocode->prodCategories()->attach(['promocode_id' => $promocodeId], ['prod_category_id' => $category['id']]);
                }

            }
            return response()->json(['success'=>'Record is successfully added']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
