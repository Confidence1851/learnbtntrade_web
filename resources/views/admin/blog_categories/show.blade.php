@extends('admin.layout.app',[ 'pageTitle' =>  'Blog Category information' , 'activeGroup'  => 'blog', 'activePage' => 'category'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                BLOG CATEGORY INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('blog.categories.edit',$category) }}" class="btn btn-sm btn-outline-primary"> Edit Category</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="container ">
                                <p><b>Title:</b> <span>{{$category->title}}</span></p>
                                <p><b>Slug:</b> <span>{{$category->title}}</span></p>
                                <p><b>SEO Keywords:</b> <span>{{$category->meta_keywords}}</span></p>
                                <p><b>SEO Description:</b> <span>{{$category->meta_description}}</span></p>
                                <p><b>Status:</b> <span>{{$category->getStatus()}}</span></p>
                                <p><b>Created At:</b> <span>{{ date('M d, Y', strtotime($category->created_at)) }}</span></p>
                                <p><b>Last updated At:</b> <span>{{  date('M d, Y', strtotime($category->updated_at)) }}</span></p>
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
                                            <ul class="header-dropdown m-r--5">
                                                <li class="dropdown">
                                                    <a href="{{ route('blog.posts.create') }}" class="btn btn-sm btn-outline-primary"> New Post</a>
                                                </li>
                                            </ul>
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
                                                            <th>Author</th>
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
                                                        @foreach($category->posts as $post)
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        <tr>
                                                            {{-- <td>{{$i}}</td> --}}
                                                        <td><img src="{{ getFileFromStorage($post->image) }}" alt="" class="img-responsive" width="100"></td>
                                                            <td>{{$post->title}}</td>
                                                            <td>{!! $post->category->title !!}</td>
                                                            <td>{{$post->author->fullName()}}</td>
                                                            <td>{{$post->comments->count()}}</td>
                                                            <td>{{$post->featured == 1 ? 'Yes' : 'No'}}</td>
                                                            <td>{{$post->getStatus()}}</td>
                                                            <td>{{$post->created_at->format('M D d, Y')}}</td>
                                                            <td>
                                                                <form  action="{{ route('blog.posts.destroy',$post) }}" method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <a href="{{ route('blog.posts.show',$post) }}" class="btn btn-info sm">
                                                                        <i class="material-icons">remove_red_eye</i>
                                                                    </a>
                                                                    <a href="{{ route('blog.posts.edit',$post) }}" class="btn btn-success sm">
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
