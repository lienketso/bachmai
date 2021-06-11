@extends('frontend::master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Search</h2>
                <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> Search</p>
            </div>
        </div>
    </div>


    <section class="padd-top-30">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">
                    {{--                <h2 class="blog_page_title">{{$data->name}}</h2>--}}
                    <div class="list_blog_bm">
                        @foreach($data as $d)

                            <div class="list_blog_item">
                                <div class="img_blog_item">
                                    <a href="
                                     @switch($d->post_type)
                                        @case('blog')
                                        {{ $url = route('frontend::post.detail.get',$d->slug)}}
                                        @break
                                        @case('health')
                                        {{ $url = route('frontend::diseases.detail.get',$d->slug)}}
                                        @break
                                        @case('video')
                                        {{route('frontend::video.detail.get',$d->slug)}}
                                        @break
                                        @case('doc')
                                        {{route('frontend::doctor.detail.get',$d->slug)}}
                                        @break
                                        @case('page')
                                        {{route('frontend::page.detail.get',$d->slug)}}
                                        @break
                                        @default
                                        {{route('frontend::post.detail.get',$d->slug)}}
                                        @endswitch
                                            ">
                                        <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" atl="{{$d->name}}">
                                    </a>
                                </div>
                                <div class="intro_blog_item">
                                    <h3><a href="
                                    @switch($d->post_type)
                                        @case('blog')
                                        {{ $url = route('frontend::post.detail.get',$d->slug)}}
                                        @break
                                        @case('health')
                                        {{ $url = route('frontend::diseases.detail.get',$d->slug)}}
                                        @break
                                        @case('video')
                                        {{route('frontend::video.detail.get',$d->slug)}}
                                        @break
                                        @case('doc')
                                        {{route('frontend::doctor.detail.get',$d->slug)}}
                                        @break
                                        @case('page')
                                        {{route('frontend::page.detail.get',$d->slug)}}
                                        @break
                                        @default
                                        {{route('frontend::post.detail.get',$d->slug)}}
                                        @endswitch
                                                ">
                                            {{$d->name}}</a></h3>
                                    <div class="time_post_item">
                                        <span><i class="fa fa-clock-o"></i> 03 tháng 06 2021</span>
                                        <span><i class="fa fa-user"></i> admin</span>
                                        <span><i class="fa fa-eye"></i> {{$d->count_view}} lượt xem</span>
                                    </div>
                                    <div class="desc_blog_item">
                                        {!! sub($d->description,200) !!}
                                    </div>
                                    <div class="btn_xemtiep">
                                        <a href="
                                        @switch($d->post_type)
                                        @case('blog')
                                        {{ $url = route('frontend::post.detail.get',$d->slug)}}
                                        @break
                                        @case('health')
                                        {{ $url = route('frontend::diseases.detail.get',$d->slug)}}
                                        @break
                                        @case('video')
                                        {{route('frontend::video.detail.get',$d->slug)}}
                                        @break
                                        @case('doc')
                                        {{route('frontend::doctor.detail.get',$d->slug)}}
                                        @break
                                        @case('page')
                                        {{route('frontend::page.detail.get',$d->slug)}}
                                        @break
                                        @default
                                        {{route('frontend::post.detail.get',$d->slug)}}
                                        @endswitch
">Xem tiếp <i class="ti-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="paginate_bm">
                    {{$data->links()}}

                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="sidebar_list">
                        @if($popularPost)
                            <div class="latest_sidebar">
                                <h3 class="title_sidebar">{{trans('frontend.popular_post')}}</h3>
                                @foreach($popularPost as $d)
                                    <div class="list_po_sidebar">
                                        <div class="img_po_sidebar">
                                            <a href="{{route('frontend::post.detail.get',$d->slug)}}">
                                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" alt="{{$d->name}}">
                                            </a>
                                        </div>
                                        <div class="title_po_sidebar">
                                            <p class="date_po_sibar"><i class="fa fa-clock-o"></i> {{stringDate($d->created_at)}}</p>
                                            <h4><a href="{{route('frontend::post.detail.get',$d->slug)}}">{{$d->name}}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                    </div>

                </div>

            </div>



        </div>
    </section>


@endsection
