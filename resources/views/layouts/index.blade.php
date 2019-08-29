<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  @include('layouts.header')
  <!-- END: Head-->
  <body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu 2-columns  " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    @include('layouts.navbar')
    <!-- END: Header-->
    {{-- add css --}}
    @stack('css')


    <!-- BEGIN: SideNav-->
   @include('layouts.sidebar')
    <!-- END: SideNav-->

    <!-- BEGIN: Page Main-->
    @yield('content')
    <!-- END: Page Main-->
    
    <!-- BEGIN: Footer-->

    @include('layouts.footer')
    @stack('js')

    @include('layouts.footerJs')
  </body>
</html>