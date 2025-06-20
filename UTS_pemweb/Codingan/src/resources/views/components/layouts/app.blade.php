<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <title>{{ $title ?? 'Foodee' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('front/favicon.ico') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('front/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <!-- Modernizr -->
    <script src="{{ asset('front/js/modernizr-2.6.2.min.js') }}"></script>

    @livewireStyles
  </head>
  <body>
    <div id="fh5co-page">
      <!-- Navbar -->
      <nav class="fh5co-nav" role="navigation">
        <div class="container">
          <div class="row">
            <div class="col-xs-2">
              <div id="fh5co-logo">
                <a href="{{ route('home') }}">Foodee</a>
              </div>
            </div>
            <div class="col-xs-10 text-right menu-1">
              <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('profile') }}">Profile</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      {{ $slot }}

      <!-- Footer -->
      <footer id="fh5co-footer" role="contentinfo">
        <div class="container text-center">
          <p>&copy; 2025 Foodee. All Rights Reserved.</p>
        </div>
      </footer>
    </div>

    <!-- JS Files -->
    <script src="{{ asset('front/js/jquery.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

    @livewireScripts
  </body>
</html>