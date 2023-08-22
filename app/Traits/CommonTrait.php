<?php 

namespace App\Traits;

trait CommonTrait {

    public function successResponseArr($message, $data) : Array {
        return [
            'status' => true,
            'message' => $message,
            'data' => $data
        ];
    }

    public function errorResponseArr($message) : Array {
        return [
            'status' => false,
            'message' => $message
        ];
    }

    public function successResponse($data,$code) {
        return response()->json([
            'data' => $data,
        ])
    }
}