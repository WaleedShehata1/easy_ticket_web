<?php
namespace App\Http\Controllers\Api;

trait ApiResponeTrait
{
    public function apirespone($data= null,$message = null,$status = null,$statu = null){

        $array = [
            'data'=>$data,
            'message'=>$message,
            'status'=>$status,
            'statu'=>$statu,
            
        ];
        return response($array,$status);


    }
}