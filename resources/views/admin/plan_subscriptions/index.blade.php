@extends('admin.layout.app',[ 'pageTitle' =>  'Plans Subscriptions' , 'activeGroup'  => 'services', 'activePage' => 'subscriptions'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             PLANS SUBSCRIPTIONS
                            </h2>

                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Plan</th>
                                            <th>Price</th>
                                            <th>User</th>
                                            <th>Whatsapp No</th>
                                            <th>Start</th>
                                            <th>Stop</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($subscriptions as $subscription)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td><a href="{{ route('service.plans.show',$subscription->plan->id) }}">{{$subscription->plan->title }}</a></td>
                                            <td>{{ format_money($subscription->orderItem->amount ?? '')}}</td>
                                            <td><a href="{{ route('users.show',$subscription->user->id) }}">{{$subscription->user->fullName() }}</a></td>
                                            <td>{{$subscription->phone_no }}</td>
                                            <td>{{ date('M d, Y h:i:a', strtotime($subscription->start))}}</td>
                                            <td>{{ $subscription->stop == 'Lifetime' ? 'Lifetime' : date('M d, Y h:i:a', strtotime($subscription->stop))}}</td>
                                            @if ($subscription->status == $activeStatus)
                                                @if ($subscription->stop == 'Lifetime')
                                                    <td style="color:green">Active</td>
                                                @else
                                                    @if ($subscription->stop > now())
                                                        <td style="color:green">Active</td>
                                                    @else
                                                        <td style="color:red">Expired</td>
                                                    @endif
                                                @endif
                                            @else
                                                <td style="color:red">Disabled</td>
                                            @endif
                                            <td>{{ date('M d, Y h:i:a', strtotime($subscription->created_at))}}</td>
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
