@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Course Section' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT COURSE SECTION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.details.show', $section->course_id) }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('course.sections.update' , $section->id)}}" method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Course</label>
                                                <select type="text" name="course_id" required class="form-control">
                                                    <option value="" selected>Select Course</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{$course->id}}" {{ $course->id == $section->course_id ? 'selected' : '' }}>{{$course->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('course_id')
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
                                            <input type="text" name="title" required class="form-control" required value="{{ $section->title }}">
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Number</label>
                                            <input type="number" name="number" required class="form-control" required value="{{ $section->number }}">
                                            </div>
                                            @error('number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Video</label>
                                                <input type="file" name="video"  class="form-control" >
                                            </div>
                                            @error('video')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <video src="{{ route('course.sections.file', encrypt($section->id)) }}" controls width="200" height="200" class="img-fluid"></video>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Duration (Mins)</label>
                                                <input type="number" name="duration" required class="form-control" required  value="{{ $section->duration }}">
                                            </div>
                                            @error('duration')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

{{--
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Size (MB)</label>
                                                <input type="number" name="size" required class="form-control" required  value="{{ $section->size }}">
                                            </div>
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div> --}}


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Status</label>
                                                <select type="text" name="status" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="{{$activeStatus}}" {{ $section->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                    <option value="{{$inactiveStatus}} {{ $section->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
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
                                                <input type="text" name="meta_keywords"  class="form-control"  value="{{ $section->meta_keywords }}" placeholder="bitcoin, training, crypto" >
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
                                                <input type="text" name="meta_description"  class="form-control"  value="{{ $section->meta_description}}" placeholder="this category is for bitcoin only" >
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
