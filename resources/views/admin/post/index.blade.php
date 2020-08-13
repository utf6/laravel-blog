@extends('admin.layouts.app')

@section('js')
    <script>
        function refersh_window() {
            var refersh_time = getCookie('refersh_time');
            if (refersh_time == 1) {
                window.location = "/admin/content/index";
            }
        }
        setInterval(function() {
            refersh_window();
        }, 2000);
        $(function() {
            setCookie("refersh_time", 0);
            Wind.use('ajaxForm', 'artDialog', 'iframeTools', function() {
                //批量复制
                $('.js-articles-copy').click(function(e) {
                    var ids=[];
                    $("input[name='ids[]']").each(function() {
                        if ($(this).is(':checked')) {
                            ids.push($(this).val());
                        }
                    });

                    if (ids.length == 0) {
                        art.dialog.through({
                            id : 'error',
                            icon : 'error',
                            content : '您没有勾选信息，无法进行操作！',
                            cancelVal : '关闭',
                            cancel : true
                        });
                        return false;
                    }

                    ids= ids.join(',');
                    art.dialog.open("/admin/content/copy/ids/"+ ids, {
                        title : "批量复制",
                        width : "300px"
                    });
                });
                //批量移动
                $('.js-articles-move').click(function(e) {
                    var ids=[];
                    $("input[name='ids[]']").each(function() {
                        if ($(this).is(':checked')) {
                            ids.push($(this).val());
                        }
                    });

                    if (ids.length == 0) {
                        art.dialog.through({
                            id : 'error',
                            icon : 'error',
                            content : '您没有勾选信息，无法进行操作！',
                            cancelVal : '关闭',
                            cancel : true
                        });
                        return false;
                    }

                    ids= ids.join(',');
                    art.dialog.open("/admin/content/move/&old_term_id/0/ids/"+ ids, {
                        title : "批量移动",
                        width : "300px"
                    });
                });
            });
        });
    </script>
@endsection

@section('content')
    <div id="app" class="wrap js-check-wrap">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:;">文章管理</a></li>
            <li><a href="{{ route('posts.create') }}" target="_self">添加文章</a></li>
        </ul>
        <form class="well form-search" method="get" action="{{ route('posts.index') }}">
            分类：
            <select name="term" style="width: 120px;">
                <option value='0'>全部</option>
                <option value='1' >列表演示</option>
                <option value='2' >瀑布流</option>
            </select> &nbsp;&nbsp;
            时间：
            <input type="text" name="start_time" class="js-datetime" value="" style="width: 120px;" autocomplete="off">-
            <input type="text" class="js-datetime" name="end_time" value="" style="width: 120px;" autocomplete="off"> &nbsp; &nbsp;
            关键字：
            <input type="text" name="keyword" style="width: 200px;" value="" placeholder="请输入关键字...">
            <input type="submit" class="btn btn-primary" value="搜索" />
            <a class="btn btn-danger" href="{{ route('posts.index') }}">清空</a>
        </form>
        <form class="js-ajax-form" action="" method="post">
            <div class="table-actions">
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/top/top/1" data-subcheck="true">置顶</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/top/top/0" data-subcheck="true">取消置顶</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/recommend/recommend/1" data-subcheck="true">推荐</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/recommend/recommend/0" data-subcheck="true">取消推荐</button>
                <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="/admin/content/delete" data-subcheck="true" data-msg="你确定放进回收站吗？">删除</button>
            </div>
            <table class="table table-hover table-bordered table-list">
                <thead>
                <tr>
                    <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                    <th width="50">ID</th>
                    <th>标题</th>
                    <th width="60">点击量</th>
                    <th width="60">评论量</th>
                    <th width="160">关键字/摘要/缩略图</th>
                    <th>发布时间</th>
                    <th width="70">状态</th>
                    <th width="120">操作</th>
                </tr>
                </thead>
                @foreach($data as $v)
                <tr>
                    <td><input type="checkbox" class="js-check" data-yid="js-check-y" data-xid="js-check-x" name="ids[]" value="{{ $v->id }}" title="ID:{{ $v->id }}"></td>
                    <td><b>{{ $v->id }}</b></td>
                    <td>{{ $v->title }}</td>
                    <td>{{ $v->click }}</td>
                    <td>{{ $v->comment }}</td>
                    <td>
                        @if($v->keywords) <i class="fa fa-check fa-fw"></i> @endif
                        @if($v->description) <i class="fa fa-check fa-fw"></i> @endif
                        @if($v->picture) <i class="fa fa-check fa-fw"></i> @endif
                    </td>
                    <td>{{ $v->created_at }}</td>
                    <td>
                        @if($v->status) <a data-toggle="tooltip" title="已审核"><i class="fa fa-check"></i></a> @endif

                        @if($v->is_top)
                            <a data-toggle="tooltip" title="已置顶"><i class="fa fa-arrow-up"></i></a>
                        @else
                            <a data-toggle="tooltip" title="未置顶"><i class="fa fa-arrow-down"></i></a>
                        @endif

                        @if($v->is_hot)
                            <a data-toggle="tooltip" title="已推荐"><i class="fa fa-thumbs-up"></i></a>
                        @else
                            <a data-toggle="tooltip" title="未推荐"><i class="fa fa-thumbs-down"></i></a>
                        @endif
                    </td>
                    <td>
                        <a href="/admin/content/edit/id/161">编辑</a> |
                        <a href="/admin/content/delete/id/161" data-msg="你确定删除吗？" class="js-ajax-delete">删除</a>
                    </td>
                </tr>
                @endforeach
                <tfoot>
                <tr>
                    <th width="15"><label><input type="checkbox" class="js-check-all" data-direction="x" data-checklist="js-check-x"></label></th>
                    <th width="50">ID</th>
                    <th>标题</th>
                    <th width="50">点击量</th>
                    <th width="50">评论量</th>
                    <th >关键字/摘要/缩略图</th>
                    <th>发布时间</th>
                    <th width="50">状态</th>
                    <th width="70">操作</th>
                </tr>
                </tfoot>
            </table>
            <div class="table-actions">
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/top/top/1" data-subcheck="true">置顶</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/top/top/0" data-subcheck="true">取消置顶</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/recommend/recommend/1" data-subcheck="true">推荐</button>
                <button class="btn btn-primary btn-small js-ajax-submit" type="submit" data-action="/admin/content/recommend/recommend/0" data-subcheck="true">取消推荐</button>
                <button class="btn btn-danger btn-small js-ajax-submit" type="submit" data-action="/admin/content/delete" data-subcheck="true" data-msg="你确定放进回收站吗？">删除</button>
            </div>
            <div class="pagination"><ul class="pagination">{{ $data->render() }}</div>
        </form>
    </div>
@endsection
