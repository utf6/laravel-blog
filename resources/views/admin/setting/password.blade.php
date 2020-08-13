@extends('admin.layouts.app')

@section('content')
    <div id="app" class="wrap">
        <ul class="nav nav-tabs">
            <li><a href="{{ route('user.info') }}">修改信息</a></li>
            <li class="active"><a href="{{ route('user.password') }}">修改密码</a></li>
        </ul>
        <form class="form-horizontal js-ajax-form" method="post" action="{{ route('user.password') }}">
            <fieldset>
                <div class="control-group">
                    <label class="control-label" for="input-old-password">原始密码</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge" id="input-old-password" name="old_password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input-password">新密码</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge" id="input-password" name="new_password">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input-repassword">重复新密码</label>
                    <div class="controls">
                        <input type="password" class="input-xlarge" id="input-repassword" name="repeat_password">
                    </div>
                </div>
                <div class="form-actions">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary  js-ajax-submit">确认修改</button>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
