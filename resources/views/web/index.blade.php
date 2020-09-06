@extends('web.layouts.app' , ['title' => 'Home'])
@section('content')
<div id="loading-area" style="background-image: url({{ $logo_img }});"></div>
<!-- Content -->
<div class="page-content bg-white">
   <!-- Slider -->
	<div class="main-slider style-two default-banner" id="home">
		<div class="tp-banner-container">
			<div class="tp-banner" >
				<div id="welcome_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="reveal-add-on36" data-source="gallery" style="background:#ffffff;padding:0px;">
					<!-- START REVOLUTION SLIDER 5.4.7.2 fullscreen mode -->
					<div id="welcome" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.4.7.2">
						<ul>
							<!-- SLIDE  -->
							<li data-index="rs-100" data-transition="slideoververtical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
								<!-- MAIN IMAGE -->
								<img src="{{ $web_source }}/images/main-slider/slider1.png"  alt=""  data-lazyload="{{ $web_source }}/images/main-slider/slider1.png" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
                                <!-- LAYER NR. 1 -->

								<!-- LAYERS -->
								 <!-- BACKGROUND VIDEO LAYER -->
								<!-- LAYER NR. 5 -->
								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="{{ route('about_us') }}" target="_blank"
									id="slide-100-layer-5"
									data-x="['center','center','center','center']" data-hoffset="['-515','-340','-85','-65']"
									data-y="['middle','middle','middle','middle']" data-voffset="['140','100','100','100']"
									data-lineheight="['18','18','18','18']"
									data-whitespace="nowrap"
									data-type="button"
									data-actions=''
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
									data-textAlign="['center','center','center','center']"
									data-paddingtop="[15,15,15,10]"
									data-paddingright="[30,30,30,20]"
									data-paddingbottom="[15,15,15,10]"
									data-paddingleft="[30,30,30,20]"
									style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase; border-radius:4px;"> About Us
								</a>

                            </li>
                            <li data-index="rs-100" data-transition="slideoververtical" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
								<!-- MAIN IMAGE -->
								<img src="{{ $web_source }}/images/main-slider/slider2.jpeg"  alt=""  data-lazyload="{{ $web_source }}/images/main-slider/slider2.jpeg" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>

								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="{{ route('about_us') }}" target="_blank"
									id="slide-100-layer-5"
									data-x="['center','center','center','center']" data-hoffset="['-515','-340','-85','-65']"
									data-y="['middle','middle','middle','middle']" data-voffset="['140','100','100','100']"
									data-lineheight="['18','18','18','18']"
									data-whitespace="nowrap"
									data-type="button"
									data-actions=''
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"x:-50px;z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;fbr:100;","bgcolor":"#000000","to":"o:1;fbr:100;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","bgcolor":"#000000","to":"opacity:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"150","ease":"Power1.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;fbr:90%;","style":"c:rgba(255,255,255,1);"}]'
									data-textAlign="['center','center','center','center']"
									data-paddingtop="[15,15,15,10]"
									data-paddingright="[30,30,30,20]"
									data-paddingbottom="[15,15,15,10]"
									data-paddingleft="[30,30,30,20]"
									style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase; border-radius:4px;"> About Us
								</a>

                            </li>
						</ul>
						<div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
					</div>
				</div>
				<!-- END REVOLUTION SLIDER -->
			</div>
		</div>
    </div>


    <!-- contact area -->
    <div class="content-block">
        {{-- Featured Courses --}}
        @if($featuredCourses->count() > 0)
            <div class="section-full bg-gray content-inner about-carousel-ser">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">Featured Courses</h2>
                        <p>
                            Get Unlimited access to our Mini & Professional Course with premium Mentorship
                        </p>
                    </div>
                        <div class="row">
                            @foreach ($featuredCourses as $course)
                                <div class="col-md-4">
                                    @include('web.fragments.course_item')
                                </div>
                            @endforeach
                        </div>
                </div>
            </div>
        @endif

        <!-- Our Projects  -->
        <div class="section-full bg-img-fix content-inner-2 overlay-black-dark contact-action style2" style="background-image:url({{ $web_source }}/images/background/bg2.jpg);">
            <div class="container">
                <div class="row relative">
                    <div class="col-md-12 col-lg-8 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="contact-no-area">
                            <h2 class="title">Subscribe to our newsletter and be the first to get the latest updates.</h2>
                            <form class="subscribe_form subscribe-box row align-items-center sp15" action="{{ route('subscribe_email') }}" method="post">@csrf
                                <div class="col-lg-12">
                                    <div class="dzSubscribeMsg"></div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <input name="name" required="required" type="text" class="form-control" placeholder="Your Name ">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <input name="email" required="required" type="email" class="form-control" placeholder="Your Email Address">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <button name="submit" value="Submit" type="submit" class="site-button btn-block btnhover13">Subscribe</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div style="border-color: #F7F9FB" class="col-md-12 col-lg-4 contact-img-bx wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div id="crypto_widget"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Projects END -->
        <!-- Our Services -->
        <div class="section-full bg-white content-inner">
            <div class="container">
                <div class="row service-area-one">
                    <div class="col-lg-4 m-b30 hidden-sm">
                        <div class="rdx-thu"><img src="{{ $web_source }}/images/services.jpeg" alt=""></div>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-head">
                            <h2 class="title">What we offer include</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-paint-brush"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Free Beginner’s Training Course</h5>
                                        <p>
                                            Our beginner’s training course takes you through the basics of cryptocurrency trading and investments, and it’s absolutely free!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary radius"> <a href="#" class="icon-cell"><i class="fa fa-graduation-cap"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Daily Trading Signals</h5>
                                        <p>
                                            We keep you up-to-date with the most
                                            recent happenings in the crypto space. Don’t go anywhere else.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-calendar"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Professional Training Course on Trading</h5>
                                        <p>
                                            Trade as a pro that you’ll become after
                                            completing our professional training course on trading. At Learnbtctrade we build
                                            your skills in the science of trading, with proven working strategies to get the best
                                            results from cryptocurrency trading.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary radius"> <a href="#" class="icon-cell"><i class="fa fa-book"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Mentorship Program and Coaching</h5>
                                        <p>
                                            We provide you an intensive guide to
                                            mastering the science of trading, with our team of expert and experienced traders.
                                            Let us, here at Learnbtctrade, catapult you to your desired height of know-how and
                                            expertise in the trading world
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-user"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Cryptocurrencies and Blockchain Education</h5>
                                        <p>
                                            We provide you with a truckload of
                                            cryptocurrency trading and investment tips, as well as blockchain education to keep
                                            you ahead in our evolving world. Blockchain Technology is the next biggest problem
                                            solver, and you should go the right way by thriving to solve problems with the use of
                                            blockchain technology, just like us.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left serb">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-clock-o"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Real Time Charts of Cryptocurrencies Price Value</h5>
                                        <p>
                                            Here, we provide you real
                                            time charts to monitor your favourite cryptocurrencies at all time. You may be offline,
                                            but remember the market isn’t!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left serb">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-clock-o"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Latest Update in the Crypto/ Blockchain Industry:</h5>
                                        <p>
                                            Get aware of new projects in
                                            the crypto/ blockchain industry as we update you on new coins listing and more.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left serb">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-clock-o"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Crypto Airdrops</h5>
                                        <p>
                                            Airdrops are known to be used as marketing stunts to promote an
                                            upcoming coin. We make sure our students lay their hands on totally valid crypto
                                            airdrops
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services End -->
        <!-- Company staus -->
        <div class="section-full text-white bg-img-fix content-inner overlay-black-dark counter-staus-box"">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 m-b30 wow fadeInUp counter-style-5" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="icon-bx-wraper center">
                            <div class="icon-content">
                                <h2 class="dlab-tilte counter">{{ $stats['students'] }}</h2>
                                <p>Happy Students</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-b30 wow fadeInUp counter-style-5" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="icon-bx-wraper center">
                            <div class="icon-content">
                                <h2 class="dlab-tilte counter">{{ $stats['courses'] }}</h2>
                                <p>Approved Courses</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-b30 wow fadeInUp counter-style-5" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="icon-bx-wraper center">
                            <div class="icon-content">
                                <h2 class="dlab-tilte counter">{{ $stats['instructors'] }}</h2>
                                <p>Verified Instructors</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Company staus End -->

        @if ($testimonials->count() > 0)
            <!-- Testimonials blog -->
            <div class="section-full overlay-black-middle bg-secondry content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" >
                <div class="container">
                    <div class="section-head text-white text-center">
                        <h2 class="title">What People Are Saying</h2>
                        <p>
                            First-hand testimonies from those who have enrolled for our courses
                        </p>
                    </div>
                    <div class="section-content">
                        <div class="testimonial-two-dots owl-carousel owl-none owl-theme owl-dots-primary-full owl-loaded owl-drag">
                            @foreach($testimonials as $testimonial)
                                @include('web.fragments.testimonial_item')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonials blog End -->
        @endif

        <!-- Latest blog -->
        @if ($latestPosts->count() > 0)
            <div class="section-full content-inner bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">Latest blog post</h2>
                    </div>
                    <div class="blog-carousel owl-none owl-carousel">
                            @foreach ($latestPosts as $post)
                                @include('web.fragments.blog_carousel_item')
                            @endforeach
                    </div>
                </div>
            </div>
        @endif
        <!-- Latest blog END -->
        @include('web.fragments.trading_view')
    </div>
</div>
<!-- Content END-->
@endsection
