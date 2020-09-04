@extends('admin.layouts.app')
@section('js')
    <style>
        .home_info li em {
            float: left;
            width: 120px;
            font-style: normal;
        }
        li {
            list-style: none;
        }
    </style>
@endsection

@section('content')
    <div class="wrap" id="app">
        <h4 class="well">系统信息</h4>
        <div class="home_info">
            <ul>
                <li><em>操作系统</em> <span>Linux</span></li>
                <li><em>运行环境</em> <span>nginx/1.12.1</span></li>
                <li><em>PHP版本</em> <span>5.6.31</span></li>
                <li><em>PHP运行方式</em> <span>fpm-fcgi</span></li>
                <li><em>MYSQL版本</em> <span>5.6.37-log</span></li>
                <li><em>上传附件限制</em> <span>50M</span></li>
                <li><em>执行时间限制</em> <span>5s</span></li>
                <li><em>剩余空间</em> <span>37665.76M</span></li>
            </ul>
        </div>
        <h4 class="well">发起团队</h4>
        <div class="home_info" id="home_devteam">
            <ul>
                <li><em>核心开发者</em> <span>老猫,Sam,Tuolaji,Codefans,睡不醒的猪,小夏,Powerless</span></li>
                <li><em>团队成员</em> <span>老猫,Sam,Tuolaji,Smile,Jack,日本那只猫</span></li>
                <li><em>联系邮箱</em> <span>cmf@simplewind.net</span></li>
            </ul>
        </div>
        <h4 class="well">贡献者</h4>
        <div class="">
            <ul class="inline" style="margin-left: 25px;">
                <li>koba</li>
                <li>虎书</li>
            </ul>
        </div>
    </div>
@endsection


