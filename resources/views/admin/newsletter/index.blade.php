@extends('admin.layout.app',[ 'pageTitle' =>  'Newsletter Subscribers' , 'activeGroup'  => 'referrals', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                NEWSLETTER SUBSCRIBERS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('newsletters.create') }}" class="btn btn-sm btn-outline-primary"> New Letter</a>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($emails as $email)
                                        <tr>
                                            <td>{{$email->name}}</td>
                                            <td>{{$email->email}}</td>
                                            <td>{{ date('Y-m-d, h:i:A',strtotime($email->created_at)) }}</td>
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
