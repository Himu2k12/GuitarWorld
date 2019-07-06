@include('font.includes.header')
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Wrapper Start -->
<div class="wrapper">
   @include('font.includes.navbar')

       @yield('content')

   @include('font.includes.footer')
    <!-- Footer End -->
</div>
<!-- Wrapper End -->
@include('font.includes.footer-script')