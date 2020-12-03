@extends('dashboard_layout.app',[ 'pageTitle' =>  'Service Plans' , 'activeGroup'  => 'services', 'activePage' => 'plans'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SERVICE PLANS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('service.plans.create') }}" class="btn btn-sm btn-outline-primary"> New Plan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            {{-- <th>Image</th> --}}
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>Items</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Creation Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach($plans as $plan)
                                        @php
                                            $i++;
                                        @endphp
                                        <tr>
                                            <td>{{$i}}</td>
                                            {{-- <td><img src="{{$plan->title}}" alt="image"></td> --}}
                                            <td>{{$plan->title}}</td>
                                            <td>{{ format_money($plan->price)}}</td>
                                            <td><a href="{{ route('service.plans.show',$plan) }}">{{$plan->items->count()}}</a></td>
                                            <td>{{$plan->featured == 1 ? 'Yes' : 'No'}}</td>
                                            <td>{{$plan->getStatus()}}</td>
                                            <td>{{$plan->created_at->format('M D d, Y')}}</td>
                                            <td>
                                                <form  action="{{ route('service.plans.destroy',$plan) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="{{ route('service.plans.show',$plan) }}" class="btn btn-info sm">
                                                        <i class="material-icons">remove_red_eye</i>
                                                    </a>
                                                    <a href="{{ route('service.plans.edit',$plan) }}" class="btn btn-success sm">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item?');">
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
@stop
