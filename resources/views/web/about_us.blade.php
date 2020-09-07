@extends('web.layouts.app' , ['title' => 'About us'  , 'activePage' => 'about' , 'meta_keywords' => 'about us' , 'meta_description' => 'Learn about our company.'])
@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr3.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">About us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                    <li><a href="{{ route('homepage')}}">Home</a></li>
                        <li>About us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">

        <!-- Service Info Head -->
        <div class="section-full bg-primary">
            <div class="container-fluid">
                <div class="row align-item-center about-three">
                    <div class="col-lg-6 p-lr0">
                        <div class="video-bx about-video">
                            <video src="{{ $web_source }}/video/about_us.mp4"></video>
                            <div class="video-play-icon">
                                <a href="{{ $web_source }}/video/about_us.mp4" class="popup-youtube video"><i class="fa fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 content-inner-2 content-bx">
                        <div class="max-w600 p-lr15">
                            <div class="section-head text-white m-b20">
                                <h5 class="title-small">Step into the World of Crypto</h5>
                                <h2 class="title">About LearnBtctrade Academy</h2>
                                <div class="dlab-separator bg-white"></div>
                            </div>
                            <p>

                            We are a team, passionate about teaching and educating people on how to make money from the blockchain market through trading and investing in crypto currency.
                            This comes in the form of teaching you how to trade from Beginner's level to Becoming a professional trader in the crypto space.
                            We also deliver daily signals to trade with and make profit, provide you with latest news and updates on the various cryptocurrencies and Blockchain Technology.

                            </p>
                            {{-- <ul class="list-check circle white">
                                <li>You Will Never Thought That Knowing Education</li>
                                <li>Never Mess With Education And Here's The Reasons Why</li>
                                <li>This Is Why This Year Will Be The Year Of Education</li>
                            </ul> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Our Services -->
         <!-- About Us -->
         <div class="section-full content-inner bg-white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 m-b30 about-two">
                        <div class="section-head m-b20">
                            <h2 class="title">Mission</h2>
                            <div class="dlab-separator bg-primary"></div>
                        </div>
                        <p>
                            Learnbtctrade will educate you through our social media platforms because it is no doubt that an enormous number
                             of the population worldwide uses social media,
                              organize monthly conferences across various tertiary institutions which is
                              targeted at reaching the youths on campuses.
                        </p>
                        <p>
                            Through our online and offline outreaches, we capture the interest of our youths
                             on the essence and benefits of trading, investments,
                            and lots more which involves the financial market and Blockchain.
                        </p>
                        <p>
                            Learnbtctrade design courses for our ever increasing students and customers which take
                             them through the beginners to professional level, and other packages at an affordable price.
                              By doing this, we create a long lasting impact on the society.
                             Learnbtctrade  is not just a profit making company; we are a brand!
                        </p>

                    </div>
                    <div class="col-lg-6 m-b30 about-two">
                        <div class="section-head m-b20">
                            <h2 class="title">Vision</h2>
                            <div class="dlab-separator bg-primary"></div>
                        </div>
                        <p>
                            Our vision is geared towards educating and tutoring the youths in Africa and the world at
                            large on the financial opportunity or gains from the Blockchain Industry.
                        </p>
                        <p>
                            By being fully involved in this sector, our youths can make money
                            for themselves right from the comfort of their homes without depending on a white
                             collar job. The world is a digital place now; and, making so much money without having to leave your house to an office or
                             a physical market is just a prove the Blockchain Industry is a digitalized sector.
                        </p>
                        <p>
                            We have a vision of living in the world of today and making an impact out of it.
                             Our target is reach over 1 million people with this unique opportunity to help
                             foster financial freedom in the African continent and world at large.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <!-- About Us End -->
        <!-- Features -->
        <div class="section-full content-inner bg-gray">
            <div class="container">
                <div class="section-head text-black text-center">
                    <h2 class="title">Our Services</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <ul class="list-check circle white">
                            <li>Learnbtctrade Academy Services</li>
                            <li>Free Beginners Training Class On A Closed WhatsApp Group</li>
                            <li>Professional Training Course On Trading</li>
                            <li>Mentorship Program And Coaching</li>
                            <li>Daily Signals For Trading </li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul class="list-check circle white">
                            <li>Real Time Crypto And Blockchain News </li>
                            <li>Latest Update in The Crypto and Blockchain Industry</li>
                            <li>Real Time Charts of Cryptocurrencies price value</li>
                            <li>Crypto & Blockchain Education</li>
                            <li>Crypto Airdrops</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Features End -->
         <!-- Team member -->
         <div class="section-full bg-gray content-inner">
            <div class="container">
                <div class="section-head text-center ">
                    <h2 class="title"> Meet The Team</h2>
                    <p>
                        Our team of talent driven, professionals
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="teachers-profile.html">
                                    <img width="358" height="460" alt="" src="{{ $web_source }}/images/our-team/preview.jpg" class="lazy" data-src="{{ $web_source }}/team/emma.jpeg">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title"><a href="teachers-profile.html">Emmanuel Jackson</a></h4>
                                <span class="dlab-position">Chief Executive Officer</span>
                                <ul class="dlab-social-icon dez-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-pinterest" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="teachers-profile.html">
                                    <img width="358" height="460" alt="" src="{{ $web_source }}/images/our-team/preview.jpg" class="lazy" data-src="{{ $web_source }}/team/eclick.jpeg">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title"><a href="teachers-profile.html">Emmanuel Uko</a></h4>
                                <span class="dlab-position">Head of Administration</span>
                                <ul class="dlab-social-icon dez-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-pinterest" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="teachers-profile.html">
                                    <img width="358" height="460" alt="" src="{{ $web_source }}/images/our-team/preview.jpg" class="lazy" data-src="{{ $web_source }}/team/alex.jpeg">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title"><a href="teachers-profile.html">Alexander Agbu</a></h4>
                                <span class="dlab-position">Chief Technical Analyst</span>
                                <ul class="dlab-social-icon dez-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-pinterest" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="teachers-profile.html">
                                    <img width="358" height="460" alt="" src="{{ $web_source }}/images/our-team/preview.jpg" class="lazy" data-src="{{ $web_source }}/team/confidence.jfif">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title"><a href="teachers-profile.html">Ugolo Confidence</a></h4>
                                <span class="dlab-position">Chief Technical Officer</span>
                                <ul class="dlab-social-icon dez-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-pinterest" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.8s">
                        <div class="dlab-box m-b30 dlab-team1">
                            <div class="dlab-media">
                                <a href="teachers-profile.html">
                                    <img width="358" height="460" alt="" src="{{ $web_source }}/images/our-team/preview.jpg" class="lazy" data-src="{{ $web_source }}/team/dora.jpeg">
                                </a>
                            </div>
                            <div class="dlab-info">
                                <h4 class="dlab-title"><a href="teachers-profile.html">Dora Ayomide </a></h4>
                                <span class="dlab-position">Chief Editor</span>
                                <ul class="dlab-social-icon dez-border">
                                    <li><a class="fa fa-facebook" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-twitter" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-linkedin" href="javascript:void(0);"></a></li>
                                    <li><a class="fa fa-pinterest" href="javascript:void(0);"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Team member End -->
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->
@endsection
