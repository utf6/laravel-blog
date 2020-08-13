@extends('admin.layouts.app')

@section('content')
    <div id="app" class="wrap">
        <ul class="nav nav-tabs">
            <li class="active"><a href="{{ route('setting.site') }}" data-toggle="tab">网站信息</a></li>
        </ul>
        <form method="post" class="form-horizontal js-ajax-form" action="{{ route('setting.site') }}">
            <fieldset>
                <div class="control-group">
                    <label class="control-label">网站名称</label>
                    <div class="controls">
                        <input type="text" name="title" style="width: 500px;" required placeholder="请输入网站名称">
                        <span class="form-required" >*</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">关键字</label>
                    <div class="controls">
                        <input type="text" name="keywords" style="width: 500px;" required placeholder="网站 keywords 关键字">
                        <span>多个用英文逗号隔开</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">网站描述</label>
                    <div class="controls">
                        <textarea name="description" style="width: 500px;height: 80px;" placeholder="请输入网站描述 50 字以内"></textarea>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">备案信息</label>
                    <div class="controls">
                        <input type="text" name="icp" placeholder="请输入备案信息" value="陕ICP备17018807号-1" >
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">版权信息</label>
                    <div class="controls">
                        <input type="text" name="copyright" style="width: 500px;" value="Copyright  2019  &lt;a target=&quot;_blank&quot; href=&quot;http://www.tigerbook.cn&quot;&gt;TigerBook&lt;/a&gt;.">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">统计代码</label>
                    <div class="controls">
                    <textarea name="site_count" style="width: 500px;height: 80px;">

                    </textarea>
                    </div>
                </div>
                <div class="form-actions">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary js-ajax-submit">提交</button>
                    <a class="btn" href="javascript:history.back(-1);">返回</a>
                </div>
            </fieldset>
        </form>
    </div>
@endsection
