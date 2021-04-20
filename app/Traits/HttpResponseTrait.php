<?php

namespace App\Traits;

use App\Helpers\OpenSslHelper AS OpenSsl;

trait HttpResponseTrait
{
    public function resSuccess(string $msg = 'Success', array $data = [], int $resCode = 200)
    {
        $ret = [
            'success' => true,
            'msg' => OpenSsl::encrypt($msg),
            'data' => OpenSsl::encrypt(json_encode($data))
            // 'data' => $data
        ];
        return response()->json($ret, $resCode);
    }

    public function resFail(string $msg = 'Sorry, fail take your request', int $resCode = 400)
    {
        $ret = [
            'success' => false,
            'msg' => OpenSsl::encrypt($msg)
        ];
        return response()->json($ret, $resCode);
    }


}