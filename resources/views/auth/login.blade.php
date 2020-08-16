@extends('web.layouts.app')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Login</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">Home</a></li>
                        <li>Login</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner shop-account">
        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="font-weight-700 m-t0 m-b40">ALREADY REGISTERED?</h2>
                </div>
            </div>
            <div class="row dzseth">
                <div class="col-lg-6 col-md-6 m-b30">
                    <div class="p-a30 border-1 seth">
                        <div class="tab-content">
                                <h4 class="font-weight-700">NEW CUSTOMER</h4>
                                <p class="font-weight-600">By creating an account on our platform, you will be able to order and enroll for courses, view and track your orders in your account and more.</p>
                                <a class="site-button m-r5 button-lg radius-no" href="{{ route('register') }}">CREATE AN ACCOUNT</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 m-b30">
                    <div class="p-a30 border-1 seth">
                        <div class="tab-content nav">
                            <form id="login" class="tab-pane active col-12 p-a0" method="POST" action="{{ route('login') }}">
                                @csrf

                                <h4 class="font-weight-700">LOGIN</h4>
                                <p class="font-weight-600">If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="email" class="form-control" placeholder="Your Email Address" type="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PASSWORD *</label>
                                    <input name="password" required class="form-control " placeholder="Type Password" type="password">
                                    @error('password')
                                        <span class="" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="text-left">
                                    <button class="site-button m-r5 button-lg radius-no">login</button>
                                    <a data-toggle="tab" href="#forgot-password" class="m-l5"><i class="fa fa-unlock-alt"></i> Forgot Password</a>
                                </div>
                            </form>
                            <form id="forgot-password" class="tab-pane fade  col-12 p-a0">
                                <h4 class="font-weight-700">FORGET PASSWORD ?</h4>
                                <p class="font-weight-600">We will send you an email to reset your password. </p>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="dzName" required="" class="form-control" placeholder="Your Email Id" type="email">
                                </div>
                                <div class="text-left">
                                    <a class="site-button outline gray button-lg radius-no" data-toggle="tab" href="#login">Back</a>
                                    <button class="site-button pull-right button-lg radius-no">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product END -->
    </div>
</div>
<!-- Content END-->
@endsection
