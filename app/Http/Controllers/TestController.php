<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    //
    public function qiniu()
    {
        //z1.yanyuvideo.room5
        $hub = 'yanyuvideo';
        $ak = 'pB9jRZZyOwA1yYc9nAVp0S0SdgMtiBJglLE9wXuy';
        $sk = 'axWD61IzrwHdQ7iv3Y0meNrWd22QEyhXhE0Y2N_4';
        $stream = \base64_encode('z1.yanyuvideo.room5');
        // return $stream;

        $data = 'GET /v2/hubs/yanyuvideo/streams/' . $stream;

        $data .= "\nHost: pili.qiniuapi.com";
        $data .= "\nContent-Type: application/x-www-form-urlencoded";
        $data .= "\n\n";

        $sign = \base64_encode(hash_hmac('sha1', $data, $sk, true));
        // dd($sign);
        // $sign = \str_replace(["+", "/"], ["-", "_"], $sign);
        $token1 = 'Qiniu ' . $ak . ':' . $sign;

        // $ak = "MY_ACCESS_KEY";
        // $sk = "MY_SECRET_KEY";
        // $signingStr =
        //     "POST /move/bmV3ZG9jczpmaW5kX21hbi50eHQ=/bmV3ZG9jczpmaW5kLm1hbi50eHQ=\nHost: rs.qiniu.com\n\n";
        // $sign = hash_hmac("sha1", $signingStr, $sk, true);
        // $sign = \base64_encode($sign);

        $auth = new \App\PecidCMS\Auth($ak, $sk);
        $token2 = $auth->authorizationV2("http://pili.qiniuapi.com/v2/hubs/yanyuvideo/streams/$stream", 'GET', null, 'application/x-www-form-urlencoded');

        var_dump($stream, $token1, $token2);
        die();

        return $stream . "\n" . $token;
    }

    public function test()
    {
        return Hash::make('123456');
    }
}
