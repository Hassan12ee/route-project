<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->all();
        
        // $photo =$this->SaveImage($request->photo,'Product');
        $data['photo']=Storage::putFile("products",$request->photo);
       
        $product =Product::create($data);
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
    public function edit($id)
    {
        //
        $view = Product::find($id);
       
        return view('Admin.EditProdect',compact('view'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request,$id)
    {
        //
        $data =$request->validated();
    
        $Product = Product::find($id);
       
        
        $new = $request->photo;
        
        if($new == null){
            $Product->update($data);
            return redirect(route('allproduct'))->with(['success','Updated successfully'])  ;
        }else{
            Storage::delete($Product->photo);
            $data['photo']=Storage::putFile("products",$request->photo);
            $Product->update($data);
            return redirect(route('allproduct'))->with(['success','Updated successfully'])  ;
        }
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        
        $product =Product::findOrFail($id);
        Storage::delete($product->photo);
        $product->delete();
        return redirect()->back()->with(['success','Deleted successfully']);
    }
}
