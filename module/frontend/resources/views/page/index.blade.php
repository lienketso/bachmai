@extends('frontend::master')

@section('js')
    <script type="text/javascript" src="{{asset('frontend/assets/js/ajax.js')}}"></script>
@endsection

@section('js-init')
    <script type="text/javascript">
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
@endsection
@section('content')
    <div class="page-title">
        <div class="container">
            <div class="page-caption">
                <h2>{{$data->title}}</h2>
                <p>
                    <a href="{{route('frontend::home')}}" title="Home">{{trans('frontend.home')}}</a>
                    <i class="ti-angle-double-right"></i> {{$data->name}}
                </p>
            </div>
        </div>
    </div>

    <section class="content_blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content_blog_detail">
                        <h1>{{$data->name}}</h1>
                        <div class="detail_blog">
                            {!!$data->content!!}
                        </div>
                        <div class="share_post">
                            <p>
                                <i class="fa fa-share-alt"></i> Chia sẻ bài viết
                                <span><a target="_blank" href="http://www.facebook.com/sharer/sharer.php?u={{route('frontend::page.detail.get',$data->slug)}}">
                                        <i class="fa fa-facebook facebook-cl"></i></a></span>
                                <span><a target="_blank"
                                         href="https://twitter.com/intent/tweet?text={{$data->name}}&url={{route('frontend::page.detail.get',$data->slug)}}&via=TWITTER-HANDLER">
                                    <i class="fa fa-twitter twitter-cl"></i></a></span>
                                <span><a href=""><i class="fa fa-instagram instagram-cl"></i></a></span>
                            </p>
                        </div>

                    </div>

                    @if(!empty($commentList) && count($commentList)>0)
                        <div class="list_comment">
                            <h3>Top comments</h3>

                            <div class="list_comment_bao">
                                @foreach($commentList as $d)
                                    <div class="comment_item">
                                        <h5>{{$d->guest_name}}</h5>
                                        <p>{{stringDate($d->created_at)}} lúc {{showtime($d->created_at)}}</p>
                                        <div class="content_comment">
                                            {{$d->content}}
                                        </div>
                                        <div class="reply_comment">
                                            <a href="#frmComment" class="clickReply" data-parent="{{$d->id}}"><i class="fa fa-mail-reply-all"></i> Trả lời</a>
                                        </div>
                                    </div>
                                    @if(count($d->childs))
                                        @include('frontend::blog.temp.subcoment',['childs' => $d->childs])
                                    @endif
                                @endforeach

                            </div>


                        </div>
                    @endif

                    <div class="comment_post">
                        <h4>Comments</h4>
                        <p>Địa chỉ email của bạn sẽ được bảo mật</p>
                        <form method="post" class="frm_comment" id="frmComment">
                            {{csrf_field()}}
                            <input type="hidden" name="parent" id="parentID" value="{{0}}">
                            <div id="successComment">Send comment succesful !</div>
                            <div class="form-group form_alert">
                                <span class="sp_content">Please input your comment</span>
                                <textarea class="form-control txt_comment" name="content" id="contentCM" rows="4" placeholder="Nhập nội dung"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group form_alert">
                                        <span class="sp_name">Please input your name</span>
                                        <input type="text" class="form-control txt_comment" name="guest_name" id="guestName" placeholder="Họ và tên (*)">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group form_alert">
                                        <span class="sp_mail">Email is not valid</span>
                                        <input type="text" class="form-control txt_comment" name="guest_mail" id="guestMail" placeholder="Địa chỉ email (*)">
                                    </div>
                                </div>
                            </div>
                            <div class="btn_comment">
                                <button type="button" id="btnComment"
                                        data-post-id="{{$data->id}}"
                                        data-post-type="{{$data->post_type}}"
                                        data-url="{{route('ajax.create.comment.get')}}">Gửi comment</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection
