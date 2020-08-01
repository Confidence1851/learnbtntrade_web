@extends('admin.layout.app',[ 'pageTitle' =>  'Users Management | Agent Information' , 'activeGroup'  => 'users_management', 'activePage' => 'agents'])
@section('content')
@php
    $source = env('RESOURCE_PATH').'/'."dashboard";
@endphp
<div class="container-fluid">

            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                @if(empty($agent->user->avatar))
                                    <img src="{{asset($source)}}/images/user.png" width="160" height="160" alt="avatar" />
                                @else
                                    <img src="{{$user->avatar}}" width="160" height="160" alt="avatar" />
                                @endif
                            </div>
                            <div class="content-area">
                                <h3>{{$agent->user->name}}</h3>
                                <p>{{$agent->user->getRole()}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Agent Wallet Balance</span>
                                    <span>${{$agent->wallet}}</span>
                                </li>
                                <li>
                                    <span>Total Clients</span>
                                    <span>{{ $data['clients'] }}</span>
                                </li>
                                <li>
                                    <span>Total Sales</span>
                                    <span>${{ $data['sales'] }}</span>
                                </li>
                                <li>
                                    <span>Total Profit</span>
                                    <span>${{ $data['profit'] }}</span>
                                </li>
                                <li>
                                    <span>Commission Rate</span>
                                    <span>{{ $data['commission'] }}%</span>
                                </li>

                                <li>
                                    <span>Account Status</span>
                                    <span style="color:{{ $agent->status == 1 ? 'green' : 'red' }}">
                                        {{ $agent->getStatus() }}
                                    </span>
                                </li>

                            </ul>
                        </div>
                    </div>


                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                    <li role="presentation" class=><a href="#today" aria-controls="today" role="tab" data-toggle="tab">Today</a></li>
                                    <li role="presentation" class=""><a href="#week" aria-controls="week" role="tab" data-toggle="tab">This Week</a></li>
                                    <li role="presentation" class=""><a href="#month" aria-controls="month" role="tab" data-toggle="tab">This Month</a></li>
                                    <li role="presentation" class=""><a href="#alltime" aria-controls="alltime" role="tab" data-toggle="tab">All Time</a></li>
                                    <li role="presentation" class=""><a href="#transactions" aria-controls="transactions" role="tab" data-toggle="tab">Transactions</a></li>
                                </ul>

                                <div class="tab-content">

                                <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                            </div>
                                            <div class="panel-body">
                                               <!-- Vertical Layout | With Floating Label -->
                                                <div class="row clearfix">
                                                        <div class="col-md-6">
                                                        <div class="card">

                                                                <div class="body">
                                                                <form method="post" action="{{ route('refill_agent') }}">@csrf
                                                                        <div class="form-group form-float">
                                                                            <div class="form-line">
                                                                            <input type="hidden" name="agent_id" value="{{ $agent->user_id }}" required >
                                                                                <input type="number" id="amount" name="amount" class="form-control" value="{{ old('amount') }}" required>
                                                                                <label class="form-label">Refill Amount</label>
                                                                            </div>
                                                                            @error('amount')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>

                                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Send</button>
                                                                </form>
                                                           </div>


                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="card">

                                                                <div class="body">
                                                                <form method="post" action="{{ route('agents.update',$agent) }}">@csrf @method('put')

                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"  name="display_name" value="{{ $agent->display_name }}"  required>
                                                                            <label class="form-label">Display Name</label>
                                                                        </div>
                                                                        @error('display_name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"  name="department" value="{{ $agent->department }}"  required>
                                                                            <label class="form-label">Department</label>
                                                                        </div>
                                                                        @error('department')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"  name="whatsapp_no" value="{{ $agent->whatsapp_no }}"  required>
                                                                            <label class="form-label">Whatsapp Number</label>
                                                                        </div>
                                                                        @error('whatsapp_no')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control"  name="transfer_pin" value="" >
                                                                            <label class="form-label">Transfer Pin</label>
                                                                        </div>
                                                                        @error('transfer_pin')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <div class="form-line">
                                                                            <select type="text" name="status" required class="form-control">
                                                                                <option disabled selected>Change Agent Status</option>
                                                                                <option value="0" {{$agent->status == 0 ? 'selected' : '' }}>Pending</option>
                                                                                <option value="1" {{$agent->status == 1 ? 'selected' : '' }}>Active</option>
                                                                                <option value="2" {{$agent->status == 2 ? 'selected' : '' }}>Disabled</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
                                                                </form>
                                                           </div>


                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Vertical Layout | With Floating Label -->
                                            </div>
                                        </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade in " id="today">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Today`s History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Client</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data['today'] as $coupon)
                                                            <tr>
                                                                <td>{{$coupon->user->name}}</td>
                                                                <td>${{$coupon->amount}}</td>
                                                                @if(empty($coupon->use_date))
                                                                   <td>Not Used</td>
                                                                @else
                                                                <td>{{ date('Y-m-d , h:i:A' , strtotime($coupon->use_date))}}</td>
                                                                @endif
                                                                <td>{{$coupon->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>{{ $data['todayClients'] }}</th>
                                                                <th>${{ $data['todaySum'] }}</th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="week">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>This Week`s History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Client</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th aria-sort="descending">Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data['week'] as $coupon)
                                                            <tr>
                                                                <td>{{$coupon->user->name}}</td>
                                                                <td>${{$coupon->amount}}</td>
                                                                @if(empty($coupon->use_date))
                                                                   <td>Not Used</td>
                                                                @else
                                                                <td>{{ date('Y-m-d , h:i:A' , strtotime($coupon->use_date))}}</td>
                                                                @endif
                                                                <td>{{$coupon->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>{{ $data['weekClients'] }}</th>
                                                                <th>${{ $data['weekSum'] }}</th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="month">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>This Month`s History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Client</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data['month'] as $coupon)
                                                            <tr>
                                                                <td>{{$coupon->user->name}}</td>
                                                                <td>${{$coupon->amount}}</td>
                                                                @if(empty($coupon->use_date))
                                                                   <td>Not Used</td>
                                                                @else
                                                                <td>{{ date('Y-m-d , h:i:A' , strtotime($coupon->use_date))}}</td>
                                                                @endif
                                                                <td>{{$coupon->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>{{ $data['monthClients'] }}</th>
                                                                <th>${{ $data['monthSum'] }}</th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="alltime">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>All Time History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                                        <thead>
                                                            <tr>
                                                                <th>Info</th>
                                                                <th>Coupon</th>
                                                                <th>Client</th>
                                                                <th>Amount</th>
                                                                <th>Status</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data['coupons'] as $coupon)
                                                            <tr>
                                                                <td><a data-toggle="modal" data-target="#coupon-{{$coupon->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                                                <td>{{$coupon->card_no}}</td>
                                                                <td>{{$coupon->user->name}}</td>
                                                                <td>${{$coupon->amount}}</td>
                                                                @if(empty($coupon->use_date))
                                                                   <td>Not Used</td>
                                                                @else
                                                                <td>{{ date('Y-m-d , h:i:A' , strtotime($coupon->use_date))}}</td>
                                                                @endif
                                                                <td>{{$coupon->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                                <div class="modal fade" id="coupon-{{$coupon->id}}" tabindex="-1" role="dialog">
                                                                <div class="modal-dialog modal-sm" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                        <h4>Coupon Code {{$coupon->card_no}} </h4>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <p><b>Agent:</b> {{ $coupon->agent->name }}</p>
                                                                                    <p><b>Amount:</b> ${{ $coupon->amount }}</p>
                                                                                    <p><b>User:</b> {{ $coupon->user->name }}</p>
                                                                                    @if(empty($coupon->use_date))
                                                                                        <p><b>Status:</b> Not Used</p>
                                                                                    @else
                                                                                        <p><b>Use Date:</b> {{ date('D M , Y  h:i:A',strtotime($coupon->use_date)) }}</p>
                                                                                    @endif
                                                                                    <p><b>Date Created:</b> {{ date('D M , Y  h:i:A',strtotime($coupon->created_at)) }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="transactions">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Transaction History</h3>
                                            </div>
                                            <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                                    <thead>
                                                        <tr>
                                                            <th>Reference No.</th>
                                                            <th>Narration</th>
                                                            <th>Amount</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($data['transactions'] as $transaction)
                                                        <tr>
                                                            <td  class="btn btn-outline-primary">#{{$transaction->reference}}</td>
                                                            <td>{{$transaction->narration}}</td>
                                                            <td>${{$transaction->amount}}</td>
                                                            <td>{{$transaction->status}}</td>
                                                            <td>{{ date('Y-m-d , h:i:A' , strtotime($transaction->created_at))}}</td>
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
        </div>
@stop
