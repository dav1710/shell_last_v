<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf-token">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/file.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_panel/dist/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('leaflet/leaflet.css') }}" crossorigin="" />
    @yield('styles')

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

<body class="hold-transition sidebar-mini">
    <style>
        .card {
            overflow-x: scroll;
        }

        .nav-item.active a {
            color: #343a40;
            background-color: rgba(255, 255, 255, .9);
        }

        .page-item.active .page-link {
            background-color: #4f5962;
            border-color: #4f5962;
        }

        .page-link {
            color: #4f5962;
        }

        td {
            max-width: 300px;
        }

        .truncate p {
            display: -webkit-box;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
        }

        .truncate p:not(.truncate p:first-child, .truncate div ~ p) {
            display: none;
        }

        .font-bold {
            font-weight: bold !important;
        }

        .project-actions {
            min-width: 220px;
        }

        .small-box .icon>i.fa, .small-box .icon>i.fab, .small-box .icon>i.fad, .small-box .icon>i.fal, .small-box .icon>i.far, .small-box .icon>i.fas, .small-box .icon>i.ion {
            top: 50px;
        }
    </style>

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Գլխավոր</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Դուրս գալ</a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Shell</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex ">
                    <div class="info">
                        <h5 class="d-block text-light">{{ auth()->user()->name }}</h5>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/slide') ? 'active' : '' }}">
                          <a href="{{ route('slide.index') }}" class="nav-link">
                              <i class="nav-icon fa-solid fa-images"></i>
                              <p>Սլայդներ</p>
                          </a>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/service') ? 'active' : '' }}">
                            <a href="{{ route('service.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-newspaper"></i>
                                <p>Սերվիսներ</p>
                            </a>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/product') ? 'active' : '' }}">
                            <a href="{{ route('product.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-pager"></i>
                                <p>Ապրանքներ</p>
                            </a>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/about') ? 'active' : '' }}">
                            <a href="{{ route('about.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-table"></i>
                                <p>Մեր մասին</p>
                            </a>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/contact') ? 'active' : '' }}">
                            <a href="{{ route('contact.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-file-signature"></i>
                                <p>Կոնտակտներ</p>
                            </a>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/map') ? 'active' : '' }}">
                            <a href="{{ route('map.index') }}" class="nav-link">
                                <i class="nav-icon fa-solid fa-map"></i>
                                <p>Հասցեներ</p>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item {{ str_contains(Request::url(), 'admin/faq') ? 'active' : '' }}">
                            <a href="{{ route('faq.index') }}" class="nav-link">
                                <i class="nav-icon fa-regular fa-faq"></i>
                                <p>FAQ</p>
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
            @yield('content')
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; <a target="_blank" href="https://locator.am">Locator CJSC</a>.</strong>All rights
            reserved.
        </footer>

        @include('admin.messages')
    </div>
    <!-- ./wrapper -->

    <script src="{{ asset('admin_panel/dist/js/jquery.js') }}"></script>
    <script src="{{ asset('admin_panel/dist/js/font-awesome.js') }}"></script>
    <script src="{{ asset('admin_panel/dist/js/ckeditor.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('admin_panel/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('admin_panel/dist/js/file.js') }}"></script>
    <script src="{{ asset('leaflet/leaflet.js') }}" crossorigin=""></script>
    @yield('scripts')
</body>

</html>
