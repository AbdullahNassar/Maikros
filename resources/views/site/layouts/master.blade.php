<!DOCTYPE html>
<html>
  <head>
    <!-- Meta Tags -->
    @yield('mata')
    <!-- Site Title -->
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{asset('vendors/site/EN/images/favicon.png')}}" type="image/x-icon">
    @yield('styles')
  </head>

  <body>
      @include('site.layouts.header')
      @yield('content')
      @include('site.layouts.footer')
      @yield('scripts')
      <script src="{{asset('vendors/login/js/jquery.validate.min.js')}}" type="text/javascript"></script>
      <script src="{{asset('vendors/login/js/login.js')}}" type="text/javascript"></script>
  </body>

</html>