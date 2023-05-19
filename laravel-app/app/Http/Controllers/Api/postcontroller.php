<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
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
        $post = User::find($id);
        if($post){
            return $this->apirespone($post, message:'done',status:200,statu:'true');
        }
        return $this->apirespone(data: null, message:'This Post Not Found',status:401,statu:'false');
    }


    public function store(Request $request){
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

            return response()->json(['massege' => $validator->errors(),'status'=>'false'],404);
            // return $this->apirespone($validator->errors(),);
        }
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
            'phone'=> $request ->phone,
            'profession'=> $request ->profession
        ]);
        
        if($post){
            return $this->apirespone($post, message:'Done',status:200,statu:'true');
            // return response()->json([$post,'massege' =>'Done','status'=>'true'],200);
        }
        return $this->apirespone(data: null, message:'The Post Not Save',status:400,statu:'false');
    }




    public function update(Request $request,$id){
        $post = User::find($id);
        if(!$post){
            return $this->apirespone(data: null, message:'The Post Not found',status:401,statu:'false');
        }




        $post->update($request->all());
        if($post){
            return $this->apirespone($post, message:'The Post updated',status:200,statu:'true');
        }
        }





        public function destroy($id){
            $post = User::find($id);
            if(!$post){
                return $this->apirespone(data: null, message:'The Post Not found',status:401,statu:'false');
            }
            $post->delete($id);
            if($post){
                return $this->apirespone(data: null, message:'The Post deleted',status:200,statu:'true');
            }
        }
}



