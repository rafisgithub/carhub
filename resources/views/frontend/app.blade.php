<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- ==== Favicon ==== -->
    <link rel="icon" type="image/png" href="assets/images/logo-sm.svg" />
    <!-- ==== All Css Links ==== -->
    @include('frontend.partials.styles')
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
   <x-footer.footer/>
    <!-- footer :: end  -->

    <!-- ==== All Javascript Files ==== -->
    @include('frontend.partials.scripts')
  </body>

</html>
