@extends('dashboard_layout.app',[ 'pageTitle' => 'Student Testimonials' , 'activeGroup' => 'testimonials', 'activePage'
=> ''])
@section('content')
    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            CREATE TESTIMONIALS
                        </h2>

                    </div>

                    <div class="body">
                        <div class="form">
                            <form action="{{ route('testimonials.store') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="modal-body">
                                    <div class="form-group" id="name">
                                        <div class="form-line">
                                            <label for="">Person`s Name</label>
                                            <input type="name" name="name" required class="form-control" value="{{ old('name') }}">
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
                                            <input type="text" name="title" class="form-control" required placeholder="e.g Student"
                                                value="{{ old('title') }}">
                                        </div>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group" id="image">
                                        <div class="form-line">
                                            <label for="">Person`s Image</label>
                                            <input type="file" name="image" class="form-control">
                                        </div>
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group" id="content">
                                        <div class="form-line">
                                            <label for="">Comment Text</label>
                                            <textarea type="text" name="content"
                                                class="form-control">{{ old('content') }}</textarea>
                                        </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group" id="content_image">
                                        <div class="form-line">
                                            <label for="">Comment Image</label>
                                            <input type="file" name="content_image" class="form-control">
                                        </div>
                                        @error('content_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Comment Type</label>
                                            <select type="text" name="content_type" required class="form-control" required>
                                                <option disabled selected></option>
                                                <option value="text">Text</option>
                                                <option value="image">Image</option>
                                            </select>
                                        </div>
                                        @error('content_type')
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
                                                <option value="{{ $activeStatus }}">Active</option>
                                                <option value="{{ $inactiveStatus }}">Inactive</option>
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
                                    <button type="save" class="btn btn-link waves-effect">SAVE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>

@stop

