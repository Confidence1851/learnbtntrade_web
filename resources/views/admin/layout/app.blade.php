<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$pageTitle}}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ $admin_source }}/favicon.ico" type="image/x-icon">

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


    <!-- Custom Css -->
    <link href="{{ $admin_source }}/css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ $admin_source }}/css/themes/all-themes.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="/">LearnBtcTrade Admin</a>
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
                        <a href="{{ route('pending_investments') }}" class=""  role="button" title="Pending Investments">
                            <i class="material-icons">timeline</i>
                        <span class="label-count">0</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('pending_withdrawals') }}" class=""  role="button"  title="Pending Withdrawals">
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
                    <img src="{{ $admin_source }}/images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} ({{Auth::user()->getRole()}})</div>
                    <div class="email">{{Auth::user()->email}}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a></li>
                            <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);" onclick=" document.getElementById('logout-form').submit();"><i class="material-icons">input</i>Sign Out</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf </form>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="{{$activePage == 'dashboard' ? 'active' : ''}}">
                        <a href="{{ route('home') }}">
                            <i class="material-icons">home</i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="{{$activeGroup == 'blog' ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">chat</i>
                            <span>Blog</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{$activePage == 'category' ? 'active' : ''}}">
                                <a href="{{ route('blog.categories.index') }}">Blog Categories</a>
                            </li>
                            <li class="{{$activePage == 'post' ? 'active' : ''}}">
                                <a href="{{ route('blog.posts.index') }}">Blog Posts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="{{$activeGroup == 'course' ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">book</i>
                            <span>Courses</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{$activePage == 'course_category' ? 'active' : ''}}">
                                <a href="{{ route('course.categories.index') }}">Course Categories</a>
                            </li>
                            <li class="{{$activePage == 'course_all' ? 'active' : ''}}">
                                <a href="{{ route('course.details.index') }}">Course Details</a>
                            </li>
                        </ul>
                    </li>



                    <li class="{{$activeGroup == 'users_transaction' ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Instructors</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{$activePage == 'debit' ? 'active' : ''}}">
                                <a href="{{ route('debit_trans') }}">All Instructors</a>
                            </li>
                            <li class="{{$activePage == 'credit' ? 'active' : ''}}">
                                <a href="{{ route('credit_trans') }}">Instructor Requests</a>
                            </li>
                        </ul>
                    </li>


                    <li class="{{$activeGroup == 'users_management' ? 'active' : ''}}">
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">person</i>
                            <span>Users</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="{{$activePage == 'sub_admins' ? 'active' : ''}}">
                                <a href="{{ route('home') }}">All Users</a>
                            </li>
                            <li class="{{$activePage == 'agents' ? 'active' : ''}}">
                                <a href="{{ route('agents.index') }}">Enrolled Users</a>
                            </li>
                        </ul>
                    </li>

                    <li class="header">INTERACTIONS</li>
{{--
                    <li class="{{$activeGroup == 'adverts' ? 'active' : ''}}">
                        <a href="{{ route('adverts.index') }}">
                            <i class="material-icons col-amber">rss_feed</i>
                            <span>Advertisements</span>
                        </a>
                    </li>
                    <li class="{{$activeGroup == 'annoucements' ? 'active' : ''}}">
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">volume_up</i>
                            <span>Annoucements</span>
                        </a>
                    </li> --}}

                    <li class="{{$activeGroup == 'subscribers' ? 'active' : ''}}">
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-green">volume_up</i>
                            <span>Newsletter Subscribers</span>
                        </a>
                    </li>

                    <li class="{{$activeGroup == 'referrals' ? 'active' : ''}}">
                        <a href="{{ route('referrals.index') }}">
                            <i class="material-icons col-red">volume_up</i>
                            <span>Referrals</span>
                        </a>
                    </li>
                    <hr>
                    {{-- <li class="{{$activeGroup == 'logs' ? 'active' : ''}}">
                    <a href="{{ route('logs.index') }}">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Logs</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2020 <a href="javascript:void(0);">Smart Guard Corp</a>.
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


    <!-- Custom Js -->
    <script src="{{ $admin_source }}/js/admin.js"></script>
    <script src="{{ $admin_source }}/js/pages/tables/jquery-datatable.js"></script>


    <script src="{{ $admin_source }}/js/script.js"></script>
    <script src="{{ $admin_source }}/js/user.js"></script>

 <!-- Ckeditor -->
 <script src="{{ $admin_source }}/plugins/ckeditor/ckeditor.js"></script>
 <script>
     $(function () {
         //CKEditor
         CKEDITOR.replace('ckeditor');
         CKEDITOR.config.height = 300;
     });
 </script>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
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
