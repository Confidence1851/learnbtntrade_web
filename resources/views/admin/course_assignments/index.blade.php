@extends('admin.layout.app',[ 'pageTitle' =>  'Course Test Answers' , 'activeGroup'  => 'course', 'activePage' => 'assignments'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE ASSIGNMENTS
                            </h2>

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>User</th>
                                            <th>Batch No</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i = 0)
                                        @foreach($answers as $answer)
                                        @php($i++)

                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $answer->user->fullName() }}</td>
                                            <td>{{ $answer->batch_no }}</td>
                                            <td>{{ date('Y-m-d, h:i:A',strtotime($answer->created_at)) }}</td>
                                            <td><a href="{{ route('course.assignments.show' , $answer) }}" class="btn btn-primary btn-sm">View</a></td>
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


@stop
