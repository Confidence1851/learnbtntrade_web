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
                                            {{-- <td><img src="{{$subscription->title}}" alt="image"></td> --}}
                                            <td><a href="{{ route('service.plans.show',$subscription->plan->id) }}">{{$subscription->plan->title }}</a></td>
                                            <td><a href="{{ route('users.show',$subscription->user->id) }}">{{$subscription->user->name }}</a></td>
                                            <td>{{ format_money($subscription->price)}}</td>
                                            <td>{{$subscription->whatsapp_no }}</td>
                                            <td>{{$subscription->getStatus()}}</td>
                                            <td>{{$subscription->created_at->format('M D d, Y')}}</td>
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
