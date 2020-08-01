@extends('agent.layout.app',[ 'pageTitle' =>  'Coupons' , 'activeGroup'  => 'coupons', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COUPON CODES
                            </h2>
                            <ul class="header-dropdown m-r--5">

                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>Card No.</th>
                                            <th>Buyer`s Name</th>
                                            <th>Amount</th>
                                            <th>Used By</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coupons as $coupon)
                                        <tr>
                                            <td>{{$coupon->card_no}}</td>
                                            <td>{{$coupon->user->name}}</td>
                                            <td>$ {{$coupon->amount}}</td>
                                            @if(!empty($coupon->use_date))
                                                <td class="col-pink">{{ date('Y-m-d , h:i:A' , strtotime($coupon->use_date))}}</td>
                                            @else
                                                <td class="col-teal">Not Used</td>
                                            @endif
                                            <td>{{$coupon->created_at->format('M D , Y h:i:A')}}</td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

@stop
