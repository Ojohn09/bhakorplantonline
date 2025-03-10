@php

$firstname =  Auth::user()->first_name;
   $lastname =  Auth::user()->last_name;
   $username = "$firstname $lastname"
//    $rolee =  Auth::user()->role_id;


@endphp





<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>BHAKOR ENERGY</title>
    <link rel="apple-touch-icon" href="{{  asset('backend/app-assets/images/ico/apple-icon-120.png')  }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{  asset('backend/app-assets/images/ico/favicon.ico')  }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/vendors.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/pickers/pickadate/pickadate.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/charts/apexcharts.css')  }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/extensions/toastr.min.css')  }}"> --}}


    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/bootstrap.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/bootstrap-extended.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/colors.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/components.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/themes/dark-layout.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/themes/bordered-layout.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/themes/semi-dark-layout.css')  }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/extensions/toastr.min.css')  }}"> --}}









    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/vendors/css/forms/select/select2.min.css')  }}">




    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/core/menu/menu-types/horizontal-menu.css')  }}">

    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/plugins/forms/pickers/form-pickadate.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/pages/dashboard-ecommerce.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/plugins/charts/chart-apex.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backendapp-assets/css/plugins/extensions/ext-component-toastr.css')  }}">




    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/assets/css/style.css')  }}">
    <link rel="stylesheet" type="text/css" href="{{  asset('backend/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css')  }}">



    <link rel="stylesheet" href="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.css') }}">
    <script src="{{ asset('node_modules/sweetalert2/dist/sweetalert2.min.js') }}"></script>



    <!-- END: Custom CSS-->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu  navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="">


    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center" data-nav="brand-center">
        <div class="navbar-header d-xl-block d-none">

            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="navbar-brand" href=""><span class="brand-logo">
                            <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="20">
                                <defs>
                                    <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                        <stop stop-color="#000000" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                    <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                        <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                        <stop stop-color="#FFFFFF" offset="100%"></stop>
                                    </lineargradient>
                                </defs>
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                        <g id="Group" transform="translate(400.000000, 178.000000)">
                                            <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                            <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                            <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                            <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                            <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </svg></span>
                        <h2 class="brand-text mb-0">BHAKOR ENERGY</h2>
                    </a></li>
            </ul>
        </div>
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>


            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">

                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>


                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{ $username }}</span></div><span class="avatar"><img class="round" src="{{  asset('backend/app-assets/images/portrait/small/logo.png')  }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href= {{ URL::to('/logout') }} ><i class="me-50" data-feather="mail"></i> Logout</a>

                    </div>
                </li>
            </ul>
        </div>
    </nav>


    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-shadow menu-border container-xxl" role="navigation" data-menu="menu-wrapper" data-menu-type="floating-nav">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item me-auto"><a class="navbar-brand" href="#"><span class="brand-logo">
                                <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                                    <defs>
                                        <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                            <stop stop-color="#000000" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                        <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                            <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                            <stop stop-color="#FFFFFF" offset="100%"></stop>
                                        </lineargradient>
                                    </defs>
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                            <g id="Group" transform="translate(400.000000, 178.000000)">
                                                <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                                <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                                <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                                <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                                <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </svg></span>
                            <h2 class="brand-text mb-0">BHAKOR ENERGY</h2>
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i></a></li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <!-- include ../../../includes/mixins-->
                <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">


                      <!-- Dashboard-->

                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="index.html" data-bs-toggle="dropdown"><i data-feather="home"></i><span data-i18n="Dashboards">Dashboard</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/dashboard') }} data-bs-toggle="" data-i18n="Analytics"><i data-feather="activity"></i><span data-i18n="Analytics">Analytics</span></a>
                            </li>

                        </ul>
                    </li>



                    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3 )


                    <!-- Information-->
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">INFORMATION PORTAL</span></a>
                        <ul class="dropdown-menu" data-bs-popper="none">
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/products') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">MY PRODUCTS</span></a>
                            </li>

                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/locations') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">MY LOCATIONS</span></a>
                            </li>
                            @endif
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/incomings') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">MY INCOMINGS</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/suppliers') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">MY SUPPLIERS</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/customers') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Customers</span></a>
                            </li>
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/coblogs') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">COB LOGS</span></a>
                            </li>
                            @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                            <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/inventories') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">INVENTORIES</span></a>
                            </li>
                            @endif


                        </ul>
                    </li>

                    @endif


                        <!-- POS-->
                        <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">POS</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/pos') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">MY SALES</span></a>
                                </li>
                            </ul>
                        </li>

                        @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3 )
                         <!-- HR-->
                         <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link d-flex align-items-center" href="#" data-bs-toggle="dropdown"><i data-feather="package"></i><span data-i18n="Apps">HR</span></a>
                            <ul class="dropdown-menu" data-bs-popper="none">
                                @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 2 )
                                {{-- <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/usertypes') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Usertypes</span></a>
                                </li> --}}
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/users') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Staff</span></a>
                                </li>
                                @endif
                                <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ URL::to('/attendances') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Attendance</span></a>
                                </li>
                                {{-- <li data-menu=""><a class="dropdown-item d-flex align-items-center" href={{ route('roles.index') }} data-bs-toggle="" data-i18n="Email"><i data-feather="mail"></i><span data-i18n="Email">Roles</span></a>
                                </li> --}}
                            </ul>
                        </li>

                        @endif





                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    {{-- <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Layout Empty</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Layouts</a>
                                    </li>
                                    <li class="breadcrumb-item active">Layout Empty
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a><a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a><a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a><a class="dropdown-item" href="app-calendar.html"><i class="me-1" data-feather="calendar"></i><span class="align-middle">Calendar</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="alert-body">
                                <strong>Info:</strong> This layout can be useful for getting started with empty content section. Please check
                                the&nbsp;<a class="text-primary" href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/documentation/documentation-layout-empty.html" target="_blank">Layout empty documentation</a>&nbsp; for more details.
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div> --}}


    @yield('admin_content')
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
        <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2023<a class="ms-25" href="#" target="_blank">JPMB TECHNOLOGIES</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="{{  asset('backend/app-assets/vendors/js/vendors.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/extensions/toastr.min.js')  }}"></script>




    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{  asset('backend/app-assets/vendors/js/ui/jquery.sticky.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/charts/apexcharts.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/popper/popper.min.js')  }}"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{  asset('backend/app-assets/js/core/app-menu.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/js/core/app.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/js/scripts/pages/dashboard-ecommerce.js')  }}"></script>
    <!-- END: Theme JS-->





    <script src="{{  asset('backend/app-assets/js/scripts/forms/form-select2.js')  }}"></script>
    <!-- BEGIN: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{  asset('backend/app-assets/js/core/app-menu.js')  }}"></script>
    {{-- <script src="{{  asset('backend/app-assets/vendors/js/jquery/jquery.min.js')  }}"></script> --}}
    <script src="{{  asset('backend/app-assets/vendors/js/popper/popper.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/js/core/app.js')  }}"></script>


    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/datatables.bootstrap5.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/jszip.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/pdfmake.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/vfs_fonts.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/buttons.html5.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/buttons.print.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')  }}"></script>


    <script src="{{  asset('backend/app-assets/js/scripts/tables/table-datatables-basic.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/js/scripts/tables/table-datatables-advanced.js')  }}"></script>
    <script src="{{  asset('backend/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js')  }}"></script>

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>

@if(Session::has('success'))
<script>
    Swal.fire({
        icon: "{{ Session::get('alert-type', 'success') }}",
        title: "{{ Session::get('success') }}",
        showConfirmButton: false,
        timer: 1500
    });
</script>
@endif


@if(Session::has('danger'))
    <script>
        Swal.fire({
            icon: "{{ Session::get('alert-type', 'error') }}",
            title: "{{ Session::get('danger') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif




</body>
<!-- END: Body-->

</html>
