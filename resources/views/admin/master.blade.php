@include('admin.includes.header')

<div id="wrapper">

@include('admin.includes.navbar')

    @yield('content')
     <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
@include('admin.includes.footer-script')

@include('admin.includes.footer')
