@extends('admin.layout.app',[ 'pageTitle' =>  'Pending Investments | Investments' , 'activeGroup'  => 'investments', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               PENDING INVESTMENTS
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
                                            <th>User Name</th>
                                            <th>Reference No.</th>
                                            <th>Duration</th>
                                            <th>Percent</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($investments as $investment)
                                        <tr>
                                            <td class="text-center">
                                                <div >
                                                    <span class="btn btn-sm checkItem" aria-checked="false" id="{{$investment->id}}"> <i class="material-icons" style="color:red">cancel</i> </span>
                                                </div>
                                            </td>
                                            <td>{{$investment->user->name}}</td>
                                            <td>{{$investment->reference}}</td>
                                            <td>{{$investment->duration}} days</td>
                                            <td>{{$investment->percent}}%</td>
                                            <td>$ {{$investment->amount}}</td>
                                            <td>{{ date('M d , Y h:i:A',strtotime($investment->created_at))}}</td>

                                        </tr>
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
