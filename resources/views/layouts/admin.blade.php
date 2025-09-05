<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Waste Management Sistem</title>
    <link rel="icon" href="{{ asset('favi.ico') }}" type="image/x-icon">
    <!-- AdminLTE 3 + deps via CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <!-- Daterangepicker CSS (global) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Bootstrap JS will be loaded by AdminLTE bundle -->
    <style>
        .bg-deep-green { background-color: #1C4B41 !important; }
        .navbar.bg-deep-green .nav-link, .navbar.bg-deep-green .navbar-brand, .navbar.bg-deep-green .navbar-text { color: #fff !important; }
        .brand-link.bg-deep-green { color: #fff !important; }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark bg-deep-green">
        <!-- Left navbar -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>



        <!-- Right navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                    <span class="ml-1">{{ auth()->user()->name ?? 'User' }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <span class="dropdown-item-text">{{ auth()->user()->email ?? '' }}</span>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="POST" class="px-3">
                        @csrf
                        <button class="btn btn-outline-danger btn-sm w-100" type="submit">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#1C4B41;">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="brand-link text-center bg-deep-green d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/logo-icon.webp') }}" alt="Logo" class="brand-image mr-2" style="height:24px;width:auto;object-fit:contain;opacity:.95;">
            <span class="brand-text font-weight-light">Dahana WMS</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('master-limbah.index') }}" class="nav-link {{ request()->routeIs('master-limbah.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-recycle"></i>
                            <p>Master Limbah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('data-limbah.index') }}" class="nav-link {{ request()->routeIs('data-limbah.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Data Limbah</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-metode.index') }}" class="nav-link {{ request()->routeIs('master-metode.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tools"></i>
                            <p>Master Metode</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-lokasi.index') }}" class="nav-link {{ request()->routeIs('master-lokasi.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-map-marker-alt"></i>
                            <p>Master Lokasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-pelaporan.index') }}" class="nav-link {{ request()->routeIs('master-pelaporan.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Master Pelaporan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-inventarisasi.index') }}" class="nav-link {{ request()->routeIs('master-inventarisasi.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-clipboard-list"></i>
                            <p>Master Inventarisasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-kemitraan.index') }}" class="nav-link {{ request()->routeIs('master-kemitraan.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>Master Kemitraan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('master-kajian.index') }}" class="nav-link {{ request()->routeIs('master-kajian.*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>Master Kajian</p>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page_title', 'Dashboard')</h1>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <footer class="main-footer small">
        <div class="float-right d-none d-sm-inline">Crafted with <i class="fas fa-heart text-danger"></i> by: <a href="https://terminalkoding.com" target="_blank" rel="noopener">Terminal Koding Teknologi</a></div>
        <strong>&copy; {{ date('Y') }} Waste Management Sistem</strong>
    </footer>
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- AdminLTE scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
@stack('scripts')
</body>
</html>
