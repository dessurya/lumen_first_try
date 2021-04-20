<?php

namespace App\Helpers;

class OpenSslHelper {

    public static function encrypt($cleartext)
    {
        $key = config('open_ssl.key');
        $encrypted = openssl_encrypt($cleartext, config('open_ssl.method'), $key, OPENSSL_RAW_DATA, config('open_ssl.iv'));
        return base64_encode($encrypted);
    }

    public static function decrypt($encrypted)
    {
        $key = config('open_ssl.key');
        $encrypted = base64_decode($encrypted);
        $decrypted = openssl_decrypt($encrypted, config('open_ssl.method'), $key, OPENSSL_RAW_DATA, config('open_ssl.iv'));
        return trim($decrypted);
    }
}