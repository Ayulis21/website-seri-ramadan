<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin-template/assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('admin-template/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('admin-template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin-template/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    @stack('styles') <!-- Untuk tambahan CSS di halaman tertentu -->
</head>
<body>
    {{-- <div class="layout-wrapper">
        @include('admin.layouts.header')

        <div class="d-flex">
            <!-- Sidebar -->
            <aside class="sidebar">
                @include('admin.layouts.sidebar')
            </aside>

            <!-- Konten -->
            <main class="content-wrapper">
                <div class="content">
                    @yield('content')
                </div>
            </main>
        </div>
        @include('admin.layouts.footer') 
    </div> --}}

    @include('admin.layouts.header')
    @include('admin.layouts.sidebar')
    @yield('content')
    @include('admin.layouts.footer')


    <!-- JAVASCRIPT -->
    <script src="{{ asset('admin-template/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin-template/assets/libs/node-waves/waves.min.js') }}"></script>
    

    <!-- apexcharts -->
    <script src="{{ asset('admin-template/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('admin-template/assets/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('admin-template/assets/js/app.js') }}"></script>

    @stack('scripts') <!-- Untuk tambahan script di halaman tertentu -->
</body>
</html>
