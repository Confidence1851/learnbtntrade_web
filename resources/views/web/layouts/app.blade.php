<!DOCTYPE html>
<html lang="en">
    @php
        $activePage =  $activePage ?? '';
    @endphp
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<meta name="robots" content="" />
	<meta name="description" content="EduZone - Education Collage & School HTML5 Template" />
	<meta property="og:title" content="EduZone - Education Collage & School HTML5 Template" />
	<meta property="og:description" content="EduZone - Education Collage & School HTML5 Template" />
	<meta property="og:image" content="" />
	<meta name="format-detection" content="telephone=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- FAVICONS ICON -->
	<link rel="icon" href="{{ $favicon_img }}" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ $favicon_img }}" />

	<!-- PAGE TITLE HERE -->
    <title>{{ $title ?? '' }} | LearnBtcTrade</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="{{ $web_source }}/js/html5shiv.min.js"></script>
	<script src="{{ $web_source }}/js/respond.min.js"></script>
	<![endif]-->

	<!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ $web_source }}/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ $web_source }}/css/skin/skin-4.css">
	<!-- Google Font -->
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
	</style>

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/plugins/revolution/revolution/css/revolution.min.css">
    <!-- Jquery Toast css -->
    <link href="{{asset('toast')}}/jquery.toast.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="{{ $web_source }}/css/custom.css">
</head>
<body id="bg">
<div class="page-wraper">
<div id="loading-area"></div>
	<!-- header -->
    <header class="site-header mo-left header">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix border-top">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion logo-dark">
                        <a href="{{ route('homepage') }}" class="d-flex">
                            <img src="{{ $logo_img }}" alt="" class="logo_img">
                            <span class="logo_text d-none d-md-block"> LearnBtcTrade</span>
                        </a>
					</div>
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <button id="quik-search-btn" type="button" class="site-button-link"  title="Search"><i class="la la-search"></i></button>
                            @auth
                            <a href="{{ route('cart.items') }}" id="quik-cart-btn" type="button" class="site-button-link" title="Go to cart">
                                <i class="fa fa-shopping-cart cart_icon_lg"></i>
                                <span class="cart_float_count cart_count">{{ getUserCart()->quantity }}</span>
                            </a>
                            <a href="javascript:void()" class="toggleFloatingMenu mr-3 d-none d-md-block">
                                <div class="avatar_box">
                                    <img src="{{ auth('web')->user()->getAvatar() }}"  class="img-responsive img-rounded toggleFloatingMenu" alt="">
                                </div>
                            </a>
                                <div id="floating_menu" class="d-none">
                                    <p><a href="{{ route('home')}}">Go to Dashboard</a></p>
                                    <p><a href="{{ route('homepage')}}">My Courses</a></p>
                                    <p><a href="{{ route('homepage')}}">Order History</a></p>
                                    <p><a href="{{ route('homepage')}}">Edit Profile</a></p>
                                    <hr>
                                    <p class="">
                                        <a href="{{ route('homepage')}}" class="">Logout</a>
                                    </p>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary mr-3">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-primary d-none d-md-block">Register</a>
                            @endauth
						</div>
                    </div>
                    <!-- Quik search -->
                    <div class="dlab-quik-search ">
                        <form role="search" method="get" action="{{ route('our_courses.course_search')}}">
                            <input name="keywords" class="form-control" value="{{ $search_keywords ?? '' }}" placeholder="Type to search for courses">
                            <span id="quik-search-remove" type="button"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<div class="logo-header d-md-block d-lg-none">
							<a href="index.html"><img src="{{ $web_source }}/images/logo-4.png" alt=""></a>
						</div>
                       <ul class="nav navbar-nav">
                            <li class="{{ $activePage == 'home' ? 'active' : ''}}">
								<a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li class="{{ $activePage == 'courses' ? 'active' : ''}}">
                            <a href="{{ route('our_courses.courses')}}">Courses</a>
                            </li>
                            <li class="{{ $activePage == 'blog' ? 'active' : ''}}">
                                <a href="{{ route('our_blog.blog_posts') }}">Blog</a>
                            </li>
                            <li class="{{ $activePage == 'signal' ? 'active' : ''}}">
								<a href="javascript:;">Services</a>
								<ul class="sub-menu right">
                                    <li><a href="{{ route('services.plans')}}">Plans</a></li>
									<li><a href="">Signal Results</a></li>
								</ul>
                            </li>
                        </ul>
                        @if(auth('web')->check())
                            <ul class="nav navbar-nav d-block d-md-none mt-5">
                                <li class="d-flex">
                                    <div class="avatar_box">
                                        <img src="{{ auth('web')->user()->getAvatar()}}"  class="img-responsive img-rounded" alt="">
                                    </div>
                                    {{ auth('web')->user()->fullName() }}
                                </li>
                                <li class="">
                                    <a href="{{ route('home') }}">Go to Dashboard</a>
                                </li>
                                <li class="{{ $activePage == 'courses' ? 'active' : ''}}">
                                <a href="{{ route('our_courses.courses')}}">My Courses</a>
                                </li>
                                <li class="{{ $activePage == 'blog' ? 'active' : ''}}">
                                    <a href="{{ route('our_blog.blog_posts') }}">Order History</a>
                                </li>
                                <li class="{{ $activePage == 'blog' ? 'active' : ''}}">
                                    <a href="{{ route('our_blog.blog_posts') }}">Logout</a>
                                </li>

                            </ul>
                        @endif
						<div class="dlab-social-icon">
							<ul>
								<li><a class="site-button circle fa fa-facebook" href="javascript:void(0);"></a></li>
								<li><a class="site-button  circle fa fa-twitter" href="javascript:void(0);"></a></li>
								<li><a class="site-button circle fa fa-linkedin" href="javascript:void(0);"></a></li>
								<li><a class="site-button circle fa fa-instagram" href="javascript:void(0);"></a></li>
							</ul>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->


    @yield('content')

    @php
        $hide_footer = $hide_footer ?? false;
    @endphp
    @if(!$hide_footer)
	<!-- Footer -->
    @include('web.layouts.footer')
    <!-- Footer END -->
    @endif
    <button class="scroltop style2 radius" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
@include('web.layouts.script')
@yield('scripts')
</body>
</html>
