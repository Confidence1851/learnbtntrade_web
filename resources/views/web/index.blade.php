@extends('web.layouts.app' , ['title' => 'Home'])
@section('content')

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
								<img src="{{ $web_source }}/images/main-slider/dummy.png"  alt=""  data-lazyload="images/main-slider/slide11.jpg" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
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
									style="z-index: 2;background-color:rgba(0, 0, 0, 0.1);border-color:rgba(0, 0, 0, 0);border-width:0px; background-image:url(images/overlay/rrdiagonal-line.png)"> </div>
									<!-- LAYER NR. 1 -->
								<!-- BACKGROUND VIDEO LAYER -->
								<div class="rs-background-video-layer"
									data-forcerewind="on"
									data-volume="mute"
									data-videowidth="100%"
									data-videoheight="100%"
									data-videomp4="video/video2.mp4"
									data-videopreload="auto"
									data-videoloop="loop"
									data-aspectratio="16:9"
									data-autoplay="true"
									data-autoplayonlyfirsttime="false"
								></div>

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
								<img src="{{ $web_source }}/images/main-slider/dummy.png"  alt=""  data-lazyload="images/main-slider/slide11.jpg" data-bgposition="center center" data-kenburns="on" data-duration="4000" data-ease="Power3.easeInOut" data-scalestart="150" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-blurstart="0" data-blurend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="4" class="rev-slidebg" data-no-retina>
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
	<!-- Slider END -->
	<!-- Our Services -->
	<div class="section-full content-inner bg-white">
		<div class="container">
			<div class="row teacher-about">
				<div class="col-md-5">
					<h2 class="">Hey there, my name is John Doe. I'm the founder of the EduZone coaching classes.</h2>
					<img src="{{ $web_source }}/images/sign.png" alt="">
				</div>
				<div class="col-md-7">
					<p class="">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. When, while the lovely valley teems with vapour around me, and the meridian sun strikes the upper surface of the impenetrable foliage of my trees, and but a few stray gleams steal into the inner sanctuary.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="0.3s">
					<div class="icon-bx-wraper bx-style-2 m-l40 p-a30 left bg-gray icon-bx-ho">
						<div class="icon-bx-sm bg-primary m-b20"><span class="icon-cell"><img src="{{ $web_source }}/images/icon/book.png" alt=""></span> </div>
						<div class="icon-content p-l40">
							<h5 class="dlab-tilte">Expert Faculty</h5>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod..</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow fadeInDown" data-wow-duration="2s" data-wow-delay="0.3s">
					<div class="icon-bx-wraper bx-style-2 m-l40 p-a30 left bg-gray icon-bx-ho">
						<div class="icon-bx-sm bg-primary m-b20"><a href="javascript:void(0);" class="icon-cell"><img src="{{ $web_source }}/images/icon/graduate.png" alt=""></a> </div>
						<div class="icon-content p-l40">
							<h5 class="dlab-tilte">Learn Courses Online</h5>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod..</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12 m-b30 wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.3s">
					<div class="icon-bx-wraper bx-style-2 m-l40 p-a30 left bg-gray icon-bx-ho">
						<div class="icon-bx-sm bg-primary m-b20"><a href="javascript:void(0);" class="icon-cell"><img src="{{ $web_source }}/images/icon/books.png" alt=""></a> </div>
						<div class="icon-content p-l40">
							<h5 class="dlab-tilte">Book Library & Store</h5>
							<p>Lorem ipsum dolor sit amet, consectetuer adipiscing  sed diam nibh euismod..</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Content -->
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
			<!-- Register Form -->
			<div class="section-full bg-secondry form-area style1 content-inner overlay-black-dark bg-img-fix" style="background-image:url(images/background/bg7.jpg)">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-7 m-b30">
							<div class="section-head">
								<h4 class="title-small">Get a Free online Registeration</4>
								<h2 class="title text-primary">register now!</h2>
								<p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
							</div>
							<div class="row">
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 m-b30">
									<div class="dlab-box counter-style-2 text-white">
										<div class="icon-lg"><i class="flaticon-mortarboard"></i></div>
										<h2 class="counter text-primary m-b5">150</h2>
										<span class="counter-text">Happy Students</span>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 m-b30">
									<div class="dlab-box counter-style-2 text-white">
										<div class="icon-lg"><i class="flaticon-homework"></i></div>
										<h2 class="counter text-primary m-b5">256</h2>
										<span class="counter-text">Approved Courses</span>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 m-b30">
									<div class="dlab-box counter-style-2 text-white">
										<div class="icon-lg"><i class="flaticon-classroom"></i></div>
										<h2 class="counter text-primary m-b5">652</h2>
										<span class="counter-text">Certified Teachers</span>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-6 col-6 m-b30">
									<div class="dlab-box counter-style-2 text-white">
										<div class="icon-lg"><i class="flaticon-championship"></i></div>
										<h2 class="counter text-primary m-b5">765</h2>
										<span class="counter-text">Graduate Students</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-5 m-b30">
							<div class="register-form style1">
								<form method="post" class="dzForm" action="script/contact.php">
									<input type="hidden" value="Appointment" name="dzToDo" >
									<div class="row sp15">
										<div class="col-md-12">
											<div class="form-group">
												<input name="dzName" class="form-control" placeholder="Name" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input name="dzEmail" class="form-control" placeholder="Email" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<input name="dzOther[date]" class="form-control" placeholder="Select Date" type="text">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<select class="bs-select-hidden" name="dzOther[service]" >
													<option value="Yoda">Mathematics</option>
													<option value="Wait Loss">Physics</option>
													<option value="Cardio">Chemistry</option>
													<option value="Gym">Biology</option>
												</select>
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<div class="input-group">
													<textarea name="dzMessage" rows="4" class="form-control" required=""></textarea>
												</div>
											</div>
										</div>
										<div class="col-md-12 text-center">
											<button name="submit" type="submit" value="Submit" class="site-button btn-block"><span>Submit</span></button>
										</div>
									</div>
								</form>
							</div>
						</div>
                    </div>
				</div>
			</div>
			<!-- Register Form End -->
			<div class="section-full content-inner bg-white">
				<div class="container">
					<div class="row edu-about align-items-center">
						<div class="col-lg-6 m-b30">
							<div class="section-head m-b20">
								<h2 class="title">Learn New Skills</h2>
								<h5 class="title-small">Igniting the spark of genius in every child.</h5>
								<div class="dlab-separator bg-primary"></div>
							</div>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<ul class="list-check primary circle text-black">
								<li>We provide the exceptional service wed want</li>
								<li>The Rank Of Education In Consumer's Market.</li>
								<li>You Will Never Believe These Bizarre Truth Of Education.</li>
								<li>A company involved in service, maintenance</li>
							</ul>
							<a href="about-2.html" class="site-button btnhover14">Read More</a>
						</div>
						<div class="col-lg-6">
							<div class="row features-area-one">
								<div class="col-lg-6 col-md-6">
									<div class="features-box style1 bg-primary m-b30">
										<div class="dlab-info">
											<i class="la la-book"></i>
											<h3 class="info">12</h3>
											<span>Expert faculty</span>
										</div>
									</div>
									<div class="features-box style1 bg-secondry">
										<div class="dlab-info">
											<i class="la la-paint-brush"></i>
											<h3 class="info">07</h3>
											<span>Special Education</span>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 m-t30">
									<div class="features-box style1 bg-secondry m-b30">
										<div class="dlab-info">
											<i class="la la-book"></i>
											<h3 class="info">05</h3>
											<span>Online Courses</span>
										</div>
									</div>
									<div class="features-box style1 bg-primary m-b30">
										<div class="dlab-info">
											<i class="la la-user-circle"></i>
											<h3 class="info">24</h3>
											<span>hour Services</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- About Us End -->
			<!-- About Company -->
			<div class="section-full bg-gray content-inner about-carousel-ser">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="title">Popular Courses</h2>
						<p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
					</div>
					<div class="row">
						<div class="col-md-6 col-lg-3 col-sm-6">
							<div class="dlab-box courses-bx">
								<div class="dlab-media">
									<img src="{{ $web_source }}/images/our-services/coaching/pic1.jpg" alt="">
									<div class="user-info">
										<img src="{{ $web_source }}/images/testimonials/pic1.jpg" alt="">
										<h6 class="title">Jack Ronan</h6>
										<div class="review">
											<ul class="item-review">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<span>10 Review</span>
										</div>
									</div>
								</div>
								<div class="dlab-info">
									<h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<div class="courses-info">
										<ul>
											<li><i class="fa fa-users"></i> 20 Student </li>
										</ul>
										<span class="price">$79.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-6">
							<div class="dlab-box courses-bx">
								<div class="dlab-media">
									<img src="{{ $web_source }}/images/our-services/coaching/pic2.jpg" alt="">
									<div class="user-info">
										<img src="{{ $web_source }}/images/testimonials/pic2.jpg" alt="">
										<h6 class="title">Jack Ronan</h6>
										<div class="review">
											<ul class="item-review">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<span>10 Review</span>
										</div>
									</div>
								</div>
								<div class="dlab-info">
									<h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<div class="courses-info">
										<ul>
											<li><i class="fa fa-users"></i> 20 Student </li>
										</ul>
										<span class="price">$79.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-6">
							<div class="dlab-box courses-bx">
								<div class="dlab-media">
									<img src="{{ $web_source }}/images/our-services/coaching/pic3.jpg" alt="">
									<div class="user-info">
										<img src="{{ $web_source }}/images/testimonials/pic3.jpg" alt="">
										<h6 class="title">Jack Ronan</h6>
										<div class="review">
											<ul class="item-review">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<span>10 Review</span>
										</div>
									</div>
								</div>
								<div class="dlab-info">
									<h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<div class="courses-info">
										<ul>
											<li><i class="fa fa-users"></i> 20 Student </li>
										</ul>
										<span class="price">$79.00</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-3 col-sm-6">
							<div class="dlab-box courses-bx">
								<div class="dlab-media">
									<img src="{{ $web_source }}/images/our-services/coaching/pic4.jpg" alt="">
									<div class="user-info">
										<img src="{{ $web_source }}/images/testimonials/pic2.jpg" alt="">
										<h6 class="title">Jack Ronan</h6>
										<div class="review">
											<ul class="item-review">
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star"></i></li>
												<li><i class="fa fa-star-half-o"></i></li>
												<li><i class="fa fa-star-o"></i></li>
											</ul>
											<span>10 Review</span>
										</div>
									</div>
								</div>
								<div class="dlab-info">
									<h6 class="dlab-title"><a href="courses-details.html">Learn Python – Interactive Python Tutorial</a></h6>
									<p>Lorem Ipsum is simply dummy text of the printing and typesetting.</p>
									<div class="courses-info">
										<ul>
											<li><i class="fa fa-users"></i> 20 Student </li>
										</ul>
										<span class="price">$79.00</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- About Company END -->
			<!-- Latest From Blog -->
			<div class="section-full content-inner-2 bg-white">
				<div class="container">
					<div class="section-head text-center">
						<h2 class="title">Our Events</h2>
						<p>There are many variations of passages of Lorem Ipsum typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p>
					</div>
					<div class="blog-carousel owl-btn-center-lr owl-carousel owl-btn-3">
					<div class="items">
						<div class="event-post post-grid shadow radius">
							<div class="dlab-post-media">
								<a href="event-details.html"><img src="{{ $web_source }}/images/events/grid/coaching/pic1.jpg" alt=""></a>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-date"> <strong>10 June</strong> <span> 2020</span> </li>
										<li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
										<li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road </li>
									</ul>
								</div>
								<div class="dlab-post-title">
									<h4 class="post-title"><a href="event-details.html">Why is Early Education Essential?</a></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="items">
						<div class="event-post post-grid shadow radius">
							<div class="dlab-post-media">
								<a href="event-details.html"><img src="{{ $web_source }}/images/events/grid/coaching/pic2.jpg" alt=""></a>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-date"> <strong>10 June</strong> <span> 2020</span> </li>
										<li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
										<li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road </li>
									</ul>
								</div>
								<div class="dlab-post-title">
									<h4 class="post-title"><a href="event-details.html">The Shocking Revelation of Education.</a></h4>
								</div>
							</div>
						</div>
					</div>
					<div class="items">
						<div class="event-post post-grid shadow radius">
							<div class="dlab-post-media">
								<a href="event-details.html"><img src="{{ $web_source }}/images/events/grid/coaching/pic3.jpg" alt=""></a>
							</div>
							<div class="dlab-post-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-date"> <strong>10 June</strong> <span> 2020</span> </li>
										<li class="post-author"> <i class="la la-clock"></i> 05:00 PM </li>
										<li class="post-tag"> <i class="ti-location-pin"></i> Marmora Road </li>
									</ul>
								</div>
								<div class="dlab-post-title">
									<h4 class="post-title"><a href="event-details.html">Five Things Nobody Told You About</a></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
			<!-- Latest From Blog End -->
			<!-- Call To Action -->
			<div class="section-full call-action bg-primary wow fadeIn" data-wow-duration="2s" data-wow-delay="0.9s">
				<div class="container">
					<div class="row">
						<div class="col-lg-9">
							<h2 class="title text-white">Amazing things happen to your business </h2>
							<p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
						</div>
						<div class="col-lg-3 d-flex">
							<a href="contact-2.html" class="site-button white align-self-center btnhover14 outline ml-auto outline-2">Get In Touch</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Call To Action End -->
		</div>
		<!-- contact area END -->
    </div>
    <!-- Content END -->
@endsection
