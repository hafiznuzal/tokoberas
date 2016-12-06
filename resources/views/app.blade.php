<!DOCTYPE html>
<html lang="en"> 

  <head>
 <!--  {{ url('css/bootstrap.min.css') }} -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Toko Beras | @yield('title')</title>

    <!-- Bootstrap -->
    <link href=" {{ url('bower_components/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href=" {{ url('bower_components/gentelella/build/css/custom.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href=" {{ url('bower_components/gentelella/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href=" {{ url('bower_components/gentelella/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href=" {{ url('bower_components/gentelella/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href=" {{ url('bower_components/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- jVectorMap -->
    <link href=" {{ url('bower_components/gentelella/production/css/maps/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet">
    @yield('css')

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('app.components.sidebar')
        </div>

        @include('app.components.topnav')

        <div class="right_col" role="main">
          @yield('content')
        </div>

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
<!-- jQuery -->

    <!-- jQuery -->
    <script src="{{ url('bower_components/gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ url('bower_components/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{ url('bower_components/gentelella/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{ url('bower_components/gentelella/vendors/nprogress/nprogress.js')}}"></script>
    <!-- Chart.js -->
    <script src="{{ url('bower_components/gentelella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{ url('bower_components/gentelella/vendors/bernii/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ url('bower_components/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{ url('bower_components/gentelella/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{ url('bower_components/gentelella/vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{ url('bower_components/gentelella/vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{ url('bower_components/gentelella/vendors/Flot/jquery.flot.resize.js')}}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ url('bower_components/gentelella/build/js/custom.js')}}"></script>

    @yield('js')
  </body>
</html>