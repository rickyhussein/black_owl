<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ $title }}</title>
  {{-- logo --}}
  <link rel="shorcut icon" href="{{ url('assets/img/madrid.png') }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ url('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('adminlte/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/summernote/summernote-bs4.min.css') }}">

  {{-- select picker --}}
  <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ url('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  {{-- timepicker --}}
  <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css') }}">

  <style>
    .btn{
      border-radius: 10px
    }
    .card{
      border-radius: 20px
    }
    .borderi {
        border-color:rgb(201, 201, 201)
    }

    .bootstrap-select .dropdown-toggle {
        background-color: #ffffff !important;
        border: 1px solid #ced4da !important;
        color: #000;
        border-radius: 5px;
    }

    .flatpickr-input {
        background-color: #ffffff !important;
        border: 1px solid #ced4da !important;
        color: #000;
        border-radius: 5px;
        padding: 8px;
    }

    .flatpickr-input:focus {
        border-color: #adb5bd !important;
        box-shadow: none !important;
    }


  </style>

  @stack('style')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img src="{{ url('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div>



  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        @if (auth()->user()->hasRole('user'))
            <li class="nav-item">
                <a href="{{ url('/dashboard-user') }}" class="btn btn-warning nav-link"  style="color: white" onclick="return confirm('Are You Sure ?')">Dashboard User</a>
            </li>
        @endif

      </ul>

      <ul class="navbar-nav ml-auto">
          @yield('button')
      </ul>
  </nav>

  @include('partials.sidebar')


  <div class="content-wrapper">
    <section class="content">
        <br>
        <h1 class="text-center">{{ $title }}</h1>
        <br>
        @yield('isi')
    </section>
    <br><br>

  </div>

  @include('partials.footer')

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

@include('partials.script')
@stack('script')
@include('sweetalert::alert')

</body>
</html>
