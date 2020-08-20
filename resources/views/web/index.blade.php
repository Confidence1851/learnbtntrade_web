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
								<img src="{{ $web_source }}/images/main-slider/dummy.png"  alt=""  data-lazyload="{{ $web_source }}/images/main-slider/slide11.jpg" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
								<!-- LAYER NR. 1 -->
								<!-- LAYERS -->
								<div class="tp-caption tp-shape tp-shapewrapper " id="slide-100-layer"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']"
									data-voffset="['0','0','0','0']"
									data-width="full" data-height="full"
									data-whitespace="nowrap"
									data-type="shape"
									data-basealign="slide"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
									data-textAlign="['left','left','left','left']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px;"> </div>
									<!-- LAYER NR. 1 -->
								<!-- BACKGROUND VIDEO LAYER -->
								{{-- <div class="rs-background-video-layer"
									data-forcerewind="on"
									data-volume="mute"
									data-videowidth="100%"
									data-videoheight="100%"
                                    data-videomp4="{{ $web_source }}/video/video2.mp4"
									data-videopreload="auto"
									data-videoloop="loop"
									data-aspectratio="16:9"
									data-autoplay="true"
									data-autoplayonlyfirsttime="false"
								></div> --}}

								<div class="tp-caption tp-shape tp-shapewrapper ov-tp "
									id="slide-100-layer-1"
									data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
									data-width="full"
									data-height="full"
									data-whitespace="nowrap"
									data-type="shape"
									data-basealign="slide"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 5;">
								</div>
								<div class="tp-caption "
									id="slide-100-layer-3"
									data-x="['center','center','center','center']" data-hoffset="['-90','45','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['-90','-100','-80','-90']"
									data-fontsize="['65','50','40','30']"
									data-lineheight="['75','60','50','40']"
									data-letterspacing="['2','2','2','2']"
									data-width="['1000','900','768','360']"
									data-height="none"
									data-whitespace="['normal','nowrap','normal','normal']"
									data-type="text"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
									data-textAlign="['left','left','center','center']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[10,10,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 600; white-space: normal; color: #fff; font-family:'Merriweather', serif;">
									New Students  <br/> Join Every Week
								</div>
								<!-- LAYER NR. 3 -->
								<div class="tp-caption"
									id="slide-100-layer-4"
									data-x="['center','center','center','center']" data-hoffset="['-265','-165','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['50','15','20','10']"
									data-fontsize="['18','16','14','14']"
									data-lineheight="['30','30','26','26']"
									data-width="['640','481','500','300']"
									data-height="none"
									data-whitespace="normal"
									data-type="text"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
									data-textAlign="['left','left','center','center']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Roboto',sans-serif;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
								</div>
								<!-- LAYER NR. 5 -->
								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="about-1.html" target="_blank"
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
								<!-- LAYER NR. 5 -->
								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="services-1.html" target="_blank"
									id="slide-100-layer-6"
									data-x="['center','center','center','center']" data-hoffset="['-360','-180','70','65']"
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
									style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase; border-radius:4px;"> Services
								</a>
							</li>
							<li data-index="rs-200" data-transition="fadethroughdark" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="default"  data-thumb=""  data-rotate="0"  data-saveperformance="off"  data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
								<!-- MAIN IMAGE -->
								{{-- <img src="{{ $web_source }}/images/main-slider/dummy.png"  alt=""  data-lazyload="{{ $web_source }}/images/main-slider/slide11.jpg" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina> --}}
								<!-- LAYER NR. 1 -->
								<div class="tp-caption tp-shape tp-shapewrapper " id="slide-200-layer"
									data-x="['center','center','center','center']"
									data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']"
									data-voffset="['0','0','0','0']"
									data-width="full" data-height="full"
									data-whitespace="nowrap"
									data-type="shape"
									data-basealign="slide"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"from":"opacity:0;","speed":1000,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"delay":"wait","speed":1000,"to":"opacity:0;","ease":"Power4.easeOut"}]'
									data-textAlign="['left','left','left','left']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 2;background-color:rgba(0, 0, 0, 0.2);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url(images/overlay/rrdiagonal-line.png)"> </div>
								<div class="tp-caption tp-shape tp-shapewrapper ov-tp "
									id="slide-200-layer-1"
									data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
									data-width="full"
									data-height="full"
									data-whitespace="nowrap"
									data-type="shape"
									data-basealign="slide"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":10,"speed":1000,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":1500,"frame":"999","to":"opacity:0;","ease":"Power4.easeIn"}]'
									data-textAlign="['inherit','inherit','inherit','inherit']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 5;">
								</div>
								<div class="tp-caption "
									id="slide-200-layer-3"
									data-x="['center','center','center','center']" data-hoffset="['-90','-150','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['-90','-100','-80','-90']"
									data-fontsize="['65','50','40','30']"
									data-lineheight="['75','60','50','40']"
									data-letterspacing="['2','2','2','2']"
									data-width="['1000','none','768','360']"
									data-height="none"
									data-whitespace="['normal','nowrap','normal','normal']"
									data-type="text"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
									data-textAlign="['left','left','center','center']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[10,10,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 6; min-width: 800px; max-width: 800px; font-weight: 600; white-space: normal; color: #fff; font-family: 'Poppins',sans-serif;">
									New Students  <br/> Join Every Week
								</div>
								<!-- LAYER NR. 3 -->
								<div class="tp-caption"
									id="slide-200-layer-4"
									data-x="['center','center','center','center']" data-hoffset="['-265','-165','0','0']"
									data-y="['middle','middle','middle','middle']" data-voffset="['50','15','20','10']"
									data-fontsize="['18','16','14','14']"
									data-lineheight="['30','30','26','26']"
									data-width="['640','481','500','300']"
									data-height="none"
									data-whitespace="normal"
									data-type="text"
									data-responsive_offset="off"
									data-responsive="off"
									data-frames='[{"delay":900,"speed":2000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:1.1;sY:1.1;skX:0;skY:0;opacity:0;","color":"#000000","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":500,"frame":"999","color":"#000000","to":"opacity:0;","ease":"nothing"}]'
									data-textAlign="['left','left','center','center']"
									data-paddingtop="[0,0,0,0]"
									data-paddingright="[0,0,0,0]"
									data-paddingbottom="[0,0,0,0]"
									data-paddingleft="[0,0,0,0]"
									style="z-index: 7; min-width: 640px; max-width: 640px; font-weight: 700; font-size: 18px; line-height: 30px; font-weight: 400; color: #fff; font-family: 'Poppins',sans-serif;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
								</div>
								<!-- LAYER NR. 5 -->
								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="about-1.html" target="_blank"
									id="slide-200-layer-5"
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
								<!-- LAYER NR. 5 -->
								<a class="tp-caption rev-btn tc-btnshadow btnhover14 tp-rs-menulink bg-primary"
									href="services-1.html" target="_blank"
									id="slide-200-layer-6"
									data-x="['center','center','center','center']" data-hoffset="['-360','-180','70','65']"
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
									style="z-index: 8;letter-spacing: 2px; white-space: nowrap; font-size: 12px; font-weight: 600; color: rgba(255,255,255,1);  text-transform: uppercase; border-radius:4px;"> Services
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
                        <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
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
                            <form action="script/mailchamp.php" method="post" class="dzSubscribe subscribe-box row align-items-center sp15">
                                <div class="col-lg-12">
                                    <div class="dzSubscribeMsg"></div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <input name="dzName" required="required" type="text" class="form-control" placeholder="Your Name ">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="input-group">
                                        <input name="dzEmail" required="required" type="email" class="form-control" placeholder="Your Email Address">
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
                    <div class="col-md-12 col-lg-4 contact-img-bx wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                        <img src="{{ $web_source }}/images/pic1.png" alt="">
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
                        <div class="rdx-thu"><img src="{{ $web_source }}/images/student1.png" alt=""></div>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-head">
                            <h2 class="title"> Welcome To LearnBtcTrade Academy</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-paint-brush"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Special Education</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-calendar"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Events</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary radius"> <a href="#" class="icon-cell"><i class="fa fa-book"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Full Day Session</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary radius"> <a href="#" class="icon-cell"><i class="fa fa-graduation-cap"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Pre Classes </h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-user"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">Qualified Teachers</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 m-b30">
                                <div class="icon-bx-wraper left serb">
                                    <div class="icon-bx-xs bg-secondry radius"> <a href="#" class="icon-cell"><i class="fa fa-clock-o"></i></a> </div>
                                    <div class="icon-content">
                                        <h5 class="rdx-tilte">24/7 Supports</h5>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam..</p>
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

        <!-- Testimonials blog -->
        <div class="section-full overlay-black-middle bg-secondry content-inner-2 wow fadeIn" data-wow-duration="2s" data-wow-delay="0.2s" >
            <div class="container">
                <div class="section-head text-white text-center">
                    <h2 class="title">What People Are Saying</h2>
                    <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
                </div>
                <div class="section-content">
                    <div class="testimonial-two-dots owl-carousel owl-none owl-theme owl-dots-primary-full owl-loaded owl-drag">
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text ">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic3.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic2.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text ">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic3.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic2.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="testimonial-15 quote-right">
                                <div class="testimonial-text">
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum</p>
                                </div>
                                <div class="testimonial-detail clearfix">
                                    <div class="testimonial-pic radius"><img src="{{ $web_source }}/images/testimonials/pic1.jpg" width="100" height="100" alt=""></div>
                                    <strong class="testimonial-name">David Matin</strong> <span class="testimonial-position">Student</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonials blog End -->
        <!-- Latest blog -->
        @if ($latestPosts->count() > 0)
            <div class="section-full content-inner bg-gray wow fadeIn" data-wow-duration="2s" data-wow-delay="0.4s">
                <div class="container">
                    <div class="section-head text-center">
                        <h2 class="title">Latest blog post</h2>
                        <p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
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
        <!-- Client logo -->
        <div class="section-full dlab-we-find bg-img-fix p-t20 p-b20 bg-white wow fadeIn" data-wow-duration="2s" data-wow-delay="0.6s">
            <div class="container">
                <div class="section-content">
                    <div class="client-logo-carousel mfp-gallery gallery owl-btn-center-lr owl-carousel owl-btn-3">
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"><a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo1.jpg" alt=""></a></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"> <a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo2.jpg" alt=""></a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"> <a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo1.jpg" alt=""></a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"> <a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo3.jpg" alt=""></a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"> <a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo4.jpg" alt=""></a> </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="ow-client-logo">
                                <div class="client-logo"> <a href="javascript:void(0);"><img src="{{ $web_source }}/images/client-logo/logo3.jpg" alt=""></a> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Client logo END -->
    </div>
</div>
<!-- Content END-->
@endsection
