<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=product::all();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         /*
       $table->id();
            $table->string('Name');
            $table->string('Category');
            $table->string('Price');
            $table->timestamps();
       */
    
        $products=new product();
        $products->Name=$request->Nombre;
        $products->Category=$request->Categoria;
        $products->Price=$request->Precio;

        $products->save();
        return response()->json($products);

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        $products=product :: find($product);
        if($products != null){
            return response()->json($products);
        }else{
            $data=["message"=>"cliente no existe"];
            return response()->json($data);
        }
    }

    public function getbyid(string $id){
        $products=product::where('id',$id)->get();
        if(count($products)==1){
            return $products;
        }else{
            return 'false';
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
       /*
        $table->id();
            $table->string('Name');
            $table->string('Category');
            $table->string('Price');
            $table->timestamps();
       */
        $product->Name=$request->Nombre;
        $product->Category=$request->Categoria;
        $product->Price=$request->Precio;

        $product->save();
        $data=[
            "message"=>"client update successfully",
            "client"=>"$product"
        ];

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $products=product ::find($product->id);
        $products->delete();
        $data=["message"=>"client delete successfully"];
        return response()->json($data);
    }
}
