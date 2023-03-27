<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return "Hello World";
        return Product::getProduct();
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
        //

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required'
        ]);

        $product = new Product();
        $product->setProduct($request);
        $product->save();

        return "Saved";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $updateProduct = Product::find($request['id']);

        $updateProduct->setProduct($request);
        $updateProduct->save();

        return "Update Successful...!";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Product::destroy($id);
    }

    public function search($query){
        // return $query;
        return Product::where('name', 'like', '%'.$query.'%')->get();
    }
}
