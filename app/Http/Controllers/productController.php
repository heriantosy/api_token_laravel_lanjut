<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class productController extends Controller
{

    public function index()
    {
        $data = product::orderBy('name', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'data ditemukan',
            'data' => $data
        ], 200);
    }

   
    public function store(Request $request)
    {
        $data = new product();
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()){
            return response()->json([
                'status' => false,
                'message' => 'gagal memasukkan data',
                'data' => $data
            ], 401);
        }

        $data->name = $request->name;
        $data->price = $request->price;
        $data->description = $request->description;
        $data->save();

        return response()->json([
            'status' => true,
            'message' => 'berhasil memasukkan data'
        ], 200);


    }

    public function show(product $product)
    {
        //
    }

  
    public function update(Request $request, product $product)
    {
        //
    }

    public function destroy(product $product)
    {
        //
    }
}
