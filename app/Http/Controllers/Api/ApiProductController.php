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
        //
        $val= Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'photo' => 'image|mimes:png,jpg,jpeg',
            'desc' => 'required|string',
            'price'=> 'required|numeric',
            'quantity'=> 'required|numeric',
        ]);
        if($val->fails()){
            return response()->json(["error"=>$val->errors()],404);
        }
        $Product = Product::find($id);
        if ($Product) {
            # code...
            $new = $request->photo;
            if($new == null){
                $Product->update([            
                'name'=>$request->name,
                'desc'=>$request->desc,
                'quantity'=>$request->quantity,
                'price'=>$request->price
            ]);
            return response()->json(["Product"=>$Product , 'msg'=>'the Product added successfully'],201);
            }else{
                Storage::delete($Product->photo);
                $photo =$data['photo']=Storage::putFile("products",$request->photo);
                $Product->update( [  
                'name'=>$request->name,
                'photo'=>$photo,
                'desc'=>$request->desc,
                'quantity'=>$request->quantity,
                'price'=>$request->price]);
                return response()->json(["Product"=>$Product , 'msg'=>'the Product added successfully'],201);
            }
        }else {
            # code...
            return response()->json(["msg"=>"data not fuond"],404);
        }
        
        
        
        
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
