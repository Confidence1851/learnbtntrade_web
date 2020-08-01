@extends('admin.layout.app',[ 'pageTitle' =>  'Investments | Users' , 'activeGroup'  => 'investments', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                INVESTMENTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a data-toggle="modal" data-target="#extendInvestments">Extend Investments</a> </li>
                                        <li><a href="javascript:void(0);" class="switchTableMode">Pending Investments</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example  js-exportable-->
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>User Name</th>
                                            <th>Reference No.</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($investments as $investment)
                                        @php
                                            if ($investment->status == 'Active'){
                                                $color = 'blue';
                                            }
                                            elseif ($investment->status == 'Completed') {
                                                $color = 'green';
                                            }
                                            else {
                                                $color = 'red';
                                            }
                                        @endphp

                                        <tr>
                                            <td><a data-toggle="modal" data-target="#investment-{{$investment->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td>{{$investment->user->name}}</td>
                                            <td>#{{$investment->reference}}</td>
                                            <td>${{$investment->amount}}</td>
                                        <td style="color:{{$color}}">{{$investment->status}}</td>
                                            <td>{{ date('M d , Y h:i:A',strtotime($investment->created_at))}}</td>
                                        </tr>

                                        <div class="modal fade" id="investment-{{$investment->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4>Investment Reference #{{$investment->reference}} </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><b>ID:</b> #{{ $investment->id }}</p>
                                                                <p><b>Admin:</b> {{ $investment->agent->name ?? 'Not Available'}}</p>
                                                                <p><b>User:</b> {{ $investment->user->name ?? 'Not Available' }}</p>
                                                                @if(empty($investment->start_date))
                                                                    <p><b>Start Date:</b> Not Available</p>
                                                                    <p><b>End Date:</b> Not Available</p>
                                                                @else
                                                                    <p><b>Start Date:</b> {{ date('M d, Y  h:i:A',strtotime($investment->start_date)) }}</p>
                                                                    <p><b>End Date:</b> {{ date('M d, Y  h:i:A',strtotime($investment->end_date)) }}</p>
                                                                @endif
                                                                <p><b>Amount:</b> ${{ $investment->amount }}</p>
                                                                <p><b>Date Created:</b> {{ date('M d, Y  h:i:A',strtotime($investment->created_at)) }}</p>
                                                                <p><b>Last Edited:</b> {{ date('M d, Y  h:i:A',strtotime($investment->updated_at)) }}</p>
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
            </div>
            <!-- #END# Exportable Table -->
        </div>


        <div class="modal fade" id="extendInvestments" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h4>Extend Investment EndDate </h4>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('extend_investment_date') }}" method="post">@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">FROM</label>
                                        <input type="date" name="start" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">TO</label>
                                        <input type="date" name="end" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group mt-5">
                                            <label for="">No. of Days</label>
                                            <select type="text" name="days" class="form-control" required>
                                                <option value=""disabled selected></option>
                                                <option value="1"> 1 Day</option>
                                                <option value="5"> 5 Days</option>
                                                <option value="7"> 7 Days</option>
                                                <option value="10"> 10 Days</option>
                                                <option value="14"> 14 Days</option>
                                                <option value="21"> 21 Days</option>
                                                <option value="30"> 30 Days</option>
                                                <option value="40"> 40 Days</option>
                                                <option value="45"> 45 Days</option>
                                                <option value="60"> 60 Days</option>
                                            </select>
                                        </div>
                                        <p>This would extend the end date of all active investments within the specified date range and send a mail to all afftected users, notifying them of the change</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                            <button type="save" class="btn btn-link waves-effect">SAVE</button>
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@stop
