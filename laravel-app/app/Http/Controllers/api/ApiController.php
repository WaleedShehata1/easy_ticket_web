<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    function login(Request $request)
    {
        $user= User::where('national_ID', $request->national_ID)->first();
        // print_r($data);
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response([
                    'massage' => 'the national_ID or password is invalid',
                    'status'=> true
                ], 404);
            }
        
            $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token,
                'massage' => 'succeeded',
                'status'=> true
            ];
        
            return response($response, 201);
    }


    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'first_Name' => 'required |string | max:10',
            'last_Name' => 'required |string | max:10',
            'national_ID' => 'required | integer | digits_between:14,14 | unique:passengers,national_ID',
            'email' => 'required |string |email |max:255 |unique:passengers,email',
            'gender' => 'required | string |max:10',
            'password' => 'required',
            'health_status' => 'required | string | max:30',
            'date_of_birth' => 'required | string | max:30',
            'phone' => 'required|string| digits_between:11,11',
            'profession' => 'required|string',
        ]);

        if ($validator->fails()){

            return response(['massege' => $validator->errors(),'status'=>'false'],404);
        }
        $user=User::create([
            'national_ID'=>$request ->national_ID,
            'first_Name'=>$request ->first_Name,
            'last_Name'=>$request ->last_Name,
            'gender'=>$request ->gender,
            'password'=>Hash::make($request ->password),
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'date_of_birth'=>$request ->date_of_birth,
            'phone'=> $request ->phone,
            'profession'=> $request ->profession
        ]);
        
        if($user){

            $response = [
                'data' => $user,
                'massage' => 'succeeded',
                'status'=> true
            ];

            return response($response, 200);
        }
        return response(['massage' => 'The Post Not Save','status'=>'false'],404);
                                
    }


    public function update(Request $request,$id){
        $user = User::find($id);
        if(!$user){
            $response = [
                'date'=> null ,
                'massage' => 'The updata invalid',
                'status'=>'false',
            ];
            return response($response,404);
        }

        $user->update([
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'profession'=> $request ->profession,
            'phone'=> $request ->phone,
        ]);
        if($user){

            $response = [
                'date'=>$user ,
                'massage' => 'The updata succeeded',
                'status'=>'true',
            ];

            return response($response,404);
                                    
            }
        }


    // public function update(Request $request, $id)
    // {
    //     $product = User::find($id);
    //     $product->update([
    //         'email'=>$request ->email,
    //         'health_status'=>$request ->health_status,
    //         'profession'=> $request ->profession,
    //         'phone'=> $request ->phone,
    //     ]);
    //     return $product;
    // }


        public function logout(Request $request) {
            auth()->user()->tokens()->delete();
    
            return response( [
                'message' => 'succeeded',
                'status'=> true
            ],200);
        }



    public function show(Request $request,$id){
        $user = User::find($id);
        if(!$user){
            $response = [
                'date'=> null ,
                'massage' => 'The user is invalid',
                'status'=>'false',
            ];
            return response($response,200);
        }

        if($user){
            $response = [
                'date'=>$user ,
                'massage' => 'The user is succeeded',
                'status'=>'true',
            ];

            return response($response,404);
                                    
            }
    }

}
