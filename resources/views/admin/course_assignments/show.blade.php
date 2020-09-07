@extends('admin.layout.app',[ 'pageTitle' =>  'Course Test Answers' , 'activeGroup'  => 'course', 'activePage' => 'assignments'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE ASSIGNMENT ANSWERS
                            </h2>

                        </div>

                       <div class="body">
                        <div class="row  mb-5">
                            <div class="col-md-6">
                                <p class="mb-2"><b>User:</b> {!! $answer->user->fullName() !!}</p>
                                <p class="mb-2"><b>Batch No:</b> {!! $answer->batch_no !!}</p>
                                <p class="mb-2"><b>Course:</b> {!! $answer->question->course->title !!}</p>
                            </div>
                        </div>
                           @foreach ($answers as $answer)
                           <div class="row card ">
                               <div class="col-md-6">
                                   <p class="mb-2"><b>Question:</b> {!! $answer->question->question!!}</p>
                                   <p class="mb-2"><b>Answer:</b> {!! $answer->question->answer!!}</p>
                               </div>
                               <div class="col-md-6">
                                <p class="mb-2"><b>User Answer:</b> {!! $answer->user_answer !!}</p>
                                @if (!empty($answer->file))
                                    <p class="mb-2"><b>File:</b> <a href="{{ $answer->getAnswerFile() }}" target="_blank" class="btn btn-primary btn-sm">View File</a></p>
                                @endif
                            </div>
                           </div>
                           @endforeach

                       </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>


@stop
