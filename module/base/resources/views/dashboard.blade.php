@extends('wadmin-dashboard::master')
@section('content')
    <div class="row">
        <div class="col-md-9 col-lg-8 dash-left">
            <div class="panel panel-announcement">
                <ul class="panel-options">
                    <li><a><i class="fa fa-refresh"></i></a></li>
                    <li><a class="panel-remove"><i class="fa fa-remove"></i></a></li>
                </ul>
                <div class="panel-heading">
                    <h4 class="panel-title">Thông báo mới</h4>
                </div>
                <div class="panel-body">
                    @if (session('perm'))
                        <div class="alert alert-success">{{session('perm')}}</div>
                    @endif


                </div>
            </div><!-- panel -->


            <div class="row row-col-join panel-earnings">
                <div class="col-xs-3 col-sm-4 col-lg-3">
                    <div class="panel">
                        <ul class="panel-options">
                            <li><a><i class="glyphicon glyphicon-option-vertical"></i></a></li>
                        </ul>
                        <div class="panel-heading">
                            <h4 class="panel-title">Thu nhập theo đơn hàng</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class="earning-amount">$1,543.03</h3>
                            <h4 class="earning-today">Today's Earnings</h4>

                            <ul class="list-group">
                                <li class="list-group-item">This Week <span class="pull-right">$12,320.34</span></li>
                                <li class="list-group-item">This Month <span class="pull-right">$37,520.34</span></li>
                            </ul>
                            <hr class="invisible">
                            <p>Total items sold this month: 325</p>
                        </div>
                    </div><!-- panel -->
                </div>
                <div class="col-xs-9 col-sm-8 col-lg-9">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Earnings Graph Overview</h4>
                        </div>
                        <div class="panel-body">
                            <div id="line-chart" class="body-chart"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row panel-quick-page">
                <div class="col-xs-4 col-sm-5 col-md-4 page-user">
                    <div class="panel">
                        <a href="{{route('wadmin::users.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Quản lý admin</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-person-stalker"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 page-products">
                    <div class="panel">
                        <a href="{{route('wadmin::transaction.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Đơn hàng</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="fa fa-shopping-cart"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2 page-events">
                    <div class="panel">
                        <a href="{{route('wadmin::post.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Bài viết</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-calendar-outline"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-3 col-md-2 page-messages">
                    <div class="panel">
                        <a href="{{route('wadmin::contact.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Liên hệ</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-email"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-5 col-md-2 page-reports">
                    <div class="panel">
                        <a href="{{route('wadmin::page.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Trang tĩnh</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-arrow-graph-up-right"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 page-statistics">
                    <div class="panel">
                        <a href="{{route('wadmin::role.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Phân quyền</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-ios-pulse-strong"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 page-support">
                    <div class="panel">
                        <a href="#">
                        <div class="panel-heading">
                            <h4 class="panel-title">Sản phẩm</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-help-buoy"></i></div>
                        </div>
                        </a>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 page-privacy">
                    <div class="panel">
                        <div class="panel-heading">
                            <h4 class="panel-title">Privacy</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-android-lock"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-2 page-settings">
                    <div class="panel">
                        <a href="{{route('wadmin::setting.index.get')}}">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cấu hình</h4>
                        </div>
                        <div class="panel-body">
                            <div class="page-icon"><i class="icon ion-gear-a"></i></div>
                        </div>
                        </a>
                    </div>
                </div>



            </div><!-- row -->

        </div><!-- col-md-9 -->
        <div class="col-md-3 col-lg-4 dash-right">
            <div class="row">

                <div class="col-sm-5 col-md-12 col-lg-6">
                    <div class="panel panel-primary list-announcement">
                        <div class="panel-heading">
                            <h4 class="panel-title">Bài viết xem nhiều</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled mb20">
                                @foreach($postview  as $d)
                                <li>
                                    <a href="{{route('frontend::blog.index.get',$d->slug)}}" target="_blank">{{$d->name}}</a>
                                    <small>{{format_date($d->created_at)}} <a href="">{{$d->count_view}} Lượt xem</a></small>
                                </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div><!-- col-md-12 -->
                <div class="col-sm-5 col-md-12 col-lg-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">Sản phẩm xem nhiều</h4>
                        </div>
                        <div class="panel-body">
                            <ul class="media-list user-list">
                                @foreach($productview as $d)
                                <li class="media">
                                    <div class="media-left">
                                        <a href="{{route('frontend::product.detail.get',$d->slug)}}" target="_blank">
                                            <img class="media-object img-circle" src="{{($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading nomargin"><a href="{{route('frontend::product.detail.get',$d->slug)}}" target="_blank">{{$d->name}}</a></h4>
                                        <small class="date">{{$d->count_view}} Lượt xem</small>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div><!-- panel -->
                </div>
            </div><!-- row -->


        </div><!-- col-md-3 -->
    </div><!-- row -->

@endsection
