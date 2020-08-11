<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>后台管理中心</title>
    <!-- Styles -->
    <link href="{{ asset('static/boot/themes/flat/theme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('static/boot/css/boot.css') }}" rel="stylesheet">
    <link href="{{ asset('static/font-awesome/css/font-awesome.min.css') }}"  rel="stylesheet" type="text/css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="{{ asset('static/font-awesome/css/font-awesome-ie7.min.css') }}">
    <![endif]-->
    <link rel="stylesheet" href="{{ asset('static/boot/themes/flat/boot-index.min.css') }}">
    <link href="{{ asset('static/js/artDialog/skins/default.css') }}" rel="stylesheet" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="{{ asset('static/boot/css/boot-ie.css') }}" />
    <![endif]-->
    <style>
        .navbar .nav_shortcuts .btn{margin-top: 5px;}
        .macro-component-tabitem{width:101px;}

        /*-----------------导航hack--------------------*/
        .nav-list>li.open{position: relative;}
        .nav-list>li.open .back {display: none;}
        .nav-list>li.open .normal {display: inline-block !important;}
        .nav-list>li.open a {padding-left: 7px;}
        .nav-list>li .submenu>li>a {background: #fff;}
        .nav-list>li .submenu>li a>[class*="fa-"]:first-child{left:20px;}
        .nav-list>li ul.submenu ul.submenu>li a>[class*="fa-"]:first-child{left:30px;}
        /*----------------导航hack--------------------*/
    </style>

    <script>
        //全局变量
        var GV = {
            HOST:"",
            ROOT: "/",
            WEB_ROOT: "/",
            JS_ROOT: "static/js/"
        };
    </script>
</head>

<body style="min-width:900px;" screen_capture_injected="true">
<div id="loading"><i class="loadingicon"></i><span>正在加载...</span></div>
<div id="right_tools_wrapper">
    <span id="right_tools_clearcache" title="清除缓存" onclick="javascript:openapp('#','right_tool_clearcache','清除缓存');">
        <i class="fa fa-trash-o right_tool_icon"></i>
    </span>
    <span id="refresh_wrapper" title="REFRESH_CURRENT_PAGE" >
        <i class="fa fa-refresh right_tool_icon"></i>
    </span>
</div>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a href="{{ route('admin') }}" class="brand">
                <small>后台管理中心</small>
            </a>
            <div class="pull-left nav_shortcuts" >
                <a class="btn btn-small btn-warning" href="/" title="网站首页" target="_blank">
                    <i class="fa fa-home"></i>
                </a>
                <a class="btn btn-small btn-success" href="javascript:openapp('','index_termlist','分类管理');" title="分类管理">
                    <i class="fa fa-th"></i>
                </a>
                <a class="btn btn-small btn-info" href="javascript:openapp('/admin/content/add','index_postlist','添加文章');" title="添加文章">
                    <i class="fa fa-pencil"></i>
                </a>
                <a class="btn btn-small btn-danger" href="javascript:openapp('/admin/index/clearcache','clearCache','清除缓存');" title="清除缓存">
                    <i class="fa fa-trash-o"></i>
                </a>
                <a class="btn btn-small" href="javascript:openapp('/admin/menu/index','192Admin','后台菜单');" title="后台菜单">
                    <i class="fa fa-list"></i>
                </a>
            </div>
            <ul class="nav simplewind-nav pull-right">
                <li class="light-blue">
                    <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                        <img class="nav-user-photo" width="30" height="30" src="{{ asset('static/images/headicon.png') }}" alt="admin">
                        <span class="user-info">欢迎, {{ auth()->user()->nickname }}</span>
                        <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                        <li>
                            <a href="javascript:openapp('/admin/set/site','index_site','网站信息');">
                                <i class="fa fa-cog"></i> 网站信息
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('/admin/user/info','index_info','修改信息');">
                                <i class="fa fa-user"></i> 修改信息</a>
                        </li>
                        <li>
                            <a href="javascript:openapp('/admin/user/password','index_password','修改密码');">
                                <i class="fa fa-lock"></i> 修改密码
                            </a>
                        </li>
                        <li><a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out"></i> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="app" class="main-container container-fluid">
    <div class="sidebar" id="sidebar">
        <!-- <div class="sidebar-shortcuts" id="sidebar-shortcuts">
        </div> -->
        <div id="nav_wraper">
            <ul class="nav nav-list">
                <li>
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-cogs"></i>
                        <span class="menu-text normal">设置</span>
                        <b class="arrow fa fa-angle-right normal"></b>
                        <i class="fa fa-reply back"></i>
                        <span class="menu-text back">返回</span>
                    </a>
                    <ul class="submenu" style="display: none;">
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">个人信息	</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li>
                                    <a href="javascript:openapp('/Admin/setting/password','195Admin','修改密码',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">修改密码</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:openapp('/Admin/setting/info','196Admin','修改信息',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">修改信息</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:openapp('/Admin/setting/site','197Admin','网站信息',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">网站信息</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-list normal"></i>
                        <span class="menu-text normal">菜单管理</span>
                        <b class="arrow fa fa-angle-right normal"></b>
                        <i class="fa fa-reply back"></i>
                        <span class="menu-text back">返回</span>
                    </a>
                    <ul class="submenu" style="display: none;">
                        <li>
                            <a href="javascript:openapp('/Admin/menu/index','192Admin','后台菜单',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">后台菜单</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">前台菜单	</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li>
                                    <a href="javascript:openapp('/Admin/nav/index','1999Admin','菜单管理',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">菜单管理</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:openapp('/Admin/nav/cate','2000Admin','菜单分类',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">菜单分类</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-user"></i>
                        <span class="menu-text normal">用户管理</span>
                        <b class="arrow fa fa-angle-right normal"></b>
                        <i class="fa fa-reply back"></i>
                        <span class="menu-text back">返回</span>
                    </a>
                    <ul class="submenu" style="display: none;">
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">管理组	</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li>
                                    <a href="javascript:openapp('/Admin/member/role','200Admin','角色管理',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">角色管理</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:openapp('/Admin/member/index','201Admin','管理员',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">管理员</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:openapp('/Admin/member/user','2001Admin','前台用户',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">前台用户</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-th"></i>
                        <span class="menu-text normal">内容管理</span>
                        <b class="arrow fa fa-angle-right normal"></b>
                        <i class="fa fa-reply back"></i>
                        <span class="menu-text back">返回</span>
                    </a>
                    <ul class="submenu" style="display: none;">
                        <li>
                            <a href="javascript:openapp('/Admin/content/index','203Admin','文章管理',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">文章管理</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:openapp('/Admin/content/recycle','204Admin','回收站',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">回收站</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="#" class="dropdown-toggle">
                        <i class="fa fa-cloud"></i>
                        <span class="menu-text normal">扩展工具</span>
                        <b class="arrow fa fa-angle-right normal"></b>
                        <i class="fa fa-reply back"></i>
                        <span class="menu-text back">返回</span>
                    </a>
                    <ul class="submenu" style="display: none;">
                        <li class="">
                            <a href="#" class="dropdown-toggle">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">友情链接	</span>
                                <b class="arrow fa fa-angle-right"></b>
                            </a>
                            <ul class="submenu" style="display: none;">
                                <li>
                                    <a href="javascript:openapp('/Admin/extend/link','2003Admin','友链列表',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">友链列表</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:openapp('/Admin/extend/apply','2004Admin','友链申请',true);">&nbsp;
                                        <i class="fa fa-angle-double-right"></i>
                                        <span class="menu-text">友链申请</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:openapp('/Admin/extend/comment','2002Admin','评价管理',true);">
                                <i class="fa fa-caret-right"></i>
                                <span class="menu-text">评价管理</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <div class="breadcrumbs" id="breadcrumbs">
            <a id="task-pre" class="task-changebt">←</a>
            <div id="task-content">
                <ul class="macro-component-tab" id="task-content-inner">
                    <li class="macro-component-tabitem noclose" app-id="0" app-url="{{ route('admin') }}" app-name="首页">
                        <span class="macro-tabs-item-text">首页</span>
                    </li>
                </ul>
                <div style="clear:both;"></div>
            </div>
            <a id="task-next" class="task-changebt">→</a>
        </div>

        <div class="page-content" id="content">
            <iframe src="{{ route('admin.welcome') }}" style="width:100%;height: 100%;" frameborder="0" id="appiframe-0" class="appiframe"></iframe>
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('static/js/wind.js') }}"></script>

<script>
    var ismenumin = $("#sidebar").hasClass("menu-min");
    $(".nav-list").on( "click",function(event) {
        var closest_a = $(event.target).closest("a");
        if (!closest_a || closest_a.length == 0) {
            return
        }
        if (!closest_a.hasClass("dropdown-toggle")) {
            if (ismenumin && "click" == "tap" && closest_a.get(0).parentNode.parentNode == this) {
                var closest_a_menu_text = closest_a.find(".menu-text").get(0);
                if (event.target != closest_a_menu_text && !$.contains(closest_a_menu_text, event.target)) {
                    return false
                }
            }
            return
        }
        var closest_a_next = closest_a.next().get(0);
        if (!$(closest_a_next).is(":visible")) {
            var closest_ul = $(closest_a_next.parentNode).closest("ul");
            if (ismenumin && closest_ul.hasClass("nav-list")) {
                return
            }
            closest_ul.find("> .open > .submenu").each(function() {
                if (this != closest_a_next && !$(this.parentNode).hasClass("active")) {
                    $(this).slideUp(150).parent().removeClass("open")
                }
            });
        }
        if (ismenumin && $(closest_a_next.parentNode.parentNode).hasClass("nav-list")) {
            return false;
        }
        $(closest_a_next).slideToggle(150).parent().toggleClass("open");
        return false;
    });
</script>
<script src="{{ asset('static/js/common.js') }}"></script>
<script src="{{ asset('static/js/index.js') }}"></script>
</body>
</html>
