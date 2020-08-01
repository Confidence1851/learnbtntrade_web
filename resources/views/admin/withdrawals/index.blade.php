@extends('admin.layout.app',[ 'pageTitle' =>  'Withdrawals' , 'activeGroup'  => 'withdrawals', 'activePage' => ''])
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
                                <table class="table table-bordered table-striped table-hover dataTable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>User Name</th>
                                            <th>Reference No.</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdrawals as $withdrawal)
                                        <tr>
                                            <td><a href="{{ route('withdrawals.show',$withdrawal) }}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td>{{$withdrawal->user->name ?? ''}}</td>
                                            <td>{{$withdrawal->ref_no}}</td>
                                            <td>$ {{$withdrawal->amount}}</td>
                                            <td>{{$withdrawal->getStatus()}}</td>
                                            <td>{{ date('M D , Y h:i:A' , strtotime($withdrawal->date))}}</td>
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
