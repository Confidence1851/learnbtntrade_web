@extends('admin.layout.app',[ 'pageTitle' =>  'Withdrawals' , 'activeGroup'  => 'withdrawals', 'activePage' => 'all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                WITHDRAWALS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
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
                                        @foreach($withdrawals as $withdrawal)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$withdrawal->user->name ?? ''}}</td>
                                            <td><a href="#"data-toggle="modal" data-target="#view_item_{{$withdrawal->id}}"  class="btn btn-primary btn-sm"> View Bank</a></td>
                                            <td>{{ format_money($withdrawal->amount) }}</td>
                                            <td>{{ date('M D , Y h:i:A' , strtotime($withdrawal->created_at))}}</td>
                                        </tr>

                                        <div class="modal fade" id="view_item_{{$withdrawal->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bank Information</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12 mb-2">
                                                                <b>Bank Name:</b> {{$withdrawal->bank_name}}
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <b>Account Name:</b> {{$withdrawal->account_name}}
                                                            </div>
                                                            <div class="col-md-12 mb-2">
                                                                <b>Account Number:</b> {{$withdrawal->account_number}}
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop


