@extends('dashboard_layout.app',[ 'pageTitle' =>  'Blog Post Information' , 'activeGroup'  => 'blog', 'activePage' => 'post'])
@section('style')
    <link rel="stylesheet" href="{{ $admin_source }}/plugins/suneditor/css/sample.css" media="all">    
@endsection
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOG POST INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5 mt-4 md-mt-0">
                                <li class="dropdown">
                                    <a href="{{ route('blogger.posts.edit' , $post->id) }}" class="btn btn-sm btn-outline-primary"> Edit Post</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
                                    <li role="presentation" class=""><a href="#comments" aria-controls="media" role="tab" data-toggle="tab">Comments</a></li>
                                </ul>

                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="information">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Information</h3>
                                            </div>
                                            <div class="panel-body">
                                                <div class="row" style="padding:10px ">
                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Author Name: </b> {{ $post->author->fullName() ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Category: </b> {{ $post->category->title ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Title: </b> {{ $post->title}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Keywords: </b> {{ $post->meta_keywords}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Description: </b> {{ $post->meta_description}}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Featured: </b>{{ $post->featured  == 1 ? 'Yes' : 'No'}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $post->getStatus()}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($post->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($post->updated_at)) }}</p>
                                                    </div>

                                                </div>
                                                <div class=""  style="padding:10px ">
                                                    <div class="mt-2 mb-2">
                                                        <img src="{{ getFileFromStorage($post->image) }}" alt="" class="img-responsive">
                                                    </div>
                                                    <br>
                                                    {!! $post->body !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="comments">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Post Comments
                                                </h3>
                                            </div>
                                            <div class="panel-body" style="padding:10px ">
                                                 <!-- Exportable Table -->
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="">
                                                            <div class="body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                                                        <thead>
                                                                            <tr>
                                                                                <th></th>
                                                                                <th>Author</th>
                                                                                <th>Comment</th>
                                                                                <th>Status</th>
                                                                                <th>Creation Date</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @foreach($post->comments as $comment)
                                                                            <tr>
                                                                            <td><img src="{{ $comment->author->getAvatar() }}" alt="" class="img-responsive" width="100"></td>
                                                                                <td>{{$comment->author->fullName() }}</td>
                                                                                <td>{{$comment->body}}</td>
                                                                                <td>{{$comment->getStatus()}}</td>
                                                                                <td>{{$post->created_at->format('M D d, Y')}}</td>
                                                                                <td>
                                                                                    <form  action="{{ route('blog.comments.destroy',$comment) }}" method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        {{-- <a href="" class="btn btn-info sm">
                                                                                            <i class="material-icons">remove_red_eye</i>
                                                                                        </a> --}}

                                                                                        <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item? ');">
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
                                                <!-- #END# Exportable Table -->
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
