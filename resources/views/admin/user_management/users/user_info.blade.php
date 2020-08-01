@extends('admin.layout.app',[ 'pageTitle' =>  'Users Management | Users' , 'activeGroup'  => 'users_management', 'activePage' => 'users'])
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
                                    <img src="" width="160" height="160" alt="avatar" />
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
                                    <span>Status</span>
                                    <span>{{$user->getStatus()}}</span>
                                </li>

                                <li>
                                    <span>Wallet</span>
                                    <span>${{$user->wallet}}</span>
                                </li>
                                <li>
                                    <span>Investments</span>
                                    <span>${{$investments->sum('amount')}}</span>
                                </li>
                                <li>
                                    <span>Referrals</span>
                                    <span>{{$referrals->count()}}</span>
                                </li>
                                <li>
                                    <span>Activities</span>
                                    <span>{{$activities->count()}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card card-about-me">
                        <div class="header">
                            <h2>WITHDRAWAL OPTIONS</h2>
                        </div>
                        <div class="body">
                            <ul>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">library_books</i>
                                        Bank Method
                                    </div>
                                    <div class="content">
                                        Bank Name : {{$bank->bank_name}}
                                    </div>
                                    <div class="content">
                                        Account Name : {{$bank->bank_name}}
                                    </div>
                                    <div class="content">
                                        Account Number : {{$bank->bank_name}}
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Paypal Address
                                    </div>
                                    <div class="content">
                                    </div>
                                </li>
                                <li>
                                    <div class="title">
                                        <i class="material-icons">location_on</i>
                                        Bitcoin Address
                                    </div>
                                    <div class="content">
                                    </div>
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
                                    <li role="presentation" class=""><a href="#investments" aria-controls="investments" role="tab" data-toggle="tab">Investments</a></li>
                                    <li role="presentation" class=""><a href="#transactions" aria-controls="transactions" role="tab" data-toggle="tab">Transactions</a></li>
                                    <li role="presentation" class=""><a href="#referrals" aria-controls="referrals" role="tab" data-toggle="tab">Referrals</a></li>
                                    <li role="presentation" class=""><a href="#withdrawals" aria-controls="withdrawals" role="tab" data-toggle="tab">Withdrawals</a></li>
                                    <li role="presentation" class=""><a href="#activities" aria-controls="activities" role="tab" data-toggle="tab">Activities</a></li>
                                    <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>User Information</h3>
                                            </div>
                                            <div class="panel-body">

                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="investments">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Investments History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>Narration</th>
                                                                <th>Reference</th>
                                                                <th>Amount</th>
                                                                <th>Percent</th>
                                                                <th>Start Date</th>
                                                                <th>End Date</th>
                                                                <th>Status</th>
                                                                <th>Confirmation</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($investments as $investment)
                                                            <tr>
                                                                <td>{{$investment->narration}}</td>
                                                                <td>{{$transaction->admin_id}}</td>
                                                                <td>{{$investment->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
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
                                                <h3>Transactions History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>Narration</th>
                                                                <th>Reference</th>
                                                                <th>Amount</th>
                                                                <th>Type</th>
                                                                <th>Status</th>
                                                                <th>Confirmation</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($transactions as $transaction)
                                                            <tr>
                                                                <td>{{$transaction->narration}}</td>
                                                                <td>{{$transaction->reference}}</td>
                                                                <td>{{$transaction->amount}}</td>
                                                                <td>{{$transaction->type}}</td>
                                                                <td>{{$transaction->admin_id}}</td>
                                                                <td>{{$transaction->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="referrals">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Referrals History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>User name</th>
                                                                <th>Reference</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($referrals as $referral)
                                                            <tr>
                                                                <td>{{$referral->user->name}}</td>
                                                                <td>{{$referral->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in " id="activities">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Activities History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>Advert</th>
                                                                <th>Shared on</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($referrals as $referral)
                                                            <tr>
                                                                <td>{{$advert->id}}</td>
                                                                <td>{{$advert->type}}</td>
                                                                <td>{{$advert_id->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div role="tabpanel" class="tab-pane fade in " id="withdrawals">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Withdrawal History</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                        <thead>
                                                            <tr>
                                                                <th>Reference</th>
                                                                <th>Amount</th>
                                                                <th>Method</th>
                                                                <th>Status</th>
                                                                <th>Confirmation</th>
                                                                <th>Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($withdrawalRequests as $withdrawal)
                                                            <tr>
                                                                <td>{{$withdrawal->reference}}</td>
                                                                <td>{{$withdrawal->amount}}</td>
                                                                <td><button data-toggle="modal" data-target="withdrawal_method-{{$withdrawal->id}}" class="btn btn-outline-success btn-sm">{{$withdrawal->type}}</button></td>
                                                                <td>{{$withdrawal->status}}</td>
                                                                <td><button data-toggle="modal" data-target="confirmed_withdrawal-{{$withdrawal->id}}" class="btn btn-outline-success btn-sm">Confirmed</button></td>
                                                                <td>{{$withdrawal->created_at->format('Y-m-d , h:i:A')}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="NameSurname" class="col-sm-2 control-label">Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                    <input type="text" class="form-control" id="NameSurname" name="name" placeholder="Name Surname" value="{{$user->name}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{$user->email}}" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                    <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal">
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
