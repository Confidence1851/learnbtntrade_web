@extends('admin.layout.app',[ 'pageTitle' =>  'Course Information' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5 mt-4 md-mt-0">
                                <li class="dropdown">
                                    <a href="{{ route('course.details.edit' , $course->id) }}" class="btn btn-sm btn-outline-primary"> Edit Course</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
                                    <li role="presentation" class=""><a href="#sections" aria-controls="media" role="tab" data-toggle="tab">Sections</a></li>
                                    <li role="presentation" class=""><a href="#tests" aria-controls="media" role="tab" data-toggle="tab">Test Details</a></li>
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
                                                        <p class="p-5"><b class="ml-5 mt-3">Author Name: </b> {{ $course->author->fullName() ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Category: </b> {{ $course->category->title ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Title: </b> {{ $course->title}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Keywords: </b> {{ $course->meta_keywords}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Description: </b> {{ $course->meta_description}}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Featured: </b>{{ $course->featured  == 1 ? 'Yes' : 'No'}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $course->getStatus()}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($course->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($course->updated_at)) }}</p>
                                                    </div>

                                                </div>
                                                <div class=""  style="padding:10px ">
                                                    <div class="mt-2 mb-2">
                                                        <img src="{{ getFileFromStorage($course->image , 'storage') }}" alt="" class="img-responsive">
                                                    </div>
                                                    <br>
                                                    {!! $course->description !!}
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="sections">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Course Sections
                                                    <span style="float: right">
                                                         <a href="{{ route('course.sections.create', $course->id) }}" class="btn btn-sm btn-outline-primary"> New Section</a>
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
                                                                                <th>Section</th>
                                                                                <th>Title</th>
                                                                                <th>Duration</th>
                                                                                <th>Size</th>
                                                                                <th>Resources</th>
                                                                                <th>Status</th>
                                                                                <th>Creation Date</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($course->sections as $section)
                                                                            <tr>
                                                                                <td>{{$section->number }}</td>
                                                                                <td>{{$section->title}}</td>
                                                                                <td>{{$section->duration}} Mins</td>
                                                                                <td>{{$section->size}}</td>
                                                                                <td>{{$section->resources->count()}}</td>
                                                                                <td>{{$section->getStatus()}}</td>
                                                                                <td>{{$course->created_at->format('M D d, Y')}}</td>
                                                                                <td>
                                                                                    <form  action="{{ route('course.sections.destroy',$section) }}" method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        <a href="{{ route('course.sections.show' , $section->id) }}" class="btn btn-info xs">
                                                                                            <i class="material-icons">remove_red_eye</i>
                                                                                        </a>
                                                                                        <a href="{{ route('course.sections.edit' , $section->id) }}" class="btn btn-success xs">
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

                                    <div role="tabpanel" class="tab-pane fade in" id="tests">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Course Test Details
                                                    <span style="float: right">
                                                         <a href="{{ route('course.test.details.create' , $course->id) }}" class="btn btn-sm btn-outline-primary"> New Test</a>
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
                                                                                <th>Title</th>
                                                                                <th>Difficulty</th>
                                                                                <th>Duration</th>
                                                                                <th>Status</th>
                                                                                <th>Creation Date</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($course->tests as $test)
                                                                            <tr>
                                                                                <td>{{$test->title }}</td>
                                                                                <td>{{$test->getDifficulty() }}</td>
                                                                                <td>{{$test->duration}} Mins</td>
                                                                                <td>{{$test->getStatus()}}</td>
                                                                                <td>{{$test->created_at->format('M D d, Y')}}</td>
                                                                                <td>
                                                                                    <form  action="{{ route('course.test.details.destroy',$test) }}" method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        <a href="{{ route('course.test.details.show' , $test->id) }}" class="btn btn-info xs">
                                                                                            <i class="material-icons">remove_red_eye</i>
                                                                                        </a>
                                                                                        <a href="{{ route('course.test.details.edit' , $test->id) }}" class="btn btn-success xs">
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
