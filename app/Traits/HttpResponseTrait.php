<?php

namespace App\Traits;

trait HttpResponseTrait
{
    public function resSuccess(string $msg = 'Success', array $data = [], int $resCode = 200)
    {
        $ret = [
            'success' => true,
            'msg' => $msg,
            'data' => $data
        ];
        return response()->json($ret, $resCode);
    }

    public function resFail(string $msg = 'Sorry, fail take your request', int $resCode = 400)
    {
        $ret = [
            'success' => false,
            'msg' => $msg
        ];
        return response()->json($ret, $resCode);
    }


}