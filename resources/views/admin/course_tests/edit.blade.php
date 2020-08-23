@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Course Test' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT COURSE TEST
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.details.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('course.test.details.update' , $test->course_id)}}" method="post" enctype="multipart/form-data">@csrf
                                @method('put')
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Course</label>
                                                <select type="text" name="course_id" required class="form-control">
                                                    <option value="" selected>Select Course</option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{$course->id}}" {{ $course->id == $test->course_id ? 'selected' : '' }}>{{$course->title}}</option>
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
                                            <input type="text" name="title" required class="form-control" required value="{{ $test->title }}">
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
                                                <label for="">Difficulty</label>
                                                <select type="text" name="difficulty" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="0" {{ $test->difficulty == '0' ? 'selected' : '' }}>Beginners</option>
                                                    <option value="1" {{ $test->difficulty == '1' ? 'selected' : '' }}>Intermediate</option>
                                                    <option value="2" {{ $test->difficulty == '2' ? 'selected' : '' }}>Advanced</option>
                                                    <option value="3" {{ $test->difficulty == '3' ? 'selected' : '' }}>Professional</option>
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
                                                <label for="">Duration (mins)</label>
                                            <input type="number" name="duration" required class="form-control" required value="{{ $test->duration }}">
                                            </div>
                                            @error('duration')
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
                                                    <option value="{{$activeStatus}}" {{ $test->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                    <option value="{{$inactiveStatus}}" {{ $test->status == $inactiveStatus ? 'selected' : '' }}>Inactive</option>
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
