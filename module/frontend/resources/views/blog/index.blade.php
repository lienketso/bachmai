@extends('frontend::master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>{{$data->name}}</h2>
                <p><a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a> <i class="ti-angle-double-right"></i> {{$data->name}}</p>
            </div>
        </div>
    </div>


    <section class="padd-top-30">
        <div class="container">

            <div class="row">

               <div class="col-lg-8">
{{--                <h2 class="blog_page_title">{{$data->name}}</h2>--}}
                   <div class="list_blog_bm">
                        @foreach($list as $d)
                       <div class="list_blog_item">
                           <div class="img_blog_item">
                               <a href="{{route('frontend::post.detail.get',$d->slug)}}">
                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}" atl="{{$d->name}}">
                            </a>
                           </div>
                           <div class="intro_blog_item">
                               <h3><a href="{{route('frontend::post.detail.get',$d->slug)}}">{{$d->name}}</a></h3>
                               <div class="time_post_item">
                                   <span><i class="fa fa-clock-o"></i> 03 tháng 06 2021</span>
                                   <span><i class="fa fa-user"></i> admin</span>
                                   <span><i class="fa fa-eye"></i> {{$d->count_view}} lượt xem</span>
                               </div>
                               <div class="desc_blog_item">
                                   {{cut_string($d->description,200)}}
                               </div>
                               <div class="btn_xemtiep">
                                   <a href="{{route('frontend::post.detail.get',$d->slug)}}">Xem tiếp <i class="ti-angle-double-right"></i></a>
                               </div>
                           </div>
                       </div>
                       @endforeach


                   </div>

                   <div class="paginate_bm">
                    {{$list->links()}}
                       <!-- <ul>
                            <li><a href="">Trang đầu</a></li>
                           <li><a href="">1</a></li>
                           <li><a href="">2</a></li>
                           <li><a href="">3</a></li>
                           <li><a href="">4</a></li>
                           <li><a href="">Trang cuối</a></li>
                       </ul> -->
                   </div>

               </div>
               <div class="col-lg-4">
                  @include('frontend::blog.sidebar',['categoryChild'=>$categoryChild,'popularPost'=>$popularPost])
               </div>

            </div>



        </div>
    </section>


@endsection
