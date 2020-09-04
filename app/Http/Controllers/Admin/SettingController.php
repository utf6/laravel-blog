<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends BaseController
{
    //
    protected $admin;

    public function __construct(AdminRepository $admin)
    {
        $this->admin = $admin;
    }

    public function info()
    {
        return view('admin.setting.info');
    }

    /**
     * 修改用户信息
     * @param Request $request
     * @return array
     */
    public function setInfo(Request $request)
    {
        $params = [
            'nickname' => $request->nickname
        ];

        if ($this->admin->update($params, auth('admin')->id())){
            return  $this->success('修改成功');
        }

        return $this->error('修改失败');
    }

    /**
     * 修改密码视图
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function password()
    {
        return view('admin.setting.password');
    }

    public function setPassword(Request $request)
    {
        $params = [
            'old_password' => $request->old_password,
            'new_password' => $request->new_password,
            'repeat_password' => $request->repeat_password
        ];

        if (!Hash::check($params['old_password'], Auth::user()->password)){
            return $this->error('旧密码错误！');
        }

        if ($params['new_password'] != $params['repeat_password']){
            return  $this->error('两次密码不一致');
        }

        if ($this->admin->update(['password' => Hash::make($params['new_password'])], Auth::id())){
            return  $this->success('修改成功');
        }

        return  $this->error('修改失败');
    }

    public function site()
    {
        return view('admin.setting.site');
    }

    public function setSite(Request $request)
    {
        $params = $request->all();

        dd($params);
    }
}
