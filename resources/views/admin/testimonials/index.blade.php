@extends('admin.layout.app',[ 'pageTitle' =>  'Student Testimonials' , 'activeGroup'  => 'testimonials', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TESTIMONIALS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="#" data-toggle="modal" data-target="#new_item" class="btn btn-sm btn-outline-primary"> New Testimonial</a>
                                </li>
                            </ul>
                        </div>

                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">  <!-- js-basic-example -->
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Comment</th>
                                            <th>Featured</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td class="text-center"><img src="{{$testimonial->getAvatar()}}" width="30" height="30"  alt="Avatar" /></td>
                                            <td>{{$testimonial->name}}</td>
                                            <td>{{$testimonial->title}}</td>
                                            <td>{{$testimonial->content}}</td>
                                            <td>{{$testimonial->featured == 1? 'Yes' : 'No'}}</td>
                                            <td>{{$testimonial->getStatus()}}</td>
                                            <td>{{ date('Y-m-d, h:i:A',strtotime($testimonial->created_at)) }}</td>
                                            <td>
                                                <form  action="{{ route('testimonials.destroy',$testimonial) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
                                                    <a href="#" class="btn btn-info sm"  data-toggle="modal" data-target="#edit_item_{{$testimonial->id}}">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item?');">
                                                        <i class="material-icons">delete</i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>



                                    <div class="modal fade" id="edit_item_{{$testimonial->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Edit Item</h4>
                                                    </div>
                                                <form action="{{ route('testimonials.update' , $testimonial) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <div class="modal-body">
                                                            <div class="form-group" id="name">
                                                                <div class="form-line">
                                                                    <label for="">Person`s Name</label>
                                                                    <input type="name" name="name" required class="form-control" value="{{ $testimonial->name }}">
                                                                </div>
                                                                @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group" id="title">
                                                                <div class="form-line">
                                                                    <label for="">Title</label>
                                                                    <input type="text" name="title" class="form-control" required placeholder="e.g Student" value="{{ $testimonial->title }}">
                                                                </div>
                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group" id="content">
                                                                <div class="form-line">
                                                                    <label for="">Comment</label>
                                                                    <textarea type="text" name="content" required class="form-control">{{ $testimonial->content }}</textarea>
                                                                </div>
                                                                @error('content')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group" id="image">
                                                                <div class="form-line">
                                                                    <label for="">Person`s Image</label>
                                                                    <input type="file" name="image" class="form-control" >
                                                                </div>
                                                                @error('image')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <label for="">Featured</label>
                                                                    <select type="text" name="featured" required class="form-control" required>
                                                                        <option disabled selected></option>
                                                                        <option value="0" {{ $testimonial->featured == 0 ? 'selected' : '' }}>No</option>
                                                                        <option value="1" {{ $testimonial->featured == 1 ? 'selected' : '' }}>Yes</option>
                                                                    </select>
                                                                </div>
                                                                @error('status')
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
                                                                        <option value="{{$activeStatus}}" {{ $testimonial->status == $activeStatus ? 'selected' : '' }}>Active</option>
                                                                        <option value="{{$inactiveStatus}}" {{ $testimonial->status == $inactiveStatus ? 'selected' : '' }}">Inactive</option>
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
            <!-- #END# Exportable Table -->
        </div>


        <div class="modal fade" id="new_item" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Item</h4>
                    </div>
                <form action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                            <div class="form-group" id="name">
                                <div class="form-line">
                                    <label for="">Person`s Name</label>
                                    <input type="name" name="name" required class="form-control" value="{{ old('name')}}">
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="title">
                                <div class="form-line">
                                    <label for="">Title</label>
                                    <input type="text" name="title" class="form-control" required placeholder="e.g Student" value="{{ old('title')}}">
                                </div>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="content">
                                <div class="form-line">
                                    <label for="">Comment</label>
                                    <textarea type="text" name="content" required class="form-control">{{ old('content')}}</textarea>
                                </div>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="image">
                                <div class="form-line">
                                    <label for="">Person`s Image</label>
                                    <input type="file" name="image"  class="form-control" >
                                </div>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Featured</label>
                                    <select type="text" name="featured" required class="form-control" required>
                                        <option disabled selected></option>
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                @error('status')
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
