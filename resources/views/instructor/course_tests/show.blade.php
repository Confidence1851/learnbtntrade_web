@extends('admin.layout.app',[ 'pageTitle' =>  'Course Test Information' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE TEST INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5 mt-4 md-mt-0">
                                <li class="dropdown">
                                    <a href="{{ route('course.test.details.edit' , $test->id) }}" class="btn btn-sm btn-outline-primary"> Edit Test</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
                                    <li role="presentation" class=""><a href="#questions" aria-controls="media" role="tab" data-toggle="tab">Questions</a></li>
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
                                                        <p class="p-5"><b class="ml-5 mt-3">Author Name: </b> {{ $test->author->fullName() ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Course: </b> {{ $test->course->title ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Title: </b> {{ $test->title}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Difficulty: </b> {{ $test->getDifficulty() }}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Duration: </b> {{ $test->duration}} mins</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $test->getStatus()}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($test->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($test->updated_at)) }}</p>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="questions">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Test Questions
                                                    <span style="float: right">
                                                         <a href="{{ route('course.test.questions.create', $test->id) }}" class="btn btn-sm btn-outline-primary"> New Question</a>
                                                    </span>
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
                                                                                <th>Test Title</th>
                                                                                <th>Question</th>
                                                                                <th>Type</th>
                                                                                <th>Duration</th>
                                                                                <th>Status</th>
                                                                                <th>Creation Date</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($test->questions as $question)
                                                                            <tr>
                                                                                <td>{{$test->title}}</td>
                                                                                <td>{!! $question->question !!}</td>
                                                                                <td>{{$question->getType() }}</td>
                                                                                <td>{{$question->duration}} Mins</td>
                                                                                <td>{{$question->getStatus()}}</td>
                                                                                <td>{{$question->created_at->format('M D d, Y')}}</td>
                                                                                <td>
                                                                                    <form  action="{{ route('course.test.questions.destroy',$question) }}" method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        <a href="{{ route('course.test.questions.show' , $question->id) }}" class="btn btn-info xs">
                                                                                            <i class="material-icons">remove_red_eye</i>
                                                                                        </a>
                                                                                        <a href="{{ route('course.test.questions.edit' , $question->id) }}" class="btn btn-success xs">
                                                                                            <i class="material-icons">edit</i>
                                                                                        </a>

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
