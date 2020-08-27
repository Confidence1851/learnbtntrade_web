@extends('admin.layout.app',[ 'pageTitle' =>  'Order Information | Orders' , 'activeGroup'  => 'orders', 'activePage' => 'details'])
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ORDER INFORMATION
                    </h2>
                </div>
                <div class="body">
                    <div class="row" style="padding:10px ">
                        <div class="col-md-6">
                            <p class="p-5"><b class="ml-5 mt-3">Order Reference: </b> {{ $order->reference}}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Total Discount: </b> {{ format_money($order->discount) }}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Total Amount: </b> {{ format_money($order->amount) }}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Payment Type: </b> {{ $order->payment_type}}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Payment Receipt: </b><a href="{{ route('orders.receipts.download' , $order->id) }}" class="pl-2 btn btn-info">Download</a></p>
                        </div>

                        <div class="col-md-6">
                            <p class="p-5"><b class="ml-5 mt-3">Comments: </b> {{ $order->comment}}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Status: </b><a href="{{ route('orders.status' , $order->id) }}" class="pl-2 btn {{ $order->status == 1 ? 'btn-success' : 'btn-danger' }}">{{ $order->getStatus() }}</a></p>
                            <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($order->created_at)) }}</p>
                            <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($order->updated_at)) }}</p>
                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="">
                                <div class="header">
                                    <h2>
                                        ORDER ITEMS
                                    </h2>
                                </div>
                                <div class="body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Title</th>
                                                    <th>Amount</th>
                                                    <th>Discount</th>
                                                    <th>Total</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($order->items as $orderedItem)
                                                @php
                                                    if (!empty($orderedItem->course_id)){
                                                        $item = $orderedItem->course;
                                                    }
                                                    else{
                                                        $item = $orderedItem->plan;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td><img src="{{ getFileFromStorage($item->image ?? '') }}" alt="" class="img-responsive" width="100"></td>
                                                    <td>{{$item->title}}</td>
                                                    <td>{{ format_money($orderedItem->amount) }}</td>
                                                    <td>{{ format_money($orderedItem->discount) }}</td>
                                                    <td>{{ format_money($orderedItem->amount - $orderedItem->discount) }}</td>
                                                    <td>{{$orderedItem->created_at->format('M D d, Y')}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
