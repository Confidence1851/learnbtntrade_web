@extends('admin.layout.app',[ 'pageTitle' =>  'New Course' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CREATE COURSE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.details.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('course.details.store')}}" method="post" enctype="multipart/form-data">@csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Course Category</label>
                                                <select type="text" name="course_category_id" required class="form-control">
                                                    <option value="" selected>Select Category</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{$category->id}}" {{ $category->id == old('course_category_id') ? 'selected' : '' }}>{{$category->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('course_category_id')
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
                                            <input type="text" name="title" required class="form-control" required value="{{ old('title') }}">
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
                                                <label for="">Description</label>
                                            <textarea id="ckeditor" type="text" name="description" class="form-control" required>{!! old('description') !!}</textarea>
                                            </div>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Price ($)</label>
                                            <input type="number" name="price" required class="form-control" required value="{{ old('price') }}">
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Discount ($)</label>
                                            <input type="number" name="discount"  class="form-control"  value="{{ old('discount') }}">
                                            </div>
                                            @error('discount')
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
                                                <input type="file" name="image" required class="form-control" required>
                                            </div>
                                            @error('image')
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
                                                <input type="text" name="meta_keywords"  class="form-control"  value="{{ old('meta_keywords')}}" placeholder="bitcoin, training, crypto" >
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
                                                <input type="text" name="meta_description"  class="form-control"  value="{{ old('meta_description')}}" placeholder="this category is for bitcoin only" >
                                            </div>
                                            @error('meta_description')
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
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
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
                                                    <option value="{{$activeStatus}}">Active</option>
                                                    <option value="{{$inactiveStatus}}">Inactive</option>
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
S
@section('scripts')
    <!-- Ckeditor -->
    <script src="{{asset($admin_source)}}/plugins/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            //CKEditor
            CKEDITOR.replace('ckeditor');
            CKEDITOR.config.height = 300;
        });
    </script>

@endsection
