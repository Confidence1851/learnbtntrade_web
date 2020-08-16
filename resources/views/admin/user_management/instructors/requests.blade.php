@extends('admin.layout.app',[ 'pageTitle' =>   $title == 1 ? 'All Requests | Intructors' : 'Pending Requests | Intructors' , 'activeGroup'  => 'instructors', 'activePage' => $title == 1 ? 'all' : 'requests'])
@section('content')

     <div class="container-fluid">


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $title == 1 ? 'ALL INSTRUCTOR REQUESTS' : 'PENDING INSTRUCTOR REQUESTS'}}
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($instructors as $instructor)
                                        @php
                                            $user = $instructor->user;
                                        @endphp
                                        <tr>
                                            <td class="text-center"><img src="{{$user->getAvatar()}}" width="30" height="30"  alt="Avatar" /></td>
                                            <td>{{$user->fullName()}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                            <td>{{$instructor->comment}}</td>
                                            <td>
                                                <a href="{{ route('instructors.status')}}">
                                                    @if ($instructor->status == 1)
                                                        <span style="color: green">Active</span>
                                                    @else
                                                        <span style="color: red">Inactive</span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td><a href="{{ route('users.show',$user) }}" class="btn btn-outline-primary sm">User Info</a></td>
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
