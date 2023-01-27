<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('welcome', compact('products'));
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
        $request->validate(
            [
                'name'=> 'required|unique:products',
                'price'=> 'required',
            ],
            [
                'name.required' => 'Name Is Required',
                'name.unique' => 'Product Already Exits',
                'price.required' => 'Product is Required',

            ]
        );
        $product = new Product();
        $product->name= $request->name;
        $product->price= $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
            'msg' => 'Product Added successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // return $request;
        $request->validate(
            [
                'name'=> 'required|unique:products,name,'.$id,
                'price'=> 'required',
            ],
            [
                'name.required' => 'Name Is Required',
                'name.unique' => 'Product Already Exits',
                'price.required' => 'Product is Required',

            ]
        );
        $product =  Product::find($id);
        $product->name= $request->name;
        $product->price= $request->price;
        $product->save();
        return response()->json([
            'status' => 'success',
            'msg' => 'Product update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Product deleted successfully'
        ]);
    }
  
    public function pagination(Request $request)
    {
        $products = Product::latest()->paginate(5);
        return view('pagination_products', compact('products'))->render();
    }
    
}
