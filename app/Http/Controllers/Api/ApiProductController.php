<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Product = Product::all();
        if ($Product) {
            # code...
            return ProductResource::collection($Product);
        }else {
            # code...
            return response()->json(["msg"=>"data not fuond"],404);
        }

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
       $val= Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'photo' => 'required|image|mimes:png,jpg,jpeg',
            'desc' => 'required|string',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
        ]);
        if($val->fails()){
            return response()->json(["error"=>$val->errors()],404);
        }
        $photo=Storage::putFile("products",$request->photo);
        $product=Product::create([
            'name'=>$request->name,
            'photo'=>$photo,
            'desc'=>$request->desc,
            'quantity'=>$request->quantity,
            'price'=>$request->price,
        ]);
        if ($product) {
            return response()->json(["Product"=>$product , 'msg'=>'the Product added successfully'],201);

        }else{
            return response()->json(["error"=>$product->errors()],500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $Product = Product::find($id);
        if ($Product) {
            # code...
            return new ProductResource($Product);
        }else {
            # code...
            return response()->json(["msg"=>"data not fuond"],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
    
    
            $product = Product::find($id);
            if($product == null){
                //object json
                return  response()->json([
                    "msg"=> "Product  not found"
                ],404);
            }
    
            $errors  = Validator::make($request->all(),[
                "name" => "required|string|max:255",
                "desc" => "required|string",
                "price" => "required|numeric",
                "photo" => "required|image|mimes:png,jpg,jpeg",
                "quantity" => "required|numeric",
    
            ]);
    
            if($errors->fails()){
                return  response()->json([
                    "error"=> $errors->errors()
                ],301);
            }
    

    
            if($request->hasFile("photo")){
                Storage::delete($request->photo);
                $image = Storage::putFile("products",$request->photo);
    
            }else{
                $image = $product->photo;
            }
            //update
            $product->update([
                "name" => $request->name,
                "desc" => $request->desc,
                "price" => $request->price,
                "photo" => $image,
                "quantity" => $request->quantity,
    
            ]);
    
            //reirectr
    
            return  response()->json([
                "msg"=> "product updated success",
                "product"=> new ProductResource($product) ,
            ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        if ($product) {
            # code...
            
        Storage::delete($product->photo);
        $product->delete();
        return response()->json(["Product"=>$product , 'msg'=>'the Product deleted successfully'],201);
        }else {
            # code...
            return response()->json(["msg"=>"data not fuond"],404);
        }
    }
}
