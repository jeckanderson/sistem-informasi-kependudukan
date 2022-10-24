<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - {{ $title }}</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('vendor/css/sb-admin-2.min.css') }}" rel="stylesheet">
    {{-- Jquery --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <link href="{{ asset('vendor/vendor/jquery/jquery.min.js') }}" rel="stylesheet">
    {{-- Trix Editor CSS --}}
    <link rel="stylesheet" type="text/css" href="css/trix.css">
    {{-- <script type="text/javascript" src="/js/trix.js"></script>
    <style>
        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style> --}}

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        {{-- sidebar --}}
        @include('dashboard.templates.sidebar')

        {{-- Top Bar --}}
        @include('dashboard.templates.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('container')
                    
                </div>
                <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

    {{-- Footer --}}
    @include('dashboard.templates.footer')

