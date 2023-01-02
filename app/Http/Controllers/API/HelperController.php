<?php


namespace App\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;

class HelperController extends BaseController
{

    public function sendResponseSuccess($response, $status="success", $code=200){
        return response()->json([
            "data" => $response,
            "status" => $status,
            "code" =>$code
        ], $code);
    }

    public function sendResponseFailer($message, $status="Failed", $code=500){
        return response()->json([
            "message" => $message,
            "status" => $status,
            "code" =>$code
        ], $code);
    }
}
