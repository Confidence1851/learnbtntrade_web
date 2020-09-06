@extends('admin.layout.app',[ 'pageTitle' =>  'Referral History' , 'activeGroup'  => 'referrals', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                REFERRAL HISTORY
                            </h2>

                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>User</th>
                                            <th>Referred By</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($referrals as $referral)
                                        <tr>
                                            <td></td>
                                            <td><a href="{{ route('users.show',$referral->user_id) }}">{{$referral->user->fullName()}}</a></td>
                                            <td><a href="{{ route('users.show',$referral->referrer_id) }}">{{$referral->referrer->fullName()}}</a></td>
                                            <td>{{ date('Y-m-d, h:i:A',strtotime($referral->created_at)) }}</td>
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
