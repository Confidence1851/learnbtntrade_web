@extends('admin.layout.app',[ 'pageTitle' =>  'All Orders' , 'activeGroup'  => 'orders', 'activePage' => ''])
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        ORDERS
                    </h2>
                </div>
                <div class="body">
                    <div class=" clearfix">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Reference</th>
                                        <th>Items</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach($orders as $order)
                                    @php
                                        $i++;
                                    @endphp
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$order->reference}}</td>
                                        <td>{{$order->items->count()}}</td>
                                        <td>{{ format_money($order->amount) }}</td>
                                        <td>{{ $order->getStatus() }}</td>
                                        <td>{{$order->created_at->format('M d, h:i:a, Y')}}</td>
                                        <td>
                                            <a href="{{ route('orders.show' , $order)}}" class="btn btn-xs btn-info">
                                                <i class="material-icons">remove_red_eye</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="footer text-center">
                    {!! $orders->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
