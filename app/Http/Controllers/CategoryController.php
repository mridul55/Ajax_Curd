<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('category.index', compact('categories'));
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
        //return $request->all();
        $request->validate(
            [
                'name'=> 'required|unique:categories',
                'band'=> 'required',
            ],
            [
                'name.required' => 'Name Is Required',
                'name.unique' => 'Name Already Exits',
                'band.required' => 'Band is Required',

            ]
        );
        $category = new Category();
        $category->name= $request->name;
        $category->band= $request->band;
        $category->save();
        return response()->json([
            'status' => 'success',
            'msg' => ' Added successfully'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //return $request;
        $request->validate(
            [
                'name'=> 'required|unique:categories,name,'.$category->id,
                'band'=> 'required',
            ],
            [
                'name.required' => 'Name Is Required',
                'name.unique' => 'Name Already Exits',
                'band.required' => 'Band is Required',

            ]
        );
        //$category =  Category::find($id);
        $category->name= $request->name;
        $category->band= $request->band;
        $category->save();
        return response()->json([
            'status' => 'success',
            'msg' => 'Update successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'Deleted successfully'
        ]);
    }

    public function pagination(Request $request)
    {
        $categories = Category::latest()->paginate(5);
        return view('pagination_category.index', compact('categories'))->render();
    }
}
