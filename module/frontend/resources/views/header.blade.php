<!DOCTYPE html>
<html class="" lang="zxx">
<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}</title>
    <meta name="description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <link rel="canonical" href="{{domain_url()}}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{(isset($meta_title)) ? $meta_title : $setting['site_name_'.$lang]}}" />
    <meta property="og:description" content="{{(isset($meta_desc)) ? $meta_desc : $setting['site_description_'.$lang]}}" />
    <meta property="og:url" content="{{(isset($meta_url)) ? $meta_url : domain_url()}}" />
    <meta property="og:image" content="{{(isset($meta_thumbnail)) ? $meta_thumbnail : $setting['site_logo']}}" />
    <meta property="og:site_name" content="Liên Kết Số" />
    <meta name="twitter:card" content="summary_large_image" />
    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/logo-lks.png')}}" />

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/bootstrap/css/bootstrap-select.min.css')}}">
    <link href="{{asset('frontend/assets/plugins/bootstrap/css/bootsnav.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/plugins/icons/css/icons.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/fix.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/owlcarousel/assets/owl.theme.default.min.css')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&display=swap" rel="stylesheet">

    @yield('css')
    @stack('css')

</head>
<body class="utf_skin_area">

<section class="top_alert">
    <div class="container">

        <div class="alert_top">
            {!! $setting['site_top_info_'.$lang] !!}
        </div>

    </div>

</section>

<header class="header_bm">

<div class="tool_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 no-mobile">
                <div class="logo_home">
                    <a href="{{route('frontend::home')}}">
                    <img src="{{upload_url($setting['site_logo'])}}" alt="Logo benh vien bach mai">
                </a>
                </div>
            </div>
            <div class="col-lg-4 no-mobile">
                <div class="search_home">
                    <form method="get" action="{{route('frontend::search')}}">
                        <input type="text" class="txt_keyword" name="keyword" placeholder="{{trans('frontend.search_keyword')}}">
                        <button type="submit" class="btnSearch"></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 no-mobile">
                <div class="link_top">
                    <ul>
                        <li><a href="{{route('frontend::home.contact.get')}}">{{trans('frontend.contact_bm')}}</a></li>
                        <li><a href="{{route('frontend::doctor.search.get')}}">{{trans('frontend.find_doctor')}}</a></li>
                        <li><a href="{{ ($lang=='vn') ? link_action('blog/tuyen-dung') : link_action('blog/careers')}}">{{trans('frontend.career_on')}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 no-mobile">
                <div class="lang_top">
                    <div class="login_home">
                        <a href="#"><i class="fa fa-user"></i> {{trans('frontend.login_account')}}</a>
                    </div>
                    <div class="lang_home">
                        <select name="lang" id="changeLang">
                            <option value="{{route('frontend::lang','vn')}}" {{session('lang')=='vn' ? 'selected' : ''}}><i class="fa fa-globe"></i> Tiếng việt</option>
                            <option value="{{route('frontend::lang','en')}}" {{session('lang')=='en' ? 'selected' : ''}}><i class="fa fa-globe"></i> English</option>
                        </select>
                    </div>
                    <ul class="social_top">
                        <li><a target="_blank" href="{{$setting['site_facebook']}}"><i class="fa fa-facebook facebook-cl"></i></a></li>
                        <li><a target="_blank" href="{{$setting['site_twitter']}}"><i class="fa fa-twitter twitter-cl"></i></a></li>
                        <li><a target="_blank" href="{{$setting['site_instagram']}}"><i class="fa fa-instagram instagram-cl"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ======================= Start Navigation ===================== -->
<nav class="navbar navbar-default navbar-mobile white bootsnav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i> </button>
            <div class="no-desktop">
                <div class="logo_mobile">
                    <a href="{{route('frontend::home')}}"><img src="{{upload_url($setting['site_logo'])}}" width="70" alt="Logo benh vien bach mai"></a>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">

            @include('frontend::blocks.menu')  <!-- Menu data to app/providers/AppserverProvider -->

                <div class="no-desktop">
                    <div class="mobile_on_head">
                    <div class="lang_mobile">
                        <a href="{{route('frontend::lang','vn')}}"><img src="{{public_url('frontend/assets/img/vn.svg')}}" width="30"></a>
                        <a href="{{route('frontend::lang','en')}}"><img src="{{public_url('frontend/assets/img/en.svg')}}" width="30"></a>
                    </div>

                    </div>
                </div>


        </div>
    </div>
</nav>
<!-- ======================= End Navigation ===================== -->
</header>
