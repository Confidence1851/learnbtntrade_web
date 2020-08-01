@extends('admin.layout.app',[ 'pageTitle' =>  'Coupons' , 'activeGroup'  => 'coupons', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COUPON CODES
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#new_coupons">Add Coupons</button>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Agent Name</th>
                                            <th>Card No.</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($coupons as $coupon)
                                        <tr>
                                            <td><a data-toggle="modal" data-target="#coupon-{{$coupon->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td>{{$coupon->agent->name}}</td>
                                            <td>{{$coupon->card_no}}</td>
                                            <td>$ {{$coupon->amount}}</td>
                                            @if(!empty($coupon->use_date))
                                                <td class="col-pink">Used</td>
                                            @else
                                                <td class="col-teal">Not Used</td>
                                            @endif
                                        </tr>

                                        <div class="modal fade" id="coupon-{{$coupon->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4>Coupon Code {{$coupon->card_no}} </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><b>ID:</b> #{{ $coupon->id }}</p>
                                                                <p><b>Agent:</b> {{ $coupon->agent->name }}</p>
                                                                <p><b>Commission:</b>${{ $coupon->commission }}</p>
                                                                <p><b>Batch No.:</b> {{ $coupon->batch_no }}</p>
                                                                <p><b>Amount:</b> ${{ $coupon->amount }}</p>
                                                                <p><b>User:</b> {{ $coupon->user->name ?? 'None yet'}}</p>
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
            </div>
            <!-- #END# Exportable Table -->
        </div>

        <div class="modal fade" id="new_coupons" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Coupons</h4>
                    </div>
                <form action="{{ route('coupons.store') }}" method="post">@csrf
                    <div class="modal-body">
                           <div class="form-group">
                               <label for="">Agent</label>
                               <select type="text" name="agent_id" class="form-control" required>
                                   <option value=""disabled selected></option>
                                   <option value="{{Auth::user()->id}}">MySelf</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="">Amount ($)</label>
                               <select type="text" name="amount" class="form-control" required>
                                   <option value=""disabled selected></option>
                                   <option value="1"> 1 Dollar</option>
                                   <option value="2"> 2 Dollars</option>
                                   <option value="5"> 5 Dollars</option>
                                   <option value="10"> 10 Dollars</option>
                                   <option value="20"> 20 Dollars</option>
                                   <option value="50"> 50 Dollars</option>
                                   <option value="100"> 100 Dollars</option>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="">Quantity</label>
                               <select type="text" name="quantity" class="form-control" required>
                                   <option value=""disabled selected></option>
                                   <option value="1"> 1 Coupon</option>
                                   <option value="2"> 2 Coupons</option>
                                   <option value="5"> 5 Coupons</option>
                                   <option value="10"> 10 Coupons</option>
                                   <option value="20"> 20 Coupons</option>
                                   <option value="50"> 50 Coupons</option>
                                   <option value="100"> 100 Coupons</option>
                               </select>
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

@stop
