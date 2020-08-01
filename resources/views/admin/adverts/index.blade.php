@extends('admin.layout.app',[ 'pageTitle' =>  'All Advertisements | Advertisements' , 'activeGroup'  => 'adverts', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADVERTISEMENTS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('adverts.create') }}" class="btn btn-sm btn-outline-primary"> New Advert</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Title</th>
                                            <th>Reference No.</th>
                                            <th>Daily Rate</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($adverts as $advert)
                                        <tr>
                                            <td><a href="{{ route('adverts.show',$advert) }}" class="btn btn-outline-primary sm">More Info</a></td>
                                            <td>{{$advert->title}}</td>
                                            <td>{{$advert->reference}}</td>
                                            <td>${{$advert->rate}}</td>
                                            <td>{{$advert->status}}</td>
                                            <td>{{$advert->created_at->format('M D d, Y h:i:A')}}</td>
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
