<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="info_bm">
                <a href="{{route('frontend::home')}}"><img class="footer-logo" src="{{upload_url($setting['site_logo'])}}" alt="Logo footer"></a>
                <p>{!! $setting['site_footer_info_'.$lang] !!}</p>
                </div>
                <!-- Social Box -->
                <div class="f-social-box">
                    <ul>
                        <li><a target="_blank" href="{{$setting['site_facebook']}}"><i class="fa fa-facebook facebook-cl"></i></a></li>
                        <li><a target="_blank" href="{{$setting['site_twitter']}}"><i class="fa fa-twitter twitter-cl"></i></a></li>
                        <li><a target="_blank" href="{{$setting['site_instagram']}}"><i class="fa fa-instagram instagram-cl"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="row">
                    @if(isset($catFoot))
                        @foreach($catFoot as $d)
                    <div class="col-md-4 col-sm-6">
                        <h4 class="title_footer">{{$d->name}}</h4>
                        <ul class="list_footer">
                            @if($d->childs)
                                @foreach($d->childs as $c)
                            <li><a href="{{route('frontend::blog.index.get',$c->slug)}}"><i class="fa fa-angle-double-right"></i> {{$c->name}}</a></li>
                                @endforeach
                               @endif
                        </ul>
                    </div>
                        @endforeach
                    @endif

                    <div class="col-md-4 col-sm-6">
                        <h4 class="title_footer">{{trans('frontend.contact')}}</h4>
                        <div class="contact_footer">
                            <p><i class="glyphicon glyphicon-phone-alt"></i> {{trans('frontend.phone')}} : {{$setting['site_hotline_'.$lang]}}</p>
                            <p><i class="fa fa-map-marker"></i> {{trans('frontend.address')}} : {{$setting['site_address_'.$lang]}}</p>
                            <p><i class="fa fa-envelope-o"></i> Email : {{$setting['site_email_'.$lang]}}</p>
                            <p><i class="fa fa-globe"></i> Website : www.bachmai.gov.vn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="copyright text-center">
                    <p>Copyright © 2021 Bachmai.gov.vn All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
