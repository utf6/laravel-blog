<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseController
{
    //

    public function enter()
    {
        return view('admin.auth.login');
    }

    /**
     * 登录操作
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function login(Request $request)
    {
        $params = $request->except('_token');
        //验证 验证码
        $rules = ['code' => 'required|captcha'];
        $validator = validator()->make($params, $rules);
        if ($validator->fails()) {
            return response()->json(['state' => 'success', 'info' => '验证码错误！']);
        }

        //验证用户
        if (Auth::attempt(['account' => $params['account'], 'password' => $params['password']])){
            return  $this->success('登录成功', route('admin'));
        }

        return $this->error('账号密码错误');
    }
}
