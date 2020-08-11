<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['login', 'enter']);
    }

    /**
     * 成功返回
     * @param $info
     * @param string $referer
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($info, $referer='')
    {
        return response()->json([
            'state' => 'success',
            'info' => $info,
            'referer' => $referer
        ]);
    }

    /**
     * 失败操作
     * @param $info
     * @param string $referer
     * @return \Illuminate\Http\JsonResponse
     */
    public function error($info, $referer='')
    {
        return response()->json([
           'state' => 'fail',
           'info' => $info,
           'referer' => $referer
        ]);
    }
}
