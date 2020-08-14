@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-1 bg-white rounded">
                <div class="card-body">
                    <div class="row no-gutters">
                        <div class="col-4">
                            <a href=""><img src="{{ asset('image/headicon.png') }}" class="w-75" alt="..."></a>
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="#" class="badge badge-primary mr-1">Primary</a>
                                    Go github.com/gin-gonic/gin 一直报错 run 不起来地方官大使馆
                                </h5>
                                <p class="card-text mt-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body  row text-muted">
                        <div class="col-sm"><i class="fa fa-calendar mr-2"></i>2020-08-19</div>
                        <div class="col-sm"><i class="fa fa-eye mr-2"></i> 204 次阅读</div>
                        <div class="col-sm"><i class="fa fa-commenting-o mr-2"></i> 104 条评论</div>
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-body">
                    <a target="_blank" href="https://cloud.tencent.com/act/cps/redirect?redirect=1062&amp;cps_key=21d2f517d68212b5ea74c3666b93a974&amp;from=console">
                        <img width="100%" src="http://tigerbook.cn/static/images/ad/tx-new.jpg" alt="【腾讯云】云产品限时秒杀，爆款1核2G云服务器，首年99元">
                    </a>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="text-center p-3">

                        <div class="position-relative">热门推荐</div>
                        <hr class="line">
                    </h5>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="">Cras justo odio</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Dapibus ac facilisis in
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Morbi leo risus
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
