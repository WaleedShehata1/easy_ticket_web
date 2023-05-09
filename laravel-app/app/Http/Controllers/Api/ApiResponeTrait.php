<?php
namespace App\Http\Controllers\Api;

trait ApiResponeTrait
{
    public function apirespone($data= null,$message = null,$status = null){

        $array = [
            'data'=>$data,
            'message'=>$message,
            'status'=>$status,
            
        ];
        return response($array,$status);


    }
}