<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="shortcut icon" href="images/favicon.png" type="image/png">-->

    <title>Lienketso CMS</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/Hover/hover.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/weather-icons/css/weather-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/ionicons/css/ionicons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/jquery-toggles/toggles-full.css')}}">
    <link rel="stylesheet" href="{{asset('admin/themes/lib/morrisjs/morris.css')}}">

    <link rel="stylesheet" href="{{asset('admin/themes/css/quirk.css')}}">

    <script src="{{asset('admin/themes/lib/modernizr/modernizr.js')}}"></script>
    <link rel="stylesheet" href="{{asset('admin/libs/confirm/jquery-confirm.css')}}">
    <link rel="stylesheet" href="{{asset('admin/jquery.notify.css')}}">
    <link rel="stylesheet" href="{{asset('admin/fix.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('admin/themes/lib/html5shiv/html5shiv.js')}}"></script>
    <script src="{{asset('admin/themes/lib/respond/respond.src.js')}}"></script>
    <![endif]-->
    @yield('css')
    @stack('css')
</head>

<body>

<header>
    @include('wadmin-dashboard::header')
</header>

<section>

    @include('wadmin-dashboard::sidebar')

    <div class="mainpanel">

        <!--<div class="pageheader">
          <h2><i class="fa fa-home"></i> Dashboard</h2>
        </div>-->

        <div class="contentpanel">
            @yield('content')
        </div><!-- contentpanel -->

    </div><!-- mainpanel -->

</section>

<script src="{{asset('admin/themes/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('admin/themes/lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('admin/themes/lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('admin/themes/lib/jquery-toggles/toggles.js')}}"></script>

<script src="{{asset('admin/themes/lib/morrisjs/morris.js')}}"></script>
<script src="{{asset('admin/themes/lib/raphael/raphael.js')}}"></script>

<script src="{{asset('admin/themes/lib/flot/jquery.flot.js')}}"></script>
<script src="{{asset('admin/themes/lib/flot/jquery.flot.resize.js')}}"></script>
<script src="{{asset('admin/themes/lib/flot-spline/jquery.flot.spline.js')}}"></script>

<script src="{{asset('admin/themes/lib/jquery-knob/jquery.knob.js')}}"></script>

<script src="{{asset('admin/themes/js/quirk.js')}}"></script>
<script src="{{asset('admin/themes/js/dashboard.js')}}"></script>
<script src="{{asset('admin/libs/confirm/jquery-confirm.js')}}"></script>
<script src="{{asset('admin/notify.js')}}"></script>
<script src="{{asset('admin/ajax.js')}}"></script>

<script type="text/javascript">
    // auto close
    $('.example-p-6').on('click', function(e){
        e.preventDefault();
        let _this = $(e.currentTarget);
        let url = _this.attr('data-url');
        $.confirm({
            title: 'Xác nhận xóa',
            content: 'Bạn có chắc chắn muốn xóa dữ liệu không',
            autoClose: 'cancelAction|10000',
            escapeKey: 'cancelAction',
            buttons: {
                confirm: {
                    btnClass: 'btn-red',
                    text: 'Xóa dữ liệu',
                    action: function(){
                        location.href = url;
                    }
                },
                cancelAction: {
                    text: 'Hủy',
                    action: function(){
                        $.alert('Đã hủy xóa dữ liệu !');
                    }
                }
            }
        });
    });

</script>

@yield("js")
@yield("js-init")
@stack("js")
@stack("js-init")

</body>
</html>
