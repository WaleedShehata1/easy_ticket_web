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
        return $this->apirespone(data: null, message:'This Post Not Found',status:400);
    }
    public function store(Request $request){
        //  $post = Passenger::create($request->all());
        // $validated=validator::make($request->all(),
        // [
        //    'first_Name' => ['required', 'string', 'max:10'],
        //     'last_Name' => ['required', 'string', 'max:10'],
        //     'national_ID' => ['required', 'integer','digits_between:14,14','unique:passengers,national_ID'],
        //     'email' => ['required', 'string', 'email', 'max:255','unique:passengers,email'],
        //     'gender' => ['required', 'string', 'max:10'],
        //     'password' => ['required'],
        //     'health_status' => ['required', 'string', 'max:30'],
        //     'date_of_birth' => ['required', 'string', 'max:30'],
        //     'phone' => ['required', 'integer','digits_between:11,11'],
        //     'profession' => ['required', 'string'],
        // ],[
            
        // ]);
        // if($validated->fails()){
        //     return json_decode($validated);
        // }
        $validator = Validator::make($request->all(), [
            'first_Name' => 'required |string | max:10',
            'last_Name' => 'required |string | max:10',
            'national_ID' => 'required | integer | digits_between:14,14 | unique:passengers,national_ID',
            'email' => 'required |string |email |max:255 |unique:passengers,email',
            'gender' => 'required | string |max:10',
            'password' => 'required',
            'health_status' => 'required | string | max:30',
            'date_of_birth' => 'required | string | max:30',
            'phone' => 'required|integer| digits_between:11,11',
            'profession' => 'required|string',
        ]);

        if ($validator->fails()){

            return response()->json(['massege' => $validator->errors(),'status'=>404],404);
            // return $this->apirespone($validator->errors(),);
        }
    
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
            'profession'=>$request ->profession,
        ]);
        if($post){
            return $this->apirespone($post, message:'Done',status:201);
        }
        return $this->apirespone(data: null , message:'The Post Not Save',status:404);
    }
    
    public function update(Request $request,$id){
        $post = Passenger::find($id);
        if(!$post){
            return $this->apirespone(data: null, message:'The Post Not found',status:404);
        }
        $post->update($request->all());
        if($post){
            return $this->apirespone($post, message:'The Post updated',status:201);
        }
        }
        public function destroy($id){
            $post = Passenger::find($id);
            if(!$post){
                return $this->apirespone(data: null, message:'The Post Not found',status:404);
            }
            $post->delete($id);
            if($post){
                return $this->apirespone(data: null, message:'The Post deleted',status:200);
            }
        }



         /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    /**
     * Register a User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
    	$validator = Validator::make($request->all(), [
            'national_ID' => 'required|integer',
            'password' => 'required|max:20',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        if (! $token = auth()->attempt($validator->validated())) {
            return response()->json(['error' => 'national_ID or password is invalid','status'=>'404'], 401);
        }

        return $this->createNewToken($token);
    }
     

/*
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() *60,
            'user' => auth()->user()
        ]);
    }






}



