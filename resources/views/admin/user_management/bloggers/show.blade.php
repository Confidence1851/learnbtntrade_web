@extends('admin.layout.app',[ 'pageTitle' =>  'Blogger`s information' , 'activeGroup'  => 'blogger', 'activePage' => ''])
@section('content')
     <div class="container-fluid">
        @php
            $stats = bloggerStats($blogger->id);
        @endphp
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOGGER`s INFORMATION
                            </h2>
                        </div>

                        <div class="body">
                            <div class="container ">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="{{$blogger->getAvatar()}}" class="img-responsive"  alt="Avatar" />
                                    </div>
                                    <div class="col-md-9">
                                        <p><b>Name:</b> <span>{{$blogger->fullName()}}</span></p>
                                        <p><b>Profile:</b> <span><a href="{{route('users.show' , $blogger->id)}}" class="btn btn-primary btn-sm">View</a></span></p>
                                        <p><b>Total Posts:</b> <span>{{ $stats['posts']}}</span></p>
                                        <p><b>Total Likes:</b> <span>{{ $stats['likes']}}</span></p>
                                        <p><b>Total Comments:</b> <span>{{ $stats['comments']}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="">
                                        <div class="header">
                                            <h2>
                                                BLOG POSTS
                                            </h2>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                                    <thead>
                                                        <tr>
                                                            {{-- <th>#</th> --}}
                                                            <th>Image</th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Comments</th>
                                                            <th>Featured</th>
                                                            <th>Status</th>
                                                            <th>Creation Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i = 0;
                                                        @endphp
                                                        @foreach($posts as $post)
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        <tr>
                                                            {{-- <td>{{$i}}</td> --}}
                                                        <td><img src="{{ getFileFromStorage($post->image) }}" alt="" class="img-responsive" width="100"></td>
                                                            <td>{{$post->title}}</td>
                                                            <td>{!! $post->category->title !!}</td>
                                                            <td>{{$post->comments->count()}}</td>
                                                            <td>{{$post->featured == 1 ? 'Yes' : 'No'}}</td>
                                                            <td>{{$post->getStatus()}}</td>
                                                            <td>{{$post->created_at->format('M D d, Y')}}</td>
                                                            <td>
                                                                <form  action="{{ route('blogger.posts.destroy',$post) }}" method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <a href="{{ route('blogger.posts.show',$post) }}" class="btn btn-info sm">
                                                                        <i class="material-icons">remove_red_eye</i>
                                                                    </a>
                                                                    <a href="{{ route('blogger.posts.edit',$post) }}" class="btn btn-success sm">
                                                                        <i class="material-icons">edit</i>
                                                                    </a>
                                                                    <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item? All comments would also be deleted!');">
                                                                        <i class="material-icons">delete</i>
                                                                    </button>

                                                                </form>
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
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop
