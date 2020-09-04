<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- HTML5 shim for IE8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->

    <link href="{{ asset('static/boot/themes/flat/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/boot/css/boot.css') }}" rel="stylesheet">
    <link href="{{ asset('static/js/artDialog/skins/default.css') }}" rel="stylesheet"/>
    <link href="{{ asset('static/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('static/font-awesome/css/font-awesome-ie7.min.css') }}">
    <![endif]-->
    @yield('css')
    <script type="text/javascript">
        //全局变量
        var GV = {
            ROOT: "",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/",
            APP: 'admin'/*当前应用名*/
        };
    </script>
    @yield('js')
</head>
<body>

@yield('content')

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('static/js/wind.js') }}"></script>
<script>
    $(function () {
        $("[data-toggle='tooltip']").tooltip();
    });
</script>
<script src="{{ asset('static/js/common.js') }}"></script>
</body>
</html>
