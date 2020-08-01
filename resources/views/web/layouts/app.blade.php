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
	<link rel="icon" href="{{ asset($web_source) }}/images/favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset($web_source) }}/images/favicon.png" />

	<!-- PAGE TITLE HERE -->
    <title>{{ $title ?? '' }} | LearnBtcTrade</title>

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>
	<script src="{{ asset($web_source) }}/js/html5shiv.min.js"></script>
	<script src="{{ asset($web_source) }}/js/respond.min.js"></script>
	<![endif]-->

	<!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset($web_source) }}/css/plugins.css">
	<link rel="stylesheet" type="text/css" href="{{ asset($web_source) }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset($web_source) }}/css/templete.css">
	<link class="skin" rel="stylesheet" type="text/css" href="{{ asset($web_source) }}/css/skin/skin-4.css">
	<!-- Google Font -->
	<style>
	@import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
	</style>

	<!-- REVOLUTION SLIDER CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset($web_source) }}/plugins/revolution/revolution/css/revolution.min.css">
    <!-- Jquery Toast css -->
    <link href="{{asset('toast')}}/jquery.toast.min.css" rel="stylesheet" type="text/css" />
<style>

.jq-toast-wrap {
    z-index: 90000000!important;
}
</style>
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
						<a href="{{ route('homepage') }}"><img src="{{ asset($web_source) }}/images/logo-4.png" alt=""></a>
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
                            <button id="quik-search-btn" type="button" class="site-button-link"><i class="la la-search"></i></button>
                            @auth
                                <a href="{{ route('home') }}" class="btn btn-outline-primary mr-3">Logo</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-outline-primary mr-3">Login</a>
                                <a href="{{ route('register') }}" class="btn btn-primary d-none d-md-block">Register</a>
                            @endauth
						</div>
                    </div>
                    <!-- Quik search -->
                    <div class="dlab-quik-search ">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span id="quik-search-remove"><i class="ti-close"></i></span>
                        </form>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-end" id="navbarNavDropdown">
						<div class="logo-header d-md-block d-lg-none">
							<a href="index.html"><img src="{{ asset($web_source) }}/images/logo-4.png" alt=""></a>
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
								<a href="javascript:;">Signals</a>
								<ul class="sub-menu right">
									<li><a href="">Plans</a></li>
									<li><a href="">Results</a></li>
								</ul>
							</li>

						</ul>
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


	<!-- Footer -->
    <footer class="site-footer footer-center">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center m-b30">
                        <h2 class="text-white m-b5">A Short Story About Us </h2>
						<p class="max-w600 p-b20 m-auto">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
						<div class="max-w500 m-auto m-t30 subscribe-form">
							<form class="dzSubscribe" action="script/mailchamp.php" method="post">
								<div class="dzSubscribeMsg"></div>
								<div class="input-group">
									<input name="dzEmail" required="required"  class="form-control" placeholder="Your Email Id" type="email">
									<span class="input-group-btn">
										<button name="submit" value="Submit" type="submit" class="site-button btnhover14">Subscribe</button>
									</span>
								</div>
							</form>
						</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer bottom part -->
        <div class="footer-bottom text-center">
            <div class="container p-tb10">
				<div class="row">
                    <div class="col-md-12 col-sm-12 m-b30 logo-white">
						<img src="{{ asset($web_source) }}/images/logo-white-4.png" alt="" width="180">
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
						<div class="widget-link ">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="about-1.html">About</a></li>
								<li><a href="help-desk.html">Help Desk</a></li>
								<li><a href="privacy-policy.html">Privacy Policy</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 m-t20">
						<ul class="list-inline">
							<li><a href="javascript:void(0);" class="site-button-link facebook hover"><i class="fa fa-facebook"></i></a></li>
							<li><a href="javascript:void(0);" class="site-button-link google-plus hover"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="javascript:void(0);" class="site-button-link linkedin hover"><i class="fa fa-linkedin"></i></a></li>
							<li><a href="javascript:void(0);" class="site-button-link instagram hover"><i class="fa fa-instagram"></i></a></li>
							<li><a href="javascript:void(0);" class="site-button-link twitter hover"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->
    <button class="scroltop style2 radius" type="button"><i class="fa fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset($web_source) }}/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="{{ asset($web_source) }}/plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="{{ asset($web_source) }}/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset($web_source) }}/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ asset($web_source) }}/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="{{ asset($web_source) }}/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="{{ asset($web_source) }}/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ asset($web_source) }}/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="{{ asset($web_source) }}/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="{{ asset($web_source) }}/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="{{ asset($web_source) }}/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="{{ asset($web_source) }}/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="{{ asset($web_source) }}/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="{{ asset($web_source) }}/plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
<script src="{{ asset($web_source) }}/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ asset($web_source) }}/js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{ asset($web_source) }}/plugins/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="{{ asset($web_source) }}/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="{{ asset($web_source) }}/plugins/rangeslider/rangeslider.js" ></script><!-- Rangeslider -->
<script src="{{ asset($web_source) }}/js/jquery.lazy.min.js"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{ asset($web_source) }}/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{ asset($web_source) }}/js/rev.slider.js"></script>
<script>
jQuery(document).ready(function() {
	'use strict';
	dz_rev_slider_4();
	$('.lazy').Lazy();
});	/*ready*/
</script>
<!-- Tost-->
<script src="{{asset('toast')}}/jquery.toast.min.js"></script>

<!-- toastr init js-->
{{-- <script src="{{url('admin')}}/assets/js/pages/toastr.init.js"></script> --}}
<script>
	! function(p) {
		"use strict";
		var notifier;

		function t() {}
		t.prototype.send = function(t, i, o, e, n, a, s, r) {
				var c = {
					heading: t,
					text: i,
					position: o,
					loaderBg: e,
					icon: n,
					hideAfter: a = a || 3e3,
					stack: s = s || 1
				};
				r && (c.showHideTransition = r),
					console.log(c),
					p.toast().reset("all"),
					p.toast(c)
			},
			p.NotificationApp = new t,
			p.NotificationApp.Constructor = t
	}(window.jQuery),
	function(i) {
		notifier = i;
		"use strict";
	}(window.jQuery);

	function successMsg(title, msg) {
        console.log('dfdfjdjf');
		notifier.NotificationApp.send(title, msg, "top-right", "#5ba035", "success")
	}

	function errorMsg(title, msg) {
		notifier.NotificationApp.send(title, msg, "top-right", "#bf441d", "error")
	}
</script>
@include('web.layouts.script')
@yield('scripts')
</body>
</html>
