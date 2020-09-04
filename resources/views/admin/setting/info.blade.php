@extends('admin.layouts.app')

@section('content')
    <div class="wrap" id="app">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">修改信息</a></li>
            <li><a href="#">修改密码</a></li>
        </ul>
        <form class="form-horizontal js-ajax-form" method="post" action="{{ route('user.info') }}">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="input-nickname">
                        <span class="form-required">*</span>昵称
                    </label>
                    <div class="controls">
                        <input type="hidden" name="id" value="1">
                        <input type="text" id="input-nickname" name="nickname" value="{{ auth('admin')->user()->nickname }}" required>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input-gender">性别</label>
                    <div class="controls">
                        <select name="sex" id="input-gender">
                            <option value="0" selected>保密</option>
                            <option value="1">男</option>
                            <option value="2">女</option>
                        </select>
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="input-user_url">个人网址</label>
                    <div class="controls">
                        <input type="text" id="input-user_url" placeholder="http://thinkcmf.com" name="user_url" value="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input-signature">个性签名</label>
                    <div class="controls">
                        <textarea id="input-signature" placeholder="个性签名" name="signature"></textarea>
                    </div>
                </div>
                <div class="form-actions">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary js-ajax-submit">保存</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
