@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Blog Post' , 'activeGroup'  => 'blog', 'activePage' => 'post'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT BLOG POST
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('blog.posts.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('blog.posts.update' , $post->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Post Category</label>
                                                <select type="text" name="post_category_id" required class="form-control">
                                                    <option value="" selected>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}" {{ $category->id == $post->post_category_id ? 'selected' : '' }}>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('post_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Title</label>
                                            <input type="text" name="title" required class="form-control" required value="{{ $post->title }}">
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Body</label>
                                            <textarea id="ckeditor"  type="text" name="body" class="form-control" required>{!! $post->body !!}</textarea>
                                            </div>
                                            @error('body')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Image</label>
                                                <input type="file" name="image" class="form-control" >
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Featured</label>
                                                <select type="text" name="featured" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="0" {{ $post->featured == 0 ? 'selected' : '' }}>No</option>
                                                    <option value="1" {{ $post->featured == 1 ? 'selected' : '' }}>Yes</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Status</label>
                                                <select type="text" name="status" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="{{$activeStatus}}" {{ $post->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                    <option value="{{$inactiveStatus}} {{ $post->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">SEO Keywords</label>
                                                <input type="text" name="meta_keywords"  class="form-control"  value="{{ $post->meta_keywords }}" placeholder="bitcoin, training, crypto" >
                                            </div>
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">SEO Description</label>
                                                <input type="text" name="meta_description"  class="form-control"  value="{{ $post->meta_description }}" placeholder="this category is for bitcoin only" >
                                            </div>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center ">
                                    <button type="submit" class="btn btn-success btn-lg "> Save </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop

@section('scripts')


@endsection
