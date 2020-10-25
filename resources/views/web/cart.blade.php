@extends('web.layouts.app' , ['title' => 'My Cart'  , 'activePage' => 'cart' , 'meta_keywords' => '' , 'meta_description' => '' ])
@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr3.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Cart</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{route('homepage')}}">Home</a></li>
                        <li>Shop Cart</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="section-full content-inner">
        <!-- Product -->
        @php
            if($items->count() > 0){
                $show = true;
            }
            else{
                $show = false;
            }
        @endphp
        <div class="container {{ $show == true ? '' : 'd-none'}}" id="has_cart_items">
            <div class="row">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table check-tbl">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($items as $item)
                                @php
                                    if(!empty($item->course_id)){
                                        $object = $item->course;
                                    }
                                    else{
                                        $object = $item->plan;
                                    }
                                @endphp
                                <tr class="alert cartItem_{{$item->id}}">
                                    <td class="product-item-img">
                                        <img src="{{ getFileFromStorage($object->image) }}" title="Item Image" alt="">
                                    </td>
                                    <td class="product-item-name">{{ $object->title }}</td>
                                    <td class="product-item-price">{{ format_money($object->price) }}</td>
                                    <td class="product-item-close">
                                        <form action="{{ route('cart.remove') }}" method="post" item_id="{{$item->id}}" class="cart_ajax_form hideItem"> @csrf
                                            <input type="hidden" name="course_id" value="{{$object->id}}">
                                            <input type="hidden" class="course_cart_input_{{$item->id}}" name="course_cart_id" value="{{ $item->id }}">
                                            <button type="submit" class=" btn-sm btn btn-outline-danger cart_btn_{{$item->id}}" title="Remove from Cart">
                                                <span class="spinner-border text-light spinner cart_btn_spinner_{{$item->id}} d-none"></span>
                                                <span class="cart_btn_text_{{$item->id}} ti-close "></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 m-b15">
                    <h5>Cart Summary</h5>
                    <table class="table-bordered check-tbl">
                        <tbody>
                            <tr>
                                <td>Total Price</td>
                                <td id="cart_price">{{ format_money($cart->price) }}</td>
                            </tr>
                            <tr>
                                <td>Total Discount</td>
                                <td id="cart_discount">{{ format_money($cart->discount) }}</td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td id="cart_total">{{ format_money($cart->total) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        <form class="shop-form" action="{{ route('cart.checkout') }}" method="POST" enctype="multipart/form-data">@csrf
                <div class="row">
                    <div class="col-lg-6 m-b15">
                        <h5>Naira Payment Information</h5>
                        <table class="table-bordered check-tbl">
                            <tbody>
                                <tr>
                                    <td>Account Name</td>
                                    <td>Jackson Emmanuel Okon</td>
                                </tr>
                                <tr>
                                    <td>Account Number</td>
                                    <td>3109463356</td>
                                </tr>
                                <tr>
                                    <td>Bank Name</td>
                                    <td>First Bank</td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="form-group">
                            <p style="color: black" class="mb-4">
                                 Please note that our exchange rate is <b> NGN400 per $1. </b>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 m-b15">
                        <h5>Crypto Payment Information</h5>
                        <table class="table-bordered check-tbl">
                            <tbody>
                                <tr>
                                    <td>Bitcoin (BTC)</td>
                                    <td>1JdQ5ECwyArbeTRJbbWoJmoAT3qitfz25F</td>
                                </tr>
                                <tr>
                                    <td>USDT (TRC20)</td>
                                    <td>TP3LbXtskLrQ1z8fro4d43CnJJcA5aUsTc</td>
                                </tr>
                                
                            </tbody>
                        </table>

                        <div class="form-group">
                            <p style="color: black" class="mb-4">
                                <b>Instruction:</b>
                                    Kindly copy your preferred address  and be sure that everything looks good before payment! <br>
                                    Please note that by sending via the wrong network, you would loose your coins!
                            </p>
                        </div>
                    </div>
                    <div class="col-md-5 mb-15">
                        <div class="form-group">
                            <p style="color: red" class="mb-4">
                                <b>Instruction:</b> <br>
                                <b>For Bank Transfer:</b> Kindly copy the ORDER REFERENCE below and use it as a payment narration when paying in the bank or via online banking! <br>
                                    Please note that our exchange rate is <b> NGN400 per $1. </b>
                                    <br>
                                    <br>
                                <b>For Crypto Payment:</b> Kindly ensure you copied the correct address and you are transferring with the correct network! <br>
                            </p>
                            <label for="">Order Reference</label>
                            <input type="text" class="form-control" name="reference" value="{{$reference}}" required readonly>
                        </div>
                    </div>
                    <div class="col-md-7 m-b15">
                            <h5>Complete Order</h5>


                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Payment Type</label>
                                        <select type="text" class="form-control"  name="payment_type" required>
                                            <option value="" disabled selected> Select Type</option>
                                            <option value="bank">Bank Transfer</option>
                                            <option value="crypto">Crypto Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Upload Receipt or Proof</label>
                                        <input type="file" class="form-control"  name="file" placeholder="" required>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                
                                @if($hasSubs > 0)
                                   <div class="col">
                                        <div class="form-group">
                                            <label for="">Whatsapp Number</label>
                                            <input type="text" class="form-control" required name="phone_no" placeholder="For signal plans">
                                        </div>
                                   </div>
                                @endif
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Add Comment</label>
                                        <input type="text" class="form-control"  name="comment" placeholder="Extra Comment? (optional)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <button class="site-button" type="submit">Process Order</button>
                        </div>
                    </div>
                </div>
            </form>

       </div>
       <div class="container {{ $show == false ? '' : 'd-none'}}" id="no_cart_item">
        <div class="text-center row offset-md-2">
            <div class="col-md-4 ">
                <i class="fa fa-shopping-cart" style="font-size: 200px;color:red"></i>
            </div>
            <div class="col-md-4 p-4 mt-md-5">
                No item in your cart at the moment!
                <br>
                <a href="{{ route('our_courses.courses')}}" class="btn btn-outline-primary">Browse Courses</a>
            </div>
        </div>
       </div>
        <!-- Product END -->
    </div>

</div>
<!-- Content END-->
@endsection
