@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Course Category' , 'activeGroup'  => 'course', 'activePage' => 'course_category'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT COURSE CATEGORY
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.categories.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('course.categories.update' , $category->id)}}" method="post" enctype="multipart/form-data">
                                @method('Put')
                                @csrf
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Title</label>
                                            <input type="text" name="title" required class="form-control" required value="{{ $category->title }}">
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">SEO Keywords</label>
                                                <input type="text" name="meta_keywords"  class="form-control" value="{{ $category->meta_keywords }}" placeholder="bitcoin, training, crypto" >
                                            </div>
                                            @error('meta_keywords')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">SEO Description</label>
                                                <input type="text" name="meta_description"  class="form-control" value="{{ $category->meta_keywords }}" placeholder="this category is for bitcoin only">
                                            </div>
                                            @error('meta_description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


{{--
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Image</label>
                                                <input type="file" name="image" required class="form-control" required>
                                            </div>
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Status</label>
                                                <select type="text" name="status" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="{{$activeStatus}}" {{ $category->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                    <option value="{{$inactiveStatus}} {{ $category->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
                                                </select>
                                            </div>
                                            @error('status')
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
