@extends('web.layouts.app' , ['title' => 'Contact us'  , 'activePage' => 'contact' , 'meta_keywords' => 'contact us' , 'meta_description' => 'Reach out to us.'])
@section('content')
<!-- Content -->
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr3.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Contact Us</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Contact Form -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="section-head m-b30">
                        <h5 class="title-small">Contact Us</h5>
                        <div class="dlab-separator bg-primary"></div>
                        <h2 class="title">Do You Have Any Question?</h2>
                    </div>
                    <ul class="contact-question">
                        <li>
                            <i class="fa fa-map-marker"></i>
                            <h4 class="title">Address</h4>
                            <p>Nos 15 Ikpa Road Uyo , Akwa Ibom State, Nigeria.</p>
                        </li>
                        <li>
                            <i class="fa fa-envelope-o"></i>
                            <h4 class="title">Email</h4>
                            <p><a href="mailto:learnbtctrade@gmail.com">learnbtctrade@gmail.com</a></p>
                        </li>
                        <li>
                            <i class="fa fa-phone"></i>
                            <h4 class="title">Phone</h4>
                            <p<a href="tel:+2348094110146">+234 809 411 0146 (Support Line)</a></p>
                        </li>

                    </ul>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-12 m-b30">
                    <form class="contact-box dzForm" action="{{ route('contact_form') }}" id="contact_form" method="POST"> @csrf
                        <h3 class="title-box">Write us a few words about your concerns and we’ll  get back to you within <strong>24</strong> hours</h3>
                        <div class="dzFormMsg m-b20"></div>
                        <input type="hidden" value="Contact" name="dzToDo">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="name" type="text" required class="form-control" placeholder="Full Name">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="email" type="email" class="form-control" required placeholder="Your Email Id">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <div class="input-group">
                                        <input name="subject" type="text" required class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <textarea name="message" rows="4" class="form-control" required placeholder="Tell us about your project or idea"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <button name="submit" type="submit" value="Submit" class="site-button">Send Message!</button>
                            </div>
                        </div>
                    </form>
                    <div id="form_message" class="d-none mt-5 text-center contact-box dzForm">
                        Your message has been submitted!
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->
</div>
<!-- Content END-->
@endsection
