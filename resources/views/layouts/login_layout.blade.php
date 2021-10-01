<!DOCTYPE html>
<html class="loading" lang="en">
  <!-- BEGIN : Head-->
    @include('includes.login_head')
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">

    @include('includes.login_header')
    <!-- Navbar (Header) Ends-->

    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      @include('includes.login_sidebar')

      <div class="main-panel">

        @yield('content')

        @include('includes.login_footer')

        <!-- Scroll to top button -->
        <button class="btn btn-primary scroll-top" type="button"><i class="ft-arrow-up"></i></button>

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- START Notification Sidebar-->
      @include('includes.login_notify')
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
      @include('includes.login_theme_builder')
    <!-- Theme customizer Ends-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN VENDOR JS-->
    <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/js/switchery.min.js')}}"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    {{-- <script src="{{asset('app-assets/vendors/js/chartist.min.js')}}"></script> --}}
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
    <script src="{{asset('app-assets/js/core/app.min.js')}}"></script>
    <script src="{{asset('app-assets/js/notification-sidebar.min.js')}}"></script>
    <script src="{{asset('app-assets/js/customizer.min.js')}}"></script>
    <script src="{{asset('app-assets/js/scroll-top.min.js')}}"></script>
    <script src="{{asset('app-assets/js/custom.js')}}"></script>

     <script src="{{asset('app-assets/vendors/js/select2.full.min.js')}}"></script>
     <script src="{{asset('app-assets/js/select2.min.js')}}"></script>
     <script src="{{asset('app-assets/js/validation.js')}}"></script>
    

    
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{asset('app-assets/js/dashboard1.min.js')}}"></script> --}}
    <!-- END PAGE LEVEL JS-->
  </body>
  <!-- END : Body-->
  <input type="hidden" id="base_url" value="{{URL('/')}}">
</html>