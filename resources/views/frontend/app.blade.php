<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="assets/images/logo-sm.svg" />
    <!-- ==== All Css Links ==== -->
    @include('frontend.partials.style')
  </head>

  <body>
    <!-- header :: start -->
      @include('frontend.partials.header')
    <!-- header :: end -->

    <!-- main :: start -->
    <main>
     @yield('content')
    </main>
    <!-- main :: end -->

    <!-- footer :: start  -->
    @include('frontend.partials.footer')
    <!-- footer :: end  -->

    <!-- ==== All Javascript Files ==== -->
    @include('frontend.partials.script')
  </body>
  
</html>
 