<?php

namespace App\Http\Controllers\Api;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    //rigster

    public function  register(Request $request){
        //valid

        $errors  = Validator::make($request->all(),[
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "password" => "required|string|min:6|confirmed",

        ]);
        if($errors->fails()){
            return  response()->json([
                "error"=> $errors->errors()
            ],301);
        }


        //hash password
        $password = bcrypt($request->password);

        //create token

        $access_token = Str::random(100);
        //create user

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $password,
            "access_token" => $access_token,

        ]);

        //redirect msg

        return  response()->json([
            "msg"=> "Register success",
            "access_token"=> $access_token ,
        ],201);
    }


    //login

    public function login(Request $request){

        $errors  = Validator::make($request->all(),[
            "email" => "required|email|max:255",
            "password" => "required|string|min:6",

        ]);
        if($errors->fails()){
            return  response()->json([
                "error"=> $errors->errors()
            ],301);
        }

        //check email

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return  response()->json([
                "msg"=> "email not correct ",
            ],301);
        }
        //password hashed
        $valid =Hash::check($request->password ,$user->password);

        if($valid ==  true){
        //update  access token
        $access_token = Str::random(100);

            $user->update([
                "access_token" => $access_token
            ]);
            return  response()->json([
                "msg"=> "you logined success",
                "access_token"=> $access_token ,
            ],201);

        }else{
            return  response()->json([
                "msg"=> "cridantial not correct ",
            ],301);
        }

        //login  access token msg


    }

    //logout

    public function logout(Request $request){

        $access_token = $request->header("access_token");
        if($access_token !== null){
            $user = User::where("access_token",$access_token)->first();
            if($user){
                //update access token
                $user->update([
                    "access_token"=> null,
                ]);
                return  response()->json([
                    "msg"=> "you logout  success",
                ],200);
            }else{
                return  response()->json([
                    "msg"=> "access token not correct",
                ],404);
            }
        }else{
            return  response()->json([
                "msg"=> "access token not correct",
            ],404);
        }
    }
}
