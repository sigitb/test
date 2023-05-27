<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Apps Product</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset("assets/images/favicon.ico") }}">

        <link href="{{ asset("assets/libs/select2/css/select2.min.css") }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset("assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/libs/spectrum-colorpicker2/spectrum.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css") }}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{ asset("assets/libs/@chenfengyuan/datepicker/datepicker.min.css") }}">

         <!-- DataTables -->
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />


        <!-- Bootstrap Css -->
        <link href="{{ asset("assets/css/bootstrap.min.css") }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset("assets/css/icons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset("assets/css/app.min.css") }}" id="app-style" rel="stylesheet" type="text/css" />
    </head>

    <body data-sidebar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">

            
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="index.html" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets/images/logo.svg") }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <p style="color: white">PT SINERGY TEKNOLOGI PBMTI.</p>
                                </span>
                            </a>

                            <a href="index.html" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset("assets/images/logo-light.svg") }}" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <p style="color: white">PT SINERGY TEKNOLOGI PBMTI.</p>
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="{{ asset("assets/images/users/avatar-1.jpg") }}" alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1" key="t-henry">{{ auth()->user()->name ?? "admin" }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('logout') }}"><i class="bx bx-log-out font-size-16 align-middle me-1"></i> <span key="t-profile">Logout</span></a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>