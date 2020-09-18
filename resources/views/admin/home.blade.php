@extends('admin.layout.app',[ 'pageTitle' =>  'Dashboard' , 'activeGroup'  => '', 'activePage' => 'dashboard'])
@section('content')
     <div class="container-fluid">
        <!-- Hover Zoom Effect -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('users.index') }}">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-green">
                            <i class="material-icons">person</i>
                        </div>

                        <div class="content">
                            <div class="text">USERS</div>
                            <div class="number">{{ $count['users'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('blog.posts.index') }}">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="text">POSTS</div>
                            <div class="number">{{ $count['posts'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('course.details.index') }}">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-grey">
                            <i class="material-icons">book</i>
                        </div>
                        <div class="content">
                            <div class="text">COURSES</div>
                            <div class="number">{{ $count['courses'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="{{ route('service.plans.index') }}">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-cyan">
                            <i class="material-icons">payment</i>
                        </div>
                        <div class="content">
                            <div class="text">PLANS</div>
                            <div class="number">{{ $count['plans'] }}</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- #END# Hover Zoom Effect -->
        <div class="row clearfix">
            <div class="col-md-4">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-pink">
                        <i class="material-icons">supervisor_account</i>
                    </div>
                    <div class="content">
                        <div class="text">ACTIVE INSTRUCTORS</div>
                        <div class="number">{{ $count['instructors'] }}</div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">ACTIVE BLOGGERS</div>
                        <div class="number">{{ $count['bloggers'] }}</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-light-black">
                        <i class="material-icons">access_alarm</i>
                    </div>
                    <div class="content">
                        <div class="text">SIGNAL UPDATES</div>
                        <div class="number">{{ $count['signals'] }}</div>
                    </div>
                </div>
            </div>

        </div>
        <!-- #END# Hover Zoom Effect -->

        <div class="mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        RECENT COURSES
                                    </h2>
                                </div>
                                <div class="body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TITLE</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($recentCourses as $course)
                                            @php
                                                $i++;
                                            @endphp
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{ $course->title }}</td>
                                                    <td>
                                                        <a href="{{ route('course.details.show',$course) }}" class="btn btn-info sm">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        RECENT POSTS
                                    </h2>
                                </div>
                                <div class="body table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>TITLE</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($recentPosts as $post)
                                            @php
                                                $i++;
                                            @endphp
                                                <tr>
                                                    <th scope="row">{{$i}}</th>
                                                    <td>{{ $post->title }}</td>
                                                    <td>
                                                        <a href="{{ route('blog.posts.show',$post) }}" class="btn btn-info sm">
                                                            <i class="material-icons">remove_red_eye</i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 d-none">
            <div class="card">
                <div class="header">
                    <h2>STATISTICS</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                    <div id="area_chart" class="graph"></div>
                </div>
            </div>
        </div>

    </div>
@stop
