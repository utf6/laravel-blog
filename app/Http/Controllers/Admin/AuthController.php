<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 不验证权限操作控制器
 * Class AuthController
 * @package App\Http\Controllers\Admin
 */
class AuthController extends BaseController
{
    /**
     * 后台登录视图
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function enter()
    {
        return view('admin.auth.login');
    }

    /**
     * 登录操作
     * @param Request $request
     * @return string[]
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function login(Request $request)
    {
        $params = $request->except('_token');
        //验证 验证码
        $rules = ['code' => 'required|captcha'];
        $validator = validator()->make($params, $rules);
        if ($validator->fails()) {
            return ['state' => 'success', 'info' => '验证码错误！'];
        }

        //验证用户
        if (Auth::guard('admin')->attempt(['account' => $params['account'], 'password' => $params['password']])){
            return $this->success('登录成功', route('admin'));
        }

        return $this->error('账号密码错误');
    }
}
