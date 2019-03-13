@include('admin.layouts.partials._header')
<body class="nav-md">
<div class="container body">
<div class="main_container">
  <!-- <div class="col-md-3 left_col"> -->
      <!-- sidebar menu -->      
      @include('admin.layouts.partials._sidebar')
      <!-- /sidebar menu -->
      <!-- nav -->
      @include('admin.layouts.partials._navigation')
      <!-- / nav -->  
      <!-- page content -->
      @yield('container')
      <!-- /page content -->
      <!-- footer content -->
      @include('admin.layouts.partials._footer')
      <!-- /footer content -->
      </div>
    </div>    
  </body>
</html>

   