@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Test Question' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT TEST QUESTION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('course.test.details.show' , $question->test->id) }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('course.test.questions.update' , $question->id)}}" method="post" enctype="multipart/form-data">@csrf
                                @method('put')
                                <div class="row">


                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Course Test</label>
                                                <select type="text" name="course_test_id" required class="form-control">
                                                    <option value="{{$question->test->id}}" selected>{{$$question->test->title}}</option>
                                                </select>
                                            </div>
                                            @error('course_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Question Type</label>
                                                <select type="text" name="type" required class="form-control" required>
                                                    <option disabled selected></option>
                                                    <option value="0" disabled {{ $question->type == '0' ? 'selected' : '' }}>Single Choice</option>
                                                    <option value="1" disabled {{ $question->type == '1' ? 'selected' : '' }}>Multi Choice</option>
                                                    <option value="2" {{ $question->type == '2' ? 'selected' : '' }}>Generic</option>
                                                </select>
                                            </div>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Question</label>
                                            <textarea rows="4" name="question" required class="form-control ckeditor" required >{{ $question->question }}</textarea>
                                            </div>
                                            @error('question')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="nongeneric d-none" style="display: none">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Option A</label>
                                                <textarea  name="a"  class="form-control" >{{ $question->a }}</textarea>
                                                </div>
                                                @error('a')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Option B</label>
                                                <textarea  name="b"  class="form-control" >{{ $question->b }}</textarea>
                                                </div>
                                                @error('b')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Option C</label>
                                                <textarea  name="c"  class="form-control" >{{ $question->c }}</textarea>
                                                </div>
                                                @error('c')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Option D</label>
                                                <textarea  name="d"  class="form-control" >{{ $question->d }}</textarea>
                                                </div>
                                                @error('d')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <label for="">Answer(s)</label>
                                                <input type="text"  name="answer" class="form-control" value="{{ $question->answer }}" placeholder="Either A or B,..... if its a multichoice , seperate answers by comma e.g A,B">
                                                </div>
                                                @error('answer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">File</label>
                                            <input type="file"  name="file" class="form-control">
                                            </div>
                                            @error('file')
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
                                                <input type="number" name="duration" class="form-control" placeholder="Estimated mins for question (optional)" value="{{ old('duration') }}">
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
                                                    <option value="{{$activeStatus}}" {{ $question->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                    <option value="{{$inactiveStatus}}" {{ $question->status == $inactiveStatus ? 'selected' : '' }}>Inactive</option>
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
