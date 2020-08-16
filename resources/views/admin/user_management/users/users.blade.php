@extends('admin.layout.app',[ 'pageTitle' =>  'Users Management | Users' , 'activeGroup'  => 'users_management', 'activePage' => 'users'])
@section('content')

     <div class="container-fluid">


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $title ?? ''}}
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    {{-- <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">New User</a></li>
                                        <li><a href="javascript:void(0);">Broadcast Message</a></li>
                                        <li><a href="javascript:void(0);">Suspend User</a></li>
                                    </ul> --}}
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Ref Code</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td class="text-center"><img src="{{$user->getAvatar()}}" width="30" height="30"  alt="Avatar" /></td>
                                            <td>{{$user->fullName()}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$user->ref_code}}</td>
                                            <td>{{$user->country}}</td>
                                            <td>{{$user->state}}</td>
                                            <td>{{$user->getStatus()}}</td>
                                            <td><a href="{{ route('users.show',$user) }}" class="btn btn-outline-primary sm">More Info</a></td>
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
