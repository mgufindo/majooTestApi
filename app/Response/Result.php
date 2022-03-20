<?php
namespace App\Response;

class Result {

    const ERR_NOT_FOUND = 'not found';
    const ERR_NOT_FIND = 'not find';
    const ERR_SAME = 'not same';
    const ERR_PAID = 'been paid';
    const ERR_EXPIRED = 'has expired';
    const ERR_REQUEST = 'ERROR CODE';
    const ERR_ANY = 'ERR_ANY';

    public static function SUCCESS($data = [])
    {
        return response()->json([
            'status' => 'SUCCESS',
            'data' => $data,
            'code' => 200
        ]);
    }

    public static function ERROR($error, $data, $code = 501)
    {
        $message = $data.' '.$error;

        if (self::ERR_ANY == $error) {
            $message = $data;
        }

        return response()->json([
            'status' => 'ERROR',
            'message' => $message,
            'code' => $code
        ], $code);
    }
}
