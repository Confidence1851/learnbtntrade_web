@extends('web.layouts.app' , ['title' => 'Our Service Plans'  , 'activePage' => 'cart' , 'meta_keywords' => '' , 'meta_description' => '' ])
@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Pricing Table</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('homepage')}}">Home</a></li>
                        <li>Service Plans</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="bg-white pricing-table-box-area">

       <div class="dlab-divider bg-gray-dark tb10"><i class="icon-dot c-square"></i></div>
       <div class="section-full bg-white content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <div class="sort-title pricing-table-title clearfix text-center">
                            <h4>Pricing table-1 Columns 4 with gap</h4>
                        </div> --}}
                        <!-- Pricing table-1 Columns 4 with gap -->
                        <div class="section-content box-sort-in button-example p-tb30 pricing-table-col-gap">
                            <div class="pricingtable-row m-b30">
                                <div class="row">
                                    @foreach ($plans as $plan)
                                        @php
                                            $highlight = $plan->featured == 1 ? 'pricingtable-highlight' : '';
                                        @endphp
                                        <div class="col-sm-6 col-md-6 col-lg-3 m-t30">
                                            <div class="pricingtable-wrapper">
                                                <div class="pricingtable-inner {{ $highlight }}">
                                                <div class="pricingtable-price"> <span class="pricingtable-bx">{{ format_money($plan->price) }}</span> <span class="pricingtable-type">{{ getPlanDuration()[$plan->duration] }}</span> </div>
                                                    <div class="pricingtable-title bg-primary">
                                                     <h2>{{ $plan->title }}</h2>
                                                    </div>
                                                    <ul class="pricingtable-features">
                                                        @foreach ($plan->activeItems as $item)
                                                            <li><i class="fa fa-check"></i> {{ $item->body }} </li>
                                                        @endforeach
                                                    </ul>
                                                    @if (auth('web')->check())
                                                        @if(!in_array($plan->id , getMyActivePlans()->toArray()))
                                                            @if(!empty($item = cartHasPlan($plan->id)))
                                                                <form action="{{ route('cart.remove') }}" method="post" item_id="{{$plan->id}}" class="cart_ajax_form cart_form_{{$plan->id}}"> @csrf
                                                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                                                    <input type="hidden" class="course_cart_input_{{$plan->id}}" name="course_cart_id" value="{{$item->id}}">
                                                                    <button type="submit" class="site-button mt-2 btn cart_btn_{{$plan->id}}" title="Remove from car">
                                                                        <span class="spinner-border text-light spinner cart_btn_spinner_{{$plan->id}} d-none"></span>
                                                                        <span class="cart_btn_text_{{$plan->id}}">Remove from cart</span>
                                                                    </button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('cart.add') }}" method="post" item_id="{{$plan->id}}" class="cart_ajax_form"> @csrf
                                                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                                                    <input type="hidden" class="course_cart_input_{{$plan->id}}" name="course_cart_id" value="">
                                                                    <button type="submit" class="site-button mt-2 btn cart_btn_{{$plan->id}}" title="Add To Cart">
                                                                        <span class="spinner-border text-light spinner cart_btn_spinner_{{$plan->id}} d-none"></span>
                                                                        <span class="cart_btn_text_{{$plan->id}}">Add to cart</span>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </li>
                                                        @else
                                                            <div class="pricingtable-footer"> <a href="javascript:void(0);" class="site-button btn-success">Subscribed</a> </div>\
                                                        @endif
                                                    @else
                                                        <div class="pricingtable-footer"> <a href="{{ route('login')}}" class="site-button ">Login</a> </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pricing table-1 Columns 4 with gap END-->
        </div>
       <div class="dlab-divider bg-gray-dark tb10"><i class="icon-dot c-square"></i></div>
        <!-- Left & right section  END -->
    </div>
</div>
<!-- Left & right section END -->
<!-- Content END-->
@endsection
