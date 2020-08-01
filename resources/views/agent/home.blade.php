@extends('agent.layout.app',[ 'pageTitle' =>  'Dashboard' , 'activeGroup'  => '', 'activePage' => 'dashboard'])
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
                                @if(empty($user->avatar))
                                    <img src="{{asset($source)}}/images/user.png" width="160" height="160" alt="avatar" />
                                @else
                                    <img src="{{$user->avatar}}" width="160" height="160" alt="avatar" />
                                @endif
                            </div>
                            <div class="content-area">
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->getRole()}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Agent Wallet Balance</span>
                                    <span>${{$user->agent->wallet ?? ''}}</span>
                                </li>
                                <li>
                                    <span>Total Clients</span>
                                    <span>{{ $data['clients']  ?? '' }}</span>
                                </li>
                                <li>
                                    <span>Total Sales</span>
                                    <span>${{ $data['sales'] ?? '' }}</span>
                                </li>
                                <li>
                                    <span>Total Profit</span>
                                    <span>${{ $data['profit']  ?? '' }}</span>
                                </li>
                                <li>
                                    <span>Commission Rate</span>
                                    <span>{{ $data['commission']  ?? ''  }}%</span>
                                </li>
                            </ul>
                        </div>
                    </div>


                </div>
                @if(!empty($user->agent))
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                        <div class="header">
                                <h2>

                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#change_pin">Change Transfer Pin</a></li>
                                        </ul>
                                    </li>
                                </ul>


                                <div class="modal fade" id="change_pin" tabindex="-1" role="dialog">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Change Transfer Pin</h4>
                                            </div>
                                        <form action="{{ route('update_pin') }}" method="post">@csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Old Pin</label>
                                                    <input type="text" name="old_pin" class="form-control" placeholder="Enter old pin" required>
                                                    @error('old_pin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">New Pin</label>
                                                    <input type="text" name="new_pin" class="form-control" placeholder="Enter new pin" required>
                                                    @error('new_pin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Confirm Pin</label>
                                                    <input type="text" name="confirm_pin" class="form-control" placeholder="Confirm new pin" required>
                                                    @error('confirm_pin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                <button type="save" class="btn btn-link waves-effect">SAVE</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="body">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                        <li role="presentation" class=""><a href="#today" aria-controls="today" role="tab" data-toggle="tab">Today</a></li>
                                        <li role="presentation" class=""><a href="#week" aria-controls="week" role="tab" data-toggle="tab">This Week</a></li>
                                        <li role="presentation" class=""><a href="#month" aria-controls="month" role="tab" data-toggle="tab">This Month</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="home">
                                            <div class="panel panel-default panel-post">
                                                <div class="panel-heading">
                                                    <h3>User Information</h3>
                                                </div>
                                                <div class="panel-body">
                                                <!-- Vertical Layout | With Floating Label -->
                                                    <div class="row clearfix">
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                            <div class="card">

                                                                    <div class="body">
                                                                    <form method="post" action="{{ route('sell_coupon') }}">@csrf
                                                                            <div class="form-group form-float">
                                                                                <div class="form-line" style="position:relative">
                                                                                    <input type="number" id="account_no" name="account_no" class="form-control" value="{{ old('account_no') }}" required>
                                                                                    <label class="form-label">Account Number</label>
                                                                                    <span class="btn btn-sm btn-success" style="position: absolute; bottom:8px;right:10px;float:right" id="find_account">Find User</span>
                                                                                </div>
                                                                                <span id="account_name"></span>
                                                                                @error('account_no')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group form-float">
                                                                                <div class="form-line">
                                                                                        <input type="number" id="amount" name="amount"  class="form-control"  value="{{ old('amount') }}" required>
                                                                                        <label class="form-label">Recharge Amount</label>
                                                                                </div>
                                                                                @error('amount')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="row mt-3">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group form-float">
                                                                                        <div class="form-line">
                                                                                                <input type="password" id="pin" name="pin"  class="form-control" required>
                                                                                                <label class="form-label">Transfer Pin</label>
                                                                                        </div>
                                                                                        @error('pin')
                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <input type="checkbox" id="auto_recharge" name="auto_recharge" class="filled-in">
                                                                                    <label for="auto_recharge">Auto Recharge Customer Account</label>
                                                                                </div>
                                                                            </div>

                                                                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Send</button>
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
                                                                    <th>{{ $data['todayClients'][1] ?? 0 }}</th>
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
                                                                    <th>Date</th>
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
                                                                    <th>{{ $data['weekClients'][1] ?? 0}}</th>
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
                                                                    <th>{{ $data['monthClients'][1] ?? 0 }}</th>
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



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
@stop
