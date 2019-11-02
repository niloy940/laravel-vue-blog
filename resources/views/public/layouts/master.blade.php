<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Vue SPA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- Add csrf token in forms -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- css -->
  <link href="https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic,700|Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="{{ asset('assets/public/asset/css') }}/bootstrap.css" rel="stylesheet" />
  <link href="{{ asset('assets/public/asset/css') }}/bootstrap-responsive.css" rel="stylesheet" />
  <link href="{{ asset('assets/public/asset/css') }}/fancybox/jquery.fancybox.css" rel="stylesheet">
  <link href="{{ asset('assets/public/asset/css') }}/jcarousel.css" rel="stylesheet" />
  <link href="{{ asset('assets/public/asset/css') }}/flexslider.css" rel="stylesheet" />
  <link href="{{ asset('assets/public/asset/css') }}/style.css" rel="stylesheet" />
  <!-- Theme skin -->
  <link href="{{ asset('assets/public/asset/skins') }}/default.css" rel="stylesheet" />
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png" />
  <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png" />
  <link rel="shortcut icon" href="ico/favicon.png" />

  <!-- =======================================================
    Author: Niloy Quazi
  ======================================================= -->
</head>

<body>
  <div id="app">
    <div id="wrapper">
      <!-- toggle top area -->
      <div class="hidden-top">
        <div class="hidden-top-inner container">
          <div class="row">
            <div class="span12">
              <ul>
                <li><strong>We are available for any custom works this month</strong></li>
                <li>Main office: Springville center X264, Park Ave S.01</li>
                <li>Call us <i class="icon-phone"></i> (123) 456-7890 - (123) 555-7891</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- end toggle top area -->
      <!-- start header -->
        @include('public.layouts.header')
      <!-- end header -->

      <!-- Main content -->
        <public-main></public-main>
      <!-- /.content -->

      <!-- start footer -->
        @include('public.layouts.footer')
      <!-- end footer -->
    </div>
  </div>


  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a>
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{ asset('js/app.js') }}"></script>

  <script src="{{ asset('assets/public/asset/js') }}/jquery.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.easing.1.3.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/bootstrap.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jcarousel/jquery.jcarousel.min.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.fancybox.pack.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.fancybox-media.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/google-code-prettify/prettify.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/portfolio/jquery.quicksand.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/portfolio/setting.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.flexslider.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.nivo.slider.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/modernizr.custom.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.ba-cond.min.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/jquery.slitslider.js"></script>
  <script src="{{ asset('assets/public/asset/js') }}/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="{{ asset('assets/public/asset/js') }}/custom.js"></script>

</body>
</html>
