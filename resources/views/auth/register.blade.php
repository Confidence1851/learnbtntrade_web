@extends('web.layouts.app')

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr5.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Register</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">Home</a></li>
                        <li>Register</li>
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
                    <h2 class="font-weight-700 m-t0 m-b40">CREATE AN ACCOUNT</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 m-b30">
                    <div class="p-a30 border-1  max-w500 m-auto">
                        <div class="tab-content">
                            <form id="login" class="tab-pane active" method="POST" action="{{ route('register') }}">
                                @csrf
                                <h4 class="font-weight-700">PERSONAL INFORMATION</h4>
                                <p class="font-weight-600">If you have an account with us, please log in.</p>
                                <div class="form-group">
                                    <label class="font-weight-700">First Name *</label>
                                    <input name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus class="form-control" placeholder="First Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">Last Name *</label>
                                    <input name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus class="form-control" placeholder="Last Name" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">E-MAIL *</label>
                                    <input name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control" placeholder="Your Email Id" type="email">
                                </div>
                                <div class="form-group">
                                    <label class="font-weight-700">PASSWORD *</label>
                                    <input name="password" required="" class="form-control " placeholder="Type Password" type="password">
                                </div>
                                <div class="text-left m-t15">
                                    <button class="site-button button-lg radius-no outline outline-2">CREATE</button>
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
