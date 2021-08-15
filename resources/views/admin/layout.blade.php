<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Non League Promoters</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/iconly/bold.css')}}">

    <link rel="stylesheet" href="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/app.css')}}">
</head>
<body>
<div id="app">
    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="{{route('admin.dashboard')}}" class="uppercase">Admin</a>
                    </div>
                </div>
            </div>

            <div class="sidebar-menu">
                @include('admin.partials.menu')

            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        @yield('page')



        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>{{date('Y')}} &copy; Non League Promoters</p>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="{{asset('admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/admin/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('admin/vendors/apexcharts/apexcharts.js')}}"></script>
<script src="{{asset('js/admin/pages/dashboard.js')}}"></script>
<script src="{{asset('js/admin/main.js')}}"></script>
</body>
</html>
