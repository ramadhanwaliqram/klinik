<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Medical Lab</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="plugins/css/style.css">


  <!-- =======================================================
  * Template Name: Medilab - v2.1.1
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope" style="color: red"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone" style="color: red"></i> +1 5589 55488 55
        <!-- <i class="icofont-google-map"></i> A108 Adam Street, NY -->
      </div>

    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/">Medilab</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li class="drop-down"><a href="">Apotek</a>
            <ul>
            <li><a href="{{route('apotek')}}">Apotek</a></li>
            <li><a href="{{route('tagihan')}}">Tagihan</a></li>
            </ul>
          </li>
          <li><a href="{{route('rekam-medis')}}">Rekam Medis</a></li>
          <li><a href="{{route('konsultasi')}}">Konsultasi</a></li>
          <li><a href="/#doctors">Dokter</a></li>
          @guest
          <li class="drop-down"><a href="#">Akses</a>
            <ul>
              <li>
                  <a href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
              @if (Route::has('register'))
                  <li>
                      <a href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
            </ul>
          </li>

          @else
          <li class="drop-down">
            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span></a>
            <ul>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                 @csrf
             </form></li>
            </ul>
          </li>
          @endguest
        </ul>
      </nav><!-- .nav-menu -->
      {{-- <a href="{{route('login')}}" class="appointment-btn scrollto" style="background-color: red">Masuk</a> --}}

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Selamat Datang</h1>
      <h2>Budaya Kerja Sehat, Unggul Dalam Layanan, Terdepan Dalam Informasi</h2>
      <a href="#about" class="btn-get-started scrollto" style="background-color: red">Ayo Mulai</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
  @yield('content')
    </main>

</body>

</html>
