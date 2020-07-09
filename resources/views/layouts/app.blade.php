<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Consultive | Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('public/qna/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700&amp;display=swap">
    <!-- Modal Video-->
    <link rel="stylesheet" href="{{asset('public/qna/vendor/modal-video/css/modal-video.min.css')}}">
    <!-- Leaflet-->
    <link rel="stylesheet" href="{{asset('public/qna/vendor/leaflet/leaflet.css')}}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{asset('public/qna/vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/qna/vendor/owl.carousel2/assets/owl.theme.default.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('public/qna/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('public/qna/css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    @stack("style")
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    @include('layouts._header')
    <!-- Services Section -->
    <section class="py-5">
      <div class="container container-fluid py-5 text-center">
        <header class="mb-5">
    @yield('content')
        </header>
      </div>
    </section>
    @include('layouts._footer')
    <!-- JavaScript files-->
    <script src="{{asset('public/qna/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/qna/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/qna/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/qna/vendor/modal-video/js/modal-video.js')}}"></script>
    <script src="{{asset('public/qna/vendor/leaflet/leaflet.js')}}"></script>
    <script src="{{asset('public/qna/js/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite - 
      //   see more here 
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {
      
          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot 
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
      
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    @stack("script")
  </body>
</html>