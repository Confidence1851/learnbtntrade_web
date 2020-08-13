@extends('web.layouts.app' , ['title' => 'Checkout Successful'  , 'activePage' => 'cart' , 'meta_keywords' => '' , 'meta_description' => '' ])
@section('content')
 <!-- Content -->
 <div class="page-content">
    <!-- Error Page -->
    {{-- <div class="section-full dz_error-405 content-inner overlay-black-dark" style="background-image:url(images/background/bg1.jpg); background-position: 50% 50%;"> --}}
        <div class="container">
            <div class="row">
                <div class="col-lg-5 text-center text-gray">
                    <div class=""><img class="check_img img-responsive" src="{{ getFileFromStorage('web/images/check.png') }}" alt=""></div>
                </div>
                <div class="col-lg-7">
                    <h2 class="message_title">{{ $message }}</h2>
                    <p class=""><b>Order Reference: </b> #{{ $reference }}</p>
                    <div class="dlab-divider bg-gray-dark"></div>
                    <div class="widget">
                        <a href="{{ route('homepage')}}"> Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    {{-- </div> --}}
    <!-- Error Page END -->
</div>
<!-- Content END-->
@endsection
