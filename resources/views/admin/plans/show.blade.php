@extends('admin.layout.app',[ 'pageTitle' =>  'Service Plan information' , 'activeGroup'  => 'services', 'activePage' => 'plans'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PLAN INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('service.plans.edit',$plan) }}" class="btn btn-sm btn-outline-primary"> Edit Plan</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="container ">
                                <p><b>Title:</b> <span>{{$plan->title}}</span></p>
                                <p><b>Caption:</b> <span>{{$plan->caption}}</span></p>
                                <p><b>Price:</b> <span>{{$plan->price}}</span></p>
                                <p><b>Featured:</b> <span>{{$plan->featured == 1 ? 'Yes' : 'No'}}</span></p>
                                <p><b>Status:</b> <span>{{$plan->getStatus()}}</span></p>
                                <p><b>Created At:</b> <span>{{ date('M d, Y', strtotime($plan->created_at)) }}</span></p>
                                <p><b>Last updated At:</b> <span>{{  date('M d, Y', strtotime($plan->updated_at)) }}</span></p>
                            </div>
                            <br>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="">
                                        <div class="header">
                                            <h2>
                                                PLAN ITEMS
                                            </h2>
                                            <ul class="header-dropdown m-r--5">
                                                <li class="dropdown">
                                                    <a href="#" data-toggle="modal" data-target="#new_item" class="btn btn-sm btn-outline-primary"> New Item</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Icon</th>
                                                            <th>Body</th>
                                                            <th>Status</th>
                                                            <th>Creation Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                        $i = 0;
                                                        @endphp
                                                        @foreach($plan->items as $item)
                                                        @php
                                                            $i++;
                                                        @endphp
                                                        <tr>
                                                            <td>{{$item->number}}</td>
                                                            <td>{{$item->icon}}</td>
                                                            <td>{{$item->featured == 1 ? 'Yes' : 'No'}}</td>
                                                            <td>{{$item->getStatus()}}</td>
                                                            <td>{{$item->created_at->format('M D d, Y')}}</td>
                                                            <td>
                                                                <form  action="{{ route('service.items.destroy',$item) }}" method="POST">
                                                                    @method('delete')
                                                                    @csrf
                                                                    <a href="#" data-toggle="modal" data-target="#edit_item_{{$item->id}}" class="btn btn-success sm">
                                                                        <i class="material-icons">edit</i>
                                                                    </a>
                                                                    <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item? All comments would also be deleted!');">
                                                                        <i class="material-icons">delete</i>
                                                                    </button>

                                                                </form>
                                                            </td>
                                                        </tr>
                                                    <div class="modal fade" id="edit_item_{{$item->id}}" tabindex="-1" role="dialog">
                                                            <div class="modal-dialog modal-md" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">New Item</h4>
                                                                    </div>
                                                                <form action="{{ route('service.items.update' , $item) }}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('put')
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="plan_id" value="{{ $plan->id }}" required>

                                                                            <div class="form-group" id="caption">
                                                                                <div class="form-line">
                                                                                    <label for="">Item Number</label>
                                                                                    <input type="number" name="number" value="{{ $item->number }}" required class="form-control">
                                                                                </div>
                                                                                @error('number')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group" id="caption">
                                                                                <div class="form-line">
                                                                                    <label for="">Icon</label>
                                                                                    <input type="text" name="icon" value="{{ $item->icon }}"  class="form-control">
                                                                                </div>
                                                                                @error('caption')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group" id="caption">
                                                                                <div class="form-line">
                                                                                    <label for="">Body</label>
                                                                                    <input type="text" name="body" value="{{ $item->body }}"  required class="form-control">
                                                                                </div>
                                                                                @error('body')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <div class="form-line">
                                                                                    <label for="">Status</label>
                                                                                    <select type="text" name="status" required class="form-control" required>
                                                                                        <option disabled selected></option>
                                                                                        <option value="{{$activeStatus}}" {{ $item->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                                                        <option value="{{$inactiveStatus}}" {{ $item->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
                                                                                    </select>
                                                                                </div>
                                                                                @error('status')
                                                                                    <span class="invalid-feedback" role="alert">
                                                                                        <strong>{{ $message }}</strong>
                                                                                    </span>
                                                                                @enderror
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                                        <button type="save" class="btn btn-link waves-effect">SAVE</button>
                                                                    </div>
                                                                    </form>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>

        <div class="modal fade" id="new_item" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Item</h4>
                    </div>
                <form action="{{ route('service.items.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="plan_id" value="{{ $plan->id }}" required>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">Item Number</label>
                                    <input type="number" name="number" required class="form-control">
                                </div>
                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">Icon</label>
                                    <input type="text" name="icon" class="form-control">
                                </div>
                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">Body</label>
                                    <input type="text" name="body" required class="form-control">
                                </div>
                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Status</label>
                                    <select type="text" name="status" required class="form-control" required>
                                        <option disabled selected></option>
                                        <option value="{{$activeStatus}}">Active</option>
                                        <option value="{{$inactiveStatus}}">Inactive</option>
                                    </select>
                                </div>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="save" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@stop
