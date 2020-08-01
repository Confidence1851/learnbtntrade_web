@extends('admin.layout.app',[ 'pageTitle' =>  'Users Management | Agents' , 'activeGroup'  => 'users_management', 'activePage' => 'agents'])
@section('content')
@php
    $source = env('RESOURCE_PATH').'/'."dashboard";
@endphp
     <div class="container-fluid">
            <!-- <div class="block-header">
                <h2>
                    JQUERY DATATABLES
                    <small>Taken from <a href="https://datatables.net/" target="_blank">datatables.net</a></small>
                </h2>
            </div> -->

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                AGENTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" data-toggle="modal" data-target="#new_agent">New Agent</a></li>
                                        <li><a href="javascript:void(0);">Broadcast Message</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Wallet</th>
                                            <th>Clients</th>
                                            <th>Sales</th>
                                            <th>Profit</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($agents as $agent)
                                        <tr>
                                            <td class="text-center"><img src="{{asset($source)}}/images/user.png" width="30" height="30"  alt="Avatar" /></td>
                                            <td>{{$agent->user->name}}</td>
                                            <td>${{$agent->wallet}}</td>
                                            <td>{{$agent->clients}}</td>
                                            <td>${{$agent->sales}}</td>
                                            <td>${{$agent->profit}}</td>
                                            <td>{{$agent->user->getStatus()}}</td>
                                            <td><a href="{{ route('agents.show',$agent) }}" class="btn btn-outline-primary sm">More Info</a></td>
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


        <div class="modal fade" id="new_agent" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Agent</h4>
                    </div>
                <form action="{{ route('agents.store') }}" method="post">@csrf
                    <div class="modal-body">
                           <div class="form-group">
                               <label for="">User</label>
                               <select type="text" name="user_id" class="form-control" required>
                                   <option value=""disabled selected></option>
                                   @foreach($users as $user)
                                    <option value="{{$user->id}}"> {{$user->name}}</option>
                                   @endforeach
                               </select>
                               @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>

                           <div class="form-group">
                               <label for="">Amount ($)</label>
                               <select type="text" name="wallet" class="form-control" required>
                                   <option value=""disabled selected></option>
                                   <option value="20"> 20 Dollars</option>
                                   <option value="50"> 50 Dollars</option>
                                   <option value="100"> 100 Dollars</option>
                                   <option value="200"> 200 Dollars</option>
                                   <option value="500"> 500 Dollars</option>
                               </select>
                               @error('wallet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           
                           <div class="form-group">
                            <div class="form-line">
                                <label for="">Department</label>
                                <input type="text" name="department" class="form-control" required>
                            </div>
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Whatsapp Number</label>
                                    <input type="number" name="whatsapp_no" class="form-control" required>
                                </div>
                                @error('whatsapp_no')
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
@stop
