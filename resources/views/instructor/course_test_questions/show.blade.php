@extends('admin.layout.app',[ 'pageTitle' =>  ' Test Question Information' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 TEST QUESTION INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5 mt-4 md-mt-0">
                                <li class="dropdown">
                                    <a href="{{ route('course.test.questions.edit' , $question->id) }}" class="btn btn-sm btn-outline-primary"> Edit Test Question</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
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
                                                        <p class="p-5"><b class="ml-5 mt-3">Test Title: </b> {{ $question->test->title}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Course: </b> {{ $question->course->title ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Type: </b> {{ $question->getType() }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Question: </b> {!! $question->question !!}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Duration: </b> {{ $question->duration}} mins</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $question->getStatus()}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($question->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($question->updated_at)) }}</p>
                                                    </div>

                                                </div>

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
