@extends('frontend::master')
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>Video clips</h2>
                <p>
                    <a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
                    <i class="ti-angle-double-right"></i> Danh sách video clips
                </p>
            </div>
        </div>
    </div>

    <section class="video_page pdb50 pdt50">
        <div class="container">
            <div class="row">
                @foreach($data as $d)
                <div class="col-lg-6">
                    <div class="list_video">
                        <div class="img_video_item">
                            <a href="{{route('frontend::video.detail.get',$d->slug)}}">
                                <i class="fa fa-youtube-play"></i>
                                <img src="{{ ($d->thumbnail!='') ? upload_url($d->thumbnail) : getImgYoutube($d->description)}}" alt="{{$d->name}}">
                            </a>
                        </div>
                        <div class="desc_video_item">
                            <p>
                                <span><i class="fa fa-calendar"></i> {{stringDate($d->created_at)}}</span>
                                <span><i class="fa fa-eye"></i> {{$d->count_view}} lượt xem</span>
                            </p>
                            <h3><a href="{{route('frontend::video.detail.get',$d->slug)}}">{{$d->name}}</a></h3>
                        </div>
                    </div>
                </div>
                @endforeach


                <div class="paginate_bm">
                    {{$data->links()}}
                </div>

            </div>
        </div>
    </section>

@endsection
