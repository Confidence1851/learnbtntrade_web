@extends('admin.layout.app',[ 'pageTitle' =>  'Pending Withdrawals' , 'activeGroup'  => 'withdrawals', 'activePage' => 'pending'])
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
                                   <button class="btn btn-success btn-sm" id="checkAllItems">Check All</button>
                                   <button class="btn btn-danger btn-sm" id="uncheckAllItems">Uncheck All</button>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                         <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>#</th>
                                            <th>User Name</th>
                                            <th>Bank</th>
                                            <th>Amount</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($users as $user)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td class="text-center">
                                                <div >
                                                    <span class="btn btn-sm checkItem" aria-checked="false" id="{{$user->id}}"> <i class="material-icons" style="color:red">cancel</i> </span>
                                                </div>
                                            </td>
                                            <td>{{$user->fullName() ?? ''}}</td>
                                            <td><a href="#"data-toggle="modal" data-target="#view_item_{{$user->id}}"  class="btn btn-primary btn-sm"> View Bank</a></td>
                                            <td>{{ format_money($user->amount) }}</td>
                                            <td>{{ date('M D , Y h:i:A' , strtotime($user->created_at))}}</td>
                                        </tr>

                                        <div class="modal fade" id="view_item_{{$user->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bank Information</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <b>Bank Name:</b> {{$user->bank->bank_name}}
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <b>Account Name:</b> {{$user->bank->account_name}}
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <b>Account Number:</b> {{$user->bank->account_number}}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <form method="post" action="{{ route('approve_investments') }}">@csrf
                            <input type="hidden" name="items" id="inputItems" required aria-required="true">
                            <div class="mt-5">
                                <button type="submit" class="btn btn-sm btn-primary mt-5" id="approveBtn">Approve</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop
