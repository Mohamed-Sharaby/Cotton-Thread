<?php
namespace App\Http\Traits;
trait ApiResponse
{
    public function apiResponse($data,$status = 200){
        if($status >= 200 && $status<=299){
            $res = ['status'=>true,];
        }else{
            $res = ['status'=>false,];
        }

        if ($status >= 200 && $status<=299){
            $res['data'] = $data;
        }else{
            $res['message'] = $data;
        }
        return response()->json($res,$status);
    }
}