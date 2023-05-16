<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Passenger;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class postcontroller extends Controller
{
    use ApiResponeTrait;

    public function index(){
        $posts = Passenger::get();
        return $this->apirespone($posts, message:'ok',status:200);
    }
    public function show($id){
        $post = Passenger::find($id);
        if($post){
            return $this->apirespone($post, message:'ok',status:200);
        }
        return $this->apirespone(data: null, message:'This Post Not Found',status:401);
    }
    public function store(Request $request){
        //  $post = Passenger::create($request->all());
        $post=Passenger::create([
            'national_ID'=>$request ->national_ID,
            'first_Name'=>$request ->first_Name,
            'last_Name'=>$request ->last_Name,
            'gender'=>$request ->gender,
            'password'=>Hash::make($request ->password),
            'email'=>$request ->email,
            'health_status'=>$request ->health_status,
            'date_of_birth'=>$request ->date_of_birth,
            'phone'=> $request ->phone
        ]);
        if($post){
            return $this->apirespone($post, message:'The Post Saved',status:200);
        }
        return $this->apirespone(data: null, message:'The Post Not Save',status:401);
    }
    public function update(Request $request,$id){
        $post = Passenger::find($id);
        if(!$post){
            return $this->apirespone(data: null, message:'The Post Not found',status:401);
        }
        $post->update($request->all());
        if($post){
            return $this->apirespone($post, message:'The Post updated',status:200);
        }
        }
        public function destroy($id){
            $post = Passenger::find($id);
            if(!$post){
                return $this->apirespone(data: null, message:'The Post Not found',status:401);
            }
            $post->delete($id);
            if($post){
                return $this->apirespone(data: null, message:'The Post deleted',status:200);
            }
        }
}



