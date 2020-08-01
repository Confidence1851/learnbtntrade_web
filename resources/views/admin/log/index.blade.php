@extends('admin.layout.app',[ 'pageTitle' =>  'Activity Logs' , 'activeGroup'  => 'logs', 'activePage' => 'logs'])
@section('content')
     <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ACTIVITY LOG
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <button class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#new_logs">Add logs</button>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Description</th>
                                            <th>Caused By</th>
                                            <th>Caused On</th>
                                            <th>Changes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($logs as $log)
                                        <tr>
                                            <td></td>
                                            <td>{{$log->subject_type }} <b>ID :#</b>{{$log->subject_id }} was <b>{{$log->description}}</b> on  {{ date('Y-m-d, h:i:A',strtotime($log->created_at)) }}</td>
                                            <td><a data-toggle="modal" data-target="#log_cause-{{$log->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td><a data-toggle="modal" data-target="#log_subject-{{$log->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td><a data-toggle="modal" data-target="#log_changes-{{$log->id}}" class="btn btn-outline-primary sm">More Info</a></td>
                                        </tr>

                                        <div class="modal fade" id="log_cause-{{$log->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4>Causer Details </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $log->cause_model !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="log_subject-{{$log->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4>Subject Details </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $log->subject_model !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="log_changes-{{$log->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h4>Changes Details  </h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $log->changes_record !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
