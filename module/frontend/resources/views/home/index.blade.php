@extends('frontend::master')
@section('content')
<!-- ======================= Start Banner ===================== -->
<section class="home_latest pdt50">
    <div class="container">
        <div class="row flex_one">
            <div class="col-lg-6">
                <div class="img_latest">
                    <a href="#"><img src="{{public_url('frontend/assets/img/banner_bachmai.jpg')}}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="list_latest">
                    <ul>
                        <li><a href="{{route('frontend::doctor.search.get')}}">{{trans('frontend.find_doctor')}}</a></li>
                        <li><a href="{{ ($lang=='vn') ? link_action('blog/huong-dan') : link_action('blog/patient-instructions')}}">{{trans('frontend.visitor_guide')}}</a></li>
                        <li><a href="{{route('frontend::donate.index.get')}}">{{trans('frontend.giving_to')}}</a></li>
                        <li><a href="{{ ($lang=='vn') ? link_action('blog/hoat-dong-tu-thien') : link_action('blog/charity-activities')}}">{{trans('frontend.charity_activities')}}</a></li>
                        <li><a href="{{route('frontend::diseases.topic.get')}}">{{trans('frontend.diseases_conditions')}}</a></li>
                        <li><a href="{{route('frontend::home.contact.get')}}">{{trans('frontend.contact_bm')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= End Banner ===================== -->

<section class="latest_blog pdt100 pdb50">
    <div class="container">
        <p class="catcom_bm">{{trans('frontend.news_event')}}.</p>
        <h2 class="title_latest_blog">{{trans('frontend.news_tips')}}
            <span><a href="{{ ($lang=='vn') ? link_action('blog/tin-tuc-su-kien') : link_action('blog/news-and-event')}}">{{trans('frontend.view_all')}}</a></span></h2>
        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    @foreach($hotBlog as $d)
                    <div class="col-lg-6">
                        <div class="list_latest_blog">
                            <div class="thsn-featured-wrapper">
                                <a href="{{route('frontend::post.detail.get',$d->slug)}}">
                                <img loading="lazy" src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : public_url('admin/themes/images/no-image.png')}}"
                                     class="img_latest_blog" alt="{{$d->name}}">
                                </a>
                            </div>
                            <div class="themesion-box-content">
                                <div class="thsn-meta-container">
                                    <div class="post_date">
                                        <i class="fa fa-calendar"></i> {{stringDate($d->created_at)}}
                                    </div>
                                    <div class="thsn-meta-category-wrapper thsn-meta-line">
                                        <div class="post_category">
                                            <i class="fa fa-folder-o"></i> <a href="{{route('frontend::blog.index.get',$d->getCategoySlug())}}" rel="category tag">{{$d->getCategory()}}</a>
                                        </div>
                                    </div>
                                </div>
                                <h3 class="thsn-post-title"><a href="{{route('frontend::post.detail.get',$d->slug)}}">{{cut_string($d->name,60)}}</a></h3>
                                <div class="themesion-box-desc">
                                    <div class="themesion-box-desc-text">
                                        {{cut_string($d->description,100)}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="col-lg-4">
                <div class="recent_blog">
                    @foreach($homeBlog as $d)
                    <div class="list_recent">
                        <div class="thsn-meta-container">
                            <div class="post_date">
                                <i class="fa fa-calendar"></i> {{stringDate($d->created_at)}}
                            </div>
                            <div class="thsn-meta-category-wrapper thsn-meta-line">
                                <div class="post_category">
                                    <i class="fa fa-folder-o"></i> <a href="{{route('frontend::blog.index.get',$d->getCategoySlug())}}" rel="category tag">{{$d->getCategory()}}</a>
                                </div>
                            </div>
                        </div>
                        <h3 class="thsn-post-title"><a href="{{route('frontend::post.detail.get',$d->slug)}}">{{$d->name}}</a></h3>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</section>



<section class="find_condition pdt50 pdb50">
    <div class="container">
        <h3 class="title_section text-center">{{trans('frontend.find_diseases')}}</h3>
        <div class="row">
            <div class="col-lg-6">
                <div class="alphabet pdt50">
                    <p>{{trans('frontend.find_diseases_letter')}}</p>
                    <ol class="acces-alpha">
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'a'])}}">A</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'b'])}}">B</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'c'])}}">C</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'d'])}}">D</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'e'])}}">E</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'f'])}}">F</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'g'])}}">G</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'h'])}}">H</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'i'])}}">I</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'j'])}}">J</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'k'])}}">K</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'l'])}}">L</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'m'])}}">M</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'n'])}}">N</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'o'])}}">O</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'p'])}}">P</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'q'])}}">Q</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'r'])}}">R</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'s'])}}">S</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'t'])}}">T</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'u'])}}">U</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'v'])}}">V</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'w'])}}">W</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'x'])}}">X</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'y'])}}">Y</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'z'])}}">Z</a></li>
                        <li><a href="{{route('frontend::diseases.index.get',['letter'=>'all'])}}">#</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="list_topic pdt50">
                    <h4>{{trans('frontend.featured_topics')}}</h4>
                    <ul>
                        @foreach($allTopic as $d)
                            <li><a href="{{route('frontend::diseases.index.get',['topic'=>$d->slug])}}">{{$d->name}}</a></li>
                        @endforeach
                    </ul>
                    <div class="button_more"><a href="{{route('frontend::diseases.topic.get')}}">{{trans('frontend.see_more_diseases')}}</a></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="about_home pdt50 pdb50">
    <div class="container">
        <div class="col-lg-6">
            <div class="about_left">
                <a href="{{route('frontend::page.detail.get',$pageAbout->slug)}}"><img src="{{upload_url($pageAbout->thumbnail)}}" alt="{{$pageAbout->name}}"></a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="info_about">
                <h4>Visit Bach Mai Hospital</h4>
                <h3>{{$pageAbout->name}}</h3>
                <div class="intro_about">
                    {!! $pageAbout->description !!}
                </div>
                <div class="founder_bm">
                    <div class="sinuature_fd"><img src="{{public_url('frontend/assets/img/signature-img.png')}}" alt="Chữ ký giám đốc bệnh viện bạch mai"></div>
                    <div class="avatar_founder">
                        <div class="thsn-ihbox-icon">
                            <div class="img_founder">
                            <img src="{{public_url('frontend/assets/img/GS_Nguyen_Quang_Tuan.png')}}" alt="Nguyễn Quang Tuấn Giám đốc bệnh viện bạch mai">
                            </div>
                    </div>
                    <div class="thsn-ihbox-contents">
                            <h5 class="title_founder">
                                Mr Nguyen Quang Tuan
                            </h5>
                            <h6 class="thsn-element-heading">
                                {{trans('frontend.director')}}
                            </h6>
                        </div><!-- .thsn-ihbox-contents -->
                    </div>
                </div>

                <div class="check_list_bv">
                    <ul>
                        <li><i class="fa fa-check-circle"></i> {{trans('frontend.technique')}}</li>
                        <li><i class="fa fa-check-circle"></i> {{trans('frontend.hospital_bed')}}</li>
                        <li><i class="fa fa-check-circle"></i> {{trans('frontend.ministry_health')}}</li>
                        <li><i class="fa fa-check-circle"></i> {{trans('frontend.international')}}</li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="category_home pdt50 pdb50">
    <div class="container">
        <div class="desc_main_cat">
        <h3 class="title_cat">{{trans('frontend.institutes')}}</h3>
        <p>{{trans('frontend.list_of_affiliated')}}</p>
        </div>
        <div class="row">
            @foreach($hospitalHome as $d)
            <div class="col-lg-4">
                <div class="list_cate">
                    <a href="{{route('frontend::blog.index.get',$d->slug)}}"><i class="fa fa-folder-o"></i> {{$d->name}}</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section class="video_home pdb50 pdt50">
    <div class="container">
        <div class="desc_video">
            <h3 class="title_latest_video">{{trans('frontend.video_clip')}}
                <span><a href="{{route('frontend::video.index.get')}}"><i class="fa fa-video-camera"></i> {{trans('frontend.view_all')}}</a></span>
            </h3>
        </div>
        <div class="row">
            @if(!empty($videoHot))
            <div class="col-lg-7">
                <div class="video_hot">
                    <div class="iframe_video">
                        <iframe width="560" height="450" src="https://www.youtube.com/embed/{{youtube_id($videoHot->description)}}"
                                title="{{$videoHot->name}}"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                    </div>
                    <div class="desc_video_hot">
                        <div class="date_created_video">
                            <span><i class="fa fa-clock-o"></i> {{stringDate($videoHot->created_at)}}</span>
                            <span><i class="fa fa-eye"></i> {{$videoHot->count_view}} lượt xem</span>
                        </div>
                        <h4><a href="{{route('frontend::video.detail.get',$videoHot->slug)}}">{{$videoHot->name}}</a></h4>
                    </div>
                </div>
            </div>
            @endif


            <div class="col-lg-5">
                <div class="popular_video">
                    @if(!empty($videoHome))
                        @foreach($videoHome as $d)
                    <div class="list_popular">
                        <div class="thumbnail_video">
                            <a href="{{route('frontend::video.detail.get',$d->slug)}}">
                                <i class="fa fa-youtube-play"></i>
                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : getImgYoutube($d->description)}}" alt="{{$d->name}}">
                            </a>
                        </div>
                        <div class="desc_video_popular">
                            <h4><a href="{{route('frontend::video.detail.get',$d->slug)}}">{{$d->name}}</a></h4>
                        </div>
                    </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

@if(!empty($logoFooter))
<section class="link_def pdt50 pdb50">
    <div class="container">
        <div class="owl-carousel owl-theme">
            @foreach($logoFooter as $d)
            <div class="item">
              <a href="{{$d->link_url}}" target="_blank">
                  <img src="{{ ($d->path_name!='') ? upload_url($d->path_name) : public_url('admin/themes/images/no-img-logo.jpg')}}" alt="{{$d->name}}">
              </a>
            </div>
            @endforeach
          </div>
    </div>
</section>
    @endif

@endsection
