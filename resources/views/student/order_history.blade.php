@extends('web.layouts.app' , ['title' => 'Frequently Asked Questions'  , 'activePage' => 'faq' , 'meta_keywords' => 'Frequently Asked Questions' , 'meta_description' => 'Frequently Asked Questions'])

@section('content')
<!-- Content -->
<div class="page-content bg-white">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr3.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">Orders</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>Order History</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-block">
        <!-- Your Faq -->
        <div class="section-full overlay-white-middle content-inner" style="background-image:url(images/pattern/pic1.jpg);">
            <div class="container">
                <div class="section-head text-black text-center">
                    <h3 class="title">List of all ordered items</h3>
                </div>
                <div class="row">

                    <div class=" col-md-12 m-b30">
                        <div class="dlab-accordion  box-sort-in m-b30 space active-bg accdown1" id="accordion001">
                            @foreach($orders as $order)
                            <div class="panel mb-2">
                                <div class="acod-head">
                                    <h6 class="acod-title"> <a href="javascript:void(0);" data-toggle="collapse" data-target="#collapse_{{$order->id}}" aria-expanded="true">
                                        <div class="row">
                                            <div class="col-md-4">
                                               <b>Reference:</b>  #{{$order->reference}}
                                            </div>
                                            <div class="col-md-4">
                                                <b>Total:</b>  {{format_money($order->amount)}}
                                             </div>
                                             {{-- <div class="col-md-4">
                                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#order_item_{{$order->id}}">
                                                    View Info
                                                </button>
                                             </div> --}}
                                        </div>
                                    </a> </h6>
                                </div>
                                <div id="collapse_{{$order->id}}" class="acod-body collapse " data-parent="#accordion001">
                                    <div class="acod-content">
                                       <h5>Order Items</h5>

                                       @foreach ($order->items as $orderedItem)
                                            @php
                                                if (!empty($orderedItem->course_id)){
                                                    $item = $orderedItem->course;
                                                }
                                                else{
                                                    $item = $orderedItem->plan;
                                                }
                                            @endphp
                                        <div class="row resize_95">
                                            <div class="col-9">{{$item->title}}</div>
                                            <div class="col-3" style="float: right">{{ format_money($orderedItem->amount - $orderedItem->discount) }}</div>
                                        </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="order_item_{{$order->id}}"  role="dialog">
                                <div class="modal-dialog modal-md" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Order Information</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row" style="padding:10px ">
                                                <div class="col-md-12">
                                                    <p class="p-5"><b class="ml-5 mt-3">Order Reference: </b> {{ $order->reference}}</p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Total Discount: </b> {{ format_money($order->discount) }}</p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Total Amount: </b> {{ format_money($order->amount) }}</p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Payment Type: </b> {{ $order->payment_type}}</p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Payment Receipt: </b><a href="{{ route('orders.receipts.download' , $order->id) }}" class="pl-2 btn btn-info">Download</a></p>
                                                </div>

                                                <div class="col-md-12">
                                                    <p class="p-5"><b class="ml-5 mt-3">Status: </b><a href="{{ route('orders.status' , $order->id) }}" class="pl-2 btn {{ $order->status == 1 ? 'btn-success' : 'btn-danger' }}">{{ $order->getStatus() }}</a></p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($order->created_at)) }}</p>
                                                    <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($order->updated_at)) }}</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                                            <button type="save" class="btn btn-link waves-effect">Download Receipt</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Your Faq End -->
    </div>
    <!-- contact area END -->
</div>
<!-- Content END-->
@endsection
