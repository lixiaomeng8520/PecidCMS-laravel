<?php

namespace App\PecidCMS;

class Helper
{
    public static function response($code = 1, $msg = '成功', $data = null)
    {
        return response()->json([
            'code'  =>  $code,
            'msg'   =>  $msg,
            'data'  =>  $data
        ]);
    }
}