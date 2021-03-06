<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$pageTitle}} | {{auth('web')->user()->getRole()}}</title>

	<!-- FAVICONS ICON -->
	<link rel="icon" href="{{ $favicon_img }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ $favicon_img }}" />


    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ $admin_source }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ $admin_source }}/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Multi Select Css -->
    <link href="{{ $admin_source }}/plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Animation Css -->
    <link href="{{ $admin_source }}/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="{{ $admin_source }}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

     <!-- Bootstrap Select Css -->
     <link href="{{ $admin_source }}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Morris Css -->
    <link href="{{ $admin_source }}/plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{ $admin_source }}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ $admin_source }}/css/themes/all-themes.css" rel="stylesheet" />

    <!-- suneditor -->
    <link rel="stylesheet" href="{{ $admin_source }}/plugins/suneditor/css/sample.css" media="all">
    <link href="{{ $admin_source }}/plugins/suneditor/css/suneditor.min.css" rel="stylesheet">
    <!-- codeMirror -->
    <link rel="stylesheet" href="{{ $admin_source }}/plugins/suneditor/css/codemirror.css">
    <!-- KaTeX -->
    <link rel="stylesheet" href="{{ $admin_source }}/plugins/suneditor/css/katex.min.css">


    <style>
        .upload_icon{
            position: relative;
            bottom: 40px;
            right: -190px;
            cursor: pointer;
            background-color: skyblue;
            width: 20px;
            height: 30px;
            border-radius: 100%;
            padding-top: 3.5px;
            padding-right: 27px;
            padding-left: 3px;
        }
        .rounded_{
            border-radius: 50% 40% !important;
        }
    </style>
</head>

<body class="theme-blue">
    {{-- @php
        $pendingInvestments = App\Models\Investment::where('status',0)->count();
        $pendingWithdrawals = App\Models\Withdrawal::where('status',0)->count();
    @endphp --}}
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/">LearnBtcTrade {{auth('web')->user()->getRole()}}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-cyan">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>4 sales made</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 22 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-red">
                                                <i class="material-icons">delete_forever</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy Doe</b> deleted account</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-orange">
                                                <i class="material-icons">mode_edit</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>Nancy</b> changed name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 2 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-blue-grey">
                                                <i class="material-icons">comment</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> commented your post</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 4 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">cached</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4><b>John</b> updated status</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 3 hours ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-purple">
                                                <i class="material-icons">settings</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>Settings updated</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> Yesterday
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <li class="">
                        <a href="" class=""  role="button" title="Pending Investments">
                            <i class="material-icons">timeline</i>
                        <span class="label-count">0</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="" class=""  role="button"  title="Pending Withdrawals">
                            <i class="material-icons">trending_up</i>
                            <span class="label-count">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{auth('web')->user()->getAvatar()}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth('web')->user()->name}} ({{auth('web')->user()->getRole()}})</div>
                    <div class="email">{{auth('web')->user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                        <li><a href="{{ route('edit.profile')}}"><i class="material-icons">person</i>Edit Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);" onclick=" document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            @if (auth('web')->user()->getRole() == "Administrator")
                @include("admin.layout.admin_sidebar")
            @endif
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">LearnBtcTrade Ltd.</a>.
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>

    <section class="content">
        @include('layouts.flash_message')
        @yield('content')
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ $admin_source }}/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ $admin_source }}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="{{ $admin_source }}/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{ $admin_source }}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ $admin_source }}/plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ $admin_source }}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{ $admin_source }}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{ $admin_source }}/plugins/multi-select/js/jquery.multi-select.js"></script>


    <!-- Morris Plugin Js -->
    {{-- <script src="{{ $admin_source }}/plugins/raphael/raphael.min.js"></script>
    <script src="{{ $admin_source }}/plugins/morrisjs/morris.js"></script>
    <script src="{{ $admin_source }}/js/pages/charts/morris.js"></script> --}}


    <!-- Custom Js -->
    <script src="{{ $admin_source }}/js/admin.js"></script>
    <script src="{{ $admin_source }}/js/pages/tables/jquery-datatable.js"></script>


    <script src="{{ $admin_source }}/js/script.js"></script>
    <script src="{{ $admin_source }}/js/user.js"></script>

    <!-- suneditor -->
    <script src="{{ $admin_source }}/plugins/suneditor/js/common.js"></script>
    <script src="{{ $admin_source }}/plugins/suneditor/js/suneditor.min.js"></script>
    <!-- codeMirror -->
    <script src="{{ $admin_source }}/plugins/suneditor/js/codemirror.min.js"></script>
    <script src="{{ $admin_source }}/plugins/suneditor/js/htmlmixed.js"></script>
    <script src="{{ $admin_source }}/plugins/suneditor/js/xml.js"></script>
    <script src="{{ $admin_source }}/plugins/suneditor/js/css.js"></script>
    <!-- KaTeX -->
    <script src="{{ $admin_source }}/plugins/suneditor/js/katex.min.js"></script>
    <script src="{{ $admin_source }}/plugins/suneditor/js/suneditor-init.js"></script>
{{-- 
 <!-- Ckeditor -->
 <script src="{{ $admin_source }}/plugins/ckeditor/ckeditor.js"></script>
 <script>
     $(function () {
         //CKEditor
         CKEDITOR.replace('ckeditor');
         CKEDITOR.config.height = 300;
     });
 </script> --}}
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                // $("#ckeditor").attr("id" , "")
                $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                    localStorage.setItem('activeTab', $(e.target).attr('href'));
                });
                var activeTab = localStorage.getItem('activeTab');
                if (activeTab) {
                    $('#nav-tab a[href="' + activeTab + '"]').tab('show');
                }
            });


            $(document).ready(function() {
                var activeTab = localStorage.getItem('activeTab');
                if (activeTab) {
                    $('#nav-tab a[href="' + activeTab + '"]').tab('show');
                }
            });
        })(jQuery);


    </script>


    @yield('scripts')

</body>

</html>
