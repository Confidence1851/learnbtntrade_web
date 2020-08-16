@extends('admin.layout.app',[ 'pageTitle' =>  ' Bloggers' , 'activeGroup'  => 'bloggers', 'activePage' => 'all'])
@section('content')

     <div class="container-fluid">


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ALL BLOGGERS
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Full Name</th>
                                            <th>Total Posts</th>
                                            <th>Total Likes</th>
                                            <th>Total Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bloggers as $user)
                                        @php
                                            $stats = bloggerStats($user->id);
                                        @endphp
                                        <tr>
                                            <td class="text-center"><img src="{{$user->getAvatar()}}" width="30" height="30"  alt="Avatar" /></td>
                                            <td>{{$user->fullName()}}</td>
                                            <td>{{ $stats['posts']}}</td>
                                            <td>{{ $stats['likes']}}</td>
                                            <td>{{ $stats['comments']}}</td>
                                            <td><a href="{{ route('bloggers.show',$user) }}" class="btn btn-outline-primary sm">More Info</a></td>
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
