@extends('admin.layout.app',[ 'pageTitle' =>  'Advertisement Info | Advertisements' , 'activeGroup'  => 'adverts', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ADVERTISEMENT INFORMATION
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('adverts.edit' , $advert->id) }}" class="btn btn-sm btn-outline-primary"> Edit Advert</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#information" aria-controls="information" role="tab" data-toggle="tab">Information</a></li>
                                    <li role="presentation" class=""><a href="#media" aria-controls="media" role="tab" data-toggle="tab">Media</a></li>
                                    <li role="presentation" class=""><a href="#analytics" aria-controls="analytics" role="tab" data-toggle="tab">Analytics</a></li>
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
                                                        <p class="p-5"><b class="ml-5 mt-3">Admin Name: </b> {{ $advert->admin->name ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Merchant User Name: </b> {{ $advert->user->name ?? ''}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Merchant Name: </b> {{ $advert->name}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Merchant Email: </b> {{ $advert->email}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Company Name: </b> {{ $advert->company_name}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Reference: </b> #{{ $advert->reference}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Url: </b> <a href="{{ $advert->url}}">Visit link</a></p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Advert Host: </b> {{ $advert->host }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Advert Type: </b> {{ $advert->type }}</p>
                                                    </div>

                                                    <div class="col-md-6"><br>
                                                        <p class="p-5"><b class="ml-5 mt-3">Title: </b> {{ $advert->title }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Description: </b> {{ $advert->description }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Daily Rate: </b> ${{ $advert->rate}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Discount: </b> ${{ $advert->discount}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Status: </b> {{ $advert->status}}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Start Date: </b> {{ date('Y-m-d',strtotime($advert->start_date)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Stop Date: </b> {{ date('Y-m-d',strtotime($advert->stop_date)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Created At: </b> {{ date('Y-m-d',strtotime($advert->created_at)) }}</p>
                                                        <p class="p-5"><b class="ml-5 mt-3">Updated At: </b> {{ date('Y-m-d',strtotime($advert->updated_at)) }}</p>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade in" id="media">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Media
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#new_media" style="float: right" class="btn btn-sm btn-outline-primary">New Media</a>
                                                </h3>
                                            </div>
                                            <div class="panel-body" style="padding:10px ">
                                                @foreach ($advert->media as $media)
                                                    <div class="row">
                                                    <div class="col-md-4"><img src="{{ $media->mediaFile() }}" alt="" class="img img-fluid img-responsive"></div>
                                                        <div class="col-md-6">
                                                            {{ $media->caption }}
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form action="{{ route('advertmedia.destroy', $media->id) }}" method="post">@csrf @method('delete')
                                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_{{$media->id}}">Edit</button>
                                                                <button type="submit" class="btn btn-danger"  onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="edit_{{$media->id}}" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-md" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Edit Media</h4>
                                                                </div>
                                                            <form action="{{ route('advertmedia.update', $media->id) }}" method="post" enctype="multipart/form-data">@csrf @method('put')
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="advert_id" value="{{ $advert->id }}" required>
                                                                    <div class="form-group">
                                                                        <label for="">Type</label>
                                                                        <select type="text" name="type" class="form-control" required>
                                                                            {{-- <option value=""disabled selected></option> --}}
                                                                            <option value="1" {{$media->type == '1' ? 'selected' : ''}}>Picture</option>
                                                                        </select>
                                                                        @error('type')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Source</label>
                                                                        <select type="text" name="source" class="form-control source" required>
                                                                            <option value=""disabled selected></option>
                                                                            <option value="1" data-target="#upload_file" {{$media->source == '1' ? 'selected' : ''}}> Upload</option>
                                                                            <option value="2" data-target="#url_link" {{$media->source == '2' ? 'selected' : ''}}>Url Link</option>
                                                                        </select>
                                                                        @error('source')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                    </div>
                                                                    <div class="form-group" id="upload_file">
                                                                            <label for="">Upload File</label>
                                                                            <input type="file" name="file" class="form-control" >
                                                                            @error('file')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" id="url_link">
                                                                            <div class="form-line">
                                                                                <label for="">File Source Url</label>
                                                                                <input type="text" name="file_url" class="form-control" value="{{$media->file_url}}">
                                                                            </div>
                                                                            @error('file_url')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" id="url">
                                                                            <div class="form-line">
                                                                                <label for="">Advert Url</label>
                                                                                <input type="text" name="url" class="form-control" value="{{$media->url}}">
                                                                            </div>
                                                                            @error('url')
                                                                                <span class="invalid-feedback" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="form-group" id="caption">
                                                                            <div class="form-line">
                                                                                <label for="">Caption</label>
                                                                                <input type="text" name="caption" class="form-control" value="{{$media->caption}}">
                                                                            </div>
                                                                            @error('caption')
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
                                                                                    <option value="1" {{$media->status == 1 ? 'selected' : ''}}>Active</option>
                                                                                    <option value="2" {{$media->status == 3 ? 'selected' : ''}}>Disabled</option>
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
                                            </div>
                                        </div>
                                    </div>


                                    <div role="tabpanel" class="tab-pane fade in" id="analytics">
                                        <div class="panel panel-default panel-post">
                                            <div class="panel-heading">
                                                <h3>Analytics</h3>
                                            </div>
                                            <div class="panel-body">

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


        <div class="modal fade" id="new_media" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">New Media</h4>
                    </div>
                <form action="{{ route('advertmedia.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="modal-body">
                        <input type="hidden" name="advert_id" value="{{ $advert->id }}" required>
                           <div class="form-group">
                               <label for="">Type</label>
                               <select type="text" name="type" class="form-control" required>
                                   {{-- <option value=""disabled selected></option> --}}
                                   <option value="1">Picture</option>
                               </select>
                               @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <div class="form-group">
                               <label for="">Source</label>
                               <select type="text" name="source" class="form-control source" required>
                                   <option value=""disabled selected></option>
                                   <option value="1" data-target="#upload_file"> Upload</option>
                                   <option value="2" data-target="#url_link">Url Link</option>
                               </select>
                               @error('source')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           </div>
                           <div class="form-group" id="upload_file">
                                <label for="">Upload File</label>
                                <input type="file" name="file" class="form-control">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group" id="url_link">
                                <div class="form-line">
                                    <label for="">File Source Url</label>
                                    <input type="text" name="file_url" class="form-control" value="{{old('file_url')}}">
                                </div>
                                @error('file_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="url">
                                <div class="form-line">
                                    <label for="">Advert Url</label>
                                <input type="text" name="url" class="form-control" value="{{old('url')}}">
                                </div>
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group" id="caption">
                                <div class="form-line">
                                    <label for="">Caption</label>
                                    <input type="text" name="caption" class="form-control">
                                </div>
                                @error('caption')
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
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        <button type="save" class="btn btn-link waves-effect">SAVE</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
@stop
