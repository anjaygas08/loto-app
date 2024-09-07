<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ !empty($header_title) ? $header_title : '' }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('assets/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/trix-editor/css/trix.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
  <style>
    trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
    }
  </style>
  @yield('style')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    @include('user.layouts.header')
    @yield('content')
    @include('admin.layouts.footer')
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ url('assets/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ url('assets/dist/js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ url('assets/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ url('assets/plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ url('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ url('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ url('assets/plugins/chart.js/Chart.min.js') }}"></script>
  <!-- AdminLTE for demo purposes -->
  {{-- <script src="{{ url('assets/dist/js/demo.js') }}"></script> --}}
  {{-- Trix Editor --}}
  <script type="text/javascript" src="{{ url('assets/plugins/trix-editor/js/trix.min.js') }}"></script>
  {{-- Bootstrap-datepicker --}}
  <script type="text/javascript" src="{{ url('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>

  <script type="text/javascript">
    var data = "yyyy-mm-dd hh:mm:ss";
    document.getElementById("date").valueAsDate = new Date(data);

  </script>
  @yield('script')
</body>
</html>
