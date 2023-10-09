<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Redis;

class CommonHelper
{
    public static function successResponse($data = null, $message = 'Success', $status = 200)
    {
        return response()->json(['status' => $status, 'success' => true, 'message' => $message, 'data' => $data]);
    }

    public static function errorResponse($message = 'Error', $status = 500)
    {
        return response()->json(['status' => $status, 'success' => false, 'message' => $message]);
    }
    
    public static function exceptionResponse($message = 'An error occurred while processing your request. Please try again later', $status = 500)
    {
        return response()->json(['status' => $status, 'success' => false, 'message' => $message]);
    }

    public function getAllCacheKeys()
    {
        $keys = Redis::keys('*'); // Mengambil semua kunci dari cache Redis

        // Mengembalikan daftar semua kunci
        return $keys;
    }
}