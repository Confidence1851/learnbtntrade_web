@extends('admin.layout.app',[ 'pageTitle' =>  'Pending Withdrawals | Withdrawals' , 'activeGroup'  => 'withdrawals', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PENDING WITHDRAWALS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Reference No.</th>
                                            <th>Amount</th>
                                            <th>Method</th>
                                            <th>Actions</th>
                                            <th>TimeOut</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td>{{$withdrawal->user->name ?? ''}}</td>
                                            <td>{{$withdrawal->reference}}</td>
                                            <td>$ {{$withdrawal->amount}}</td>
                                            <td><button class="btn btn-outline-primary xs">{{$withdrawal->getPaymentMethod()}}</button></td>
                                            <td>
                                                <form id="withdrawal_process_{{$withdrawal->id}}" action="{{ route('process_withdrawal') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="withdrawal_id" value="{{$withdrawal->id}}" required>
                                                    <button type="submit" class="btn btn-success xs"  onclick=" return confirm('Are you sure you want to process this withdrawal?');">Process</button>
                                                    <button type="button" class="btn btn-danger xs" data-toggle="modal"  data-target="#withdrawal_cancel_{{$withdrawal->id}}">Cancel</button>

                                                </form>
                                                 <div class="modal fade"  id="withdrawal_cancel_{{$withdrawal->id}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-md" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Cancel Withdrawal</h4>
                                                            </div>
                                                        <form action="{{ route('cancel_withdrawal') }}" method="post">@csrf
                                                            <div class="modal-body">
                                                                    <input type="hidden" name="withdrawal_id" value="{{$withdrawal->id}}" required>
                                                                   <div class="form-group">
                                                                       <textarea name="comment" class="form-control" required rows="4" placeholder="Enter reason here........."></textarea>
                                                                       @error('comment')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                   </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                <button type="save" class="btn btn-link waves-effect">PROCEED</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$withdrawal->timeout}}</td>
                                            <td style="color: {{$withdrawal->color}} ">{{ date('M D , Y h:i:A' , strtotime($withdrawal->created_at))}}</td>
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
