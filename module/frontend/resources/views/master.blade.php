@include('frontend::header')

@yield('content')
<!-- ================= footer start ========================= -->
@include('frontend::footer')


<!-- Jquery js-->
<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/bootstrap/js/bootsnav.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/bootstrap/js/wysihtml5-0.3.0.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/bootstrap/js/bootstrap-wysihtml5.js')}}"></script>
<script src="{{asset('frontend/assets/plugins/owlcarousel/owl.carousel.js')}}"></script>

<script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                dots: false,
                nav: false,
                  responsiveClass:true,
                  responsive:{
                      0:{
                          items:2,
                          nav:false
                      },
                      600:{
                          items:3,
                          nav:false
                      },
                      1000:{
                          items:4,
                          nav:false
                      }
                  }
              });
              $('.play').on('click', function() {
                owl.trigger('play.owl.autoplay', [1000])
              })
              $('.stop').on('click', function() {
                owl.trigger('stop.owl.autoplay')
              })
            })
          </script>

<script>
    $('#changeLang').on('change',function(e){
       url = $('#changeLang').val();
       window.location.href = url;
    });
</script>

@yield("js")
@yield("js-init")
@stack("js")
@stack("js-init")


</body>
</html>
