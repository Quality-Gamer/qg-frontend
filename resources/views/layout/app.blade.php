<!--

=========================================================
* Now UI Kit - v1.3.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-kit
* Copyright 2019 Creative Tim (http://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/now-ui-kit/blob/master/LICENSE.md)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <!-- CSRF Token --> 
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/home.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-kit.css?v=1.3.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../assets/css/chat.css" rel="stylesheet" />
  <link href="../assets/css/style.css" rel="stylesheet" />
 
   <!--   Core JS Files   -->
   <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVKjHMzN-gncXoFcOhL45VxYq7-XG1HsA"></script> -->
  <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-kit.js?v=1.3.0" type="text/javascript"></script>
  <!-- SendBird Chat -->
  <!-- <script src="../assets/sendbird/SendBird.min.js"></script> -->
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>

 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

</head>

<body class="login-page sidebar-collapse">
    <div id="app">
            @auth
                <div>
                <nav class="navbar navbar-expand-lg bg-blue">
                    <div class="container">
                    <a class="navbar-brand" href="/"><b><span class="text-gray fs-20">Quality</span><span class="text-green fs-20">Gamer</span></b></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar" data-nav-image="assets/img/blurred-image-1.jpg">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">
                            <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                            <p>Loja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                            <p>Conquistas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                            <p>Ranking</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/profile">
                            <p><img class="navbar-img" src="./assets/img/avatar/avatar-pikachu.png"></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                            <p><span class="mr-1 fs-12">2000</span><img class="navbar-img" src="./assets/img/icons/coin_green.png"></p>
                            </a>
                        </li>
                        <li class="nav-item mr-3">
                            <a class="nav-link" href="/profile">
                            <p><img class="navbar-img" src="./assets/img/icons/network.png"></p>
                            </a>
                        </li>
                        <form class="form-inline ml-auto" action="logout" method="post" data-background-color>
                            @csrf
                            <div class="form-group has-white">
                                <input type="submit" class="form-control bold" value="Sair">
                            </div>
                        </form>
                                        
                        </ul>
                    </div>
                    </div>
                </nav>
                </div>
            @endauth

        <main>
            <h2 align="center" style="text-transform: uppercase" class="text-orange">@yield('title')</h2>
            <div align="center" style="font-size:16px;"  id="page-alert"></div>
            @yield('content')

        </div>
    </main>

    @yield('scripts')

</body>
</html>
