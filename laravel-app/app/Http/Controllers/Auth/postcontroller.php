<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bus;

class postcontroller extends Controller
{
    use ApiResponseTrait;
    #############Bus#############
    public function index(){
         $post=Bus::get();                    // هنا عشان يعرض ليا البيانات اللي جوة الداتا بيز
        // $array =[
        //     'data'=>$post,
        //     'message'=>'ok',
        //     'status'=>200,
        // ];
        // return response($array,status:200);
        // return response($post,status:200);   //  apiعشان هنا شغال في  view بدلا من response استعملت 
            return $this->apiResponse($post,message:'ok',status:200);
    }
        public function show($id){
            $post =Bus::find($id);
            // if($post){
            //     return $this->apiResponse($post,message:'The Post Save',status:200);
            // }
            // return $this->apiResponse(null,message:'The Post Not Found',status:404);
        }
        public function store(Request $request){
            // $post = Bus::create($request->all());
            Bus::create([
                'bus_number'=>$request ->bus_number,
                'position'=>$request ->position,
                'bus_line_id'=>$request ->bus_line_id,
               
            ]);
        
        //     if($post){
        //     return $this->apiResponse($post,message:'The Post Save',status:200);
        //  }
        //     return $this->apiResponse(data:null,message:'The Post Not Found',status:404);
        // }
        }
    }
    