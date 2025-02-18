<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;



class ProductController extends Controller
{
    use saveImage;
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.Addproduct');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    
        $photo =$this->SaveImage($request->photo,'Product');
        Product::create([
            'name'=> $request->name,
            'photo'=> $photo,
            'desc'=> $request->desc,
            'price'=> $request->price,
            'quantity'=> $request->quantity,
            ]);
            return redirect()->back()->with(['success' => 'Product Added successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        $view = Product::all();
        return view('Admin.All_product',compact('view'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
