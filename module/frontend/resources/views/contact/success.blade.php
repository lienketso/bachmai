<html class="no-js" lang="zxx"><head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success gửi tin</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('frontend/assets/img/favicon.png')}}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('frontend/assets/plugins/bootstrap/css/bootsnav.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/assets/css/responsive.css')}}" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600&amp;display=swap" rel="stylesheet">

</head>
<body class="home-2">
<div class="wrapper">
    <section>
        <div class="container">
            <div class="error-page padd-top-30 padd-bot-30">
                <h1 class="mrg-top-15 mrg-bot-0 cl-danger font-150 font-bold">Success</h1>
                <h2 class="mrg-top-10 mrg-bot-5 funky-font font-40">{{trans('frontend.send_success')}} !</h2>
                <p>Xin chào <strong>{{$data['name']}}</strong>, {{trans('frontend.from_message')}}</p>
                <span>{{trans('frontend.feedback_desc')}}</span>
                <a href="{{route('frontend::home')}}" class="btn theme-btn-trans mrg-top-20">{{trans('frontend.go_to_home')}}</a>
            </div>
        </div>
    </section>
</div>

</body></html>
