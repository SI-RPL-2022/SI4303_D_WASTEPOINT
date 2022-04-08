<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>@yield('title')</title>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <!-- Page Icon -->
        <link rel="icon" href="{{ asset('images/icon-logo.png') }}" type="image/icon type">
        
        <!-- Custom fonts for this template-->
        <link href="{{ asset('sb-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        
        <!-- Custom styles for this template-->
        <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

        <!-- Local CSS -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <!-- Custom styles for this page -->
        <link href="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

    </head>

    <body id="page-top">

        <div id="wrapper">
            @include('components.sidebar')
            <div id="content-wrapper" class="d-flex flex-column min-vh-100">
                <div id="content">
                    @include('components.topbar')
                        @yield('content')
                    @include('components.bottombar')
                </div>
            </div>
        </div>
        
        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

        <!-- Page level plugins -->
        <script src="{{ asset('sb-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('sb-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('sb-admin/js/demo/datatables-demo.js') }}"></script>

    </body>
</html>