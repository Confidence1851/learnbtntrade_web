@extends('admin.layout.app',[ 'pageTitle' =>  'Course Section Information' , 'activeGroup'  => 'course', 'activePage' => 'course_all'])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                COURSE SECTION INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5 mt-4 md-mt-0">
                                <li class="dropdown">
                                    <a href="{{ route('course.sections.edit' , $section->id) }}" class="btn btn-sm btn-outline-primary"> Edit Section</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
                                    <li role="presentation" class=""><a href="#resources" aria-controls="media" role="tab" data-toggle="tab">Resources</a></li>
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
                                                        <p class="p-5"><b class="ml-5 mt-3">Course Title: </b> {{ $section->course->title ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Section Number: </b> {{ $section->number}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Section Title: </b> {{ $section->title}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Keywords: </b> {{ $section->meta_keywords}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">SEO Description: </b> {{ $section->meta_description}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $section->getStatus()}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($section->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($section->updated_at)) }}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <div class="p-3">
                                                            <video src="{{ route('course.sections.file', encrypt($section->id)) }}" controls class="img-responsive" style="max-height: 400px"></video>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="resources">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Section Resources
                                                    <span style="float: right">
                                                         <a href="" data-toggle="modal" data-target="#new_resource" class="btn btn-sm btn-outline-primary"> New Resource</a>
                                                    </span>
                                                </h3>
                                            </div>
                                            <div class="panel-body" style="padding:10px ">
                                                 <!-- Exportable Table -->
                                                <div class="row clearfix">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="">

                                                            <div class="body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">  <!-- js-basic-example -->
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Filename</th>
                                                                                <th>File-Type</th>
                                                                                <th>Size</th>
                                                                                <th>Status</th>
                                                                                <th>Creation Date</th>
                                                                                <th>Action</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach($section->resources as $resource)
                                                                            <tr>
                                                                                <td>{{$resource->filename }}</td>
                                                                                <td>{{$resource->type}}</td>
                                                                                <td>{{$resource->size}}</td>
                                                                                <td>{{$resource->getStatus()}}</td>
                                                                                <td>{{$resource->created_at->format('M D d, Y')}}</td>
                                                                                <td>
                                                                                    <form  action="{{ route('course.resources.destroy',$resource) }}" method="POST">
                                                                                        @method('delete')
                                                                                        @csrf
                                                                                        <a href="{{ route('course.resources.show' , $resource)}}" class="btn btn-info sm" onclick=" return confirm('Are you sure you want to download this item? it may cost you money!');">
                                                                                            <i class="material-icons">cloud_download</i>
                                                                                        </a>
                                                                                        <a href="" data-toggle="modal" data-target="#edit_resource_{{ $resource->id }}" class="btn btn-success sm" >
                                                                                            <i class="material-icons">edit</i>
                                                                                        </a>

                                                                                        <button type="submit" class="btn btn-danger xs"  onclick=" return confirm('Are you sure you want to delete this item? ');">
                                                                                            <i class="material-icons">delete</i>
                                                                                        </button>

                                                                                    </form>
                                                                                </td>

                                                                                <div class="modal fade" id="edit_resource_{{ $resource->id }}" tabindex="-1" role="dialog">
                                                                                    <div class="modal-dialog modal-md" role="document">
                                                                                        <div class="modal-content">
                                                                                            <div class="modal-header">
                                                                                                <h4 class="modal-title">Edit Resource</h4>
                                                                                            </div>
                                                                                        <form action="{{ route('course.resources.update', $resource->id ) }}" method="post" enctype="multipart/form-data">
                                                                                            @method('put')
                                                                                            @csrf
                                                                                            <div class="modal-body">
                                                                                                <input type="hidden" name="course_section_id" value="{{ $section->id }}" required>

                                                                                                    <div class="form-group" >
                                                                                                        <div class="form-line">
                                                                                                            <label for="">File Name</label>
                                                                                                            <input type="text" name="filename" class="form-control"  value="{{ $resource->filename }}">
                                                                                                        </div>
                                                                                                        @error('filename')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>

                                                                                                    <div class="form-group" >
                                                                                                        <div class="form-line">
                                                                                                            <label for="">File</label>
                                                                                                            <input type="file" name="file" class="form-control">
                                                                                                        </div>
                                                                                                        @error('file')
                                                                                                            <span class="invalid-feedback" role="alert">
                                                                                                                <strong>{{ $message }}</strong>
                                                                                                            </span>
                                                                                                        @enderror
                                                                                                    </div>

                                                                                                    <div class="form-group">
                                                                                                        <div class="form-line">
                                                                                                            <label for="">Status</label>
                                                                                                            <select type="text" name="status" required class="form-control">
                                                                                                                <option disabled selected></option>
                                                                                                                <option value="1" {{ $resource->status == 1 ? 'selected' : '' }}>Active</option>
                                                                                                                <option value="3" {{ $resource->status == 3 ? 'selected' : '' }}>Inactive</option>
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
                                                                                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                                                                                                <button type="save" class="btn btn-success waves-effect">SAVE</button>
                                                                                            </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
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

        <div class="modal fade" id="new_resource" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Resource</h4>
                    </div>
                <form action="{{ route('course.resources.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="course_section_id" value="{{ $section->id }}" required>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">File Name</label>
                                    <input type="text" name="filename" class="form-control"  value="{{old('filename')}}">
                                </div>
                                @error('filename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">File</label>
                                    <input type="file" name="file" class="form-control">
                                </div>
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-line">
                                    <label for="">Status</label>
                                    <select type="text" name="status" required class="form-control">
                                        <option disabled selected></option>
                                        <option value="1">Active</option>
                                        <option value="3">Inactive</option>
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
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="save" class="btn btn-success waves-effect">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

@stop
