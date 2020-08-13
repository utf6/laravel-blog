<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台系统登录</title>
    <!-- Styles -->
    <link href="{{ asset('static/css/login.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div id="login-box">
        <div class="login-top"></div>

        <div class="login-main">
            <form method="post" autoComplete="off" class="js-ajax-form" action="{{ route('admin.login') }}">
                <div class="login-box">
                    <label>用户名：</label>
                    <input required type="text" name="account"/>
                </div>
                <div class="login-box">
                    <label>密&nbsp;&nbsp;&nbsp;码：</label>
                    <input required type="password" name="password"/>
                </div>
                <div class="login-box">
                    <label>验证码：</label>
                    <input required id="code" type="text" name="code"/>
                    <img id="vdimgck" class="verify_img" src="{{ captcha_src() }}"/>
                </div>
                <div class="login-box">
                    {{ csrf_field() }}
                    <button type="submit" class="login-btn js-ajax-submit" data-loadingmsg="正在加载...">登录</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var GV = {
        ROOT: "",
        WEB_ROOT: "/",
        JS_ROOT: "static/js/"
    };
</script>
<script src="{{ asset('static/js/wind.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('static/js/common.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $('#js-admin-name').focus();

        //更换验证码
        $('#vdimgck').click(function(){
            $(this).attr('src', "{{ captcha_src() }}"+'?'+Math.random());
        })
    })
</script>
</body>
</html>
