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
                            TESTIMONIALS
                        </h2>
                    </div>

                    <div class="body">
                        <div class="form">
                            <form action="{{ route('testimonials.update', $testimonial) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="modal-body">
                                    <div class="form-group" id="name">
                                        <div class="form-line">
                                            <label for="">Person`s Name</label>
                                            <input type="name" name="name" required class="form-control"
                                                value="{{ $testimonial->name }}">
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
                                            <input type="text" name="title" class="form-control" required
                                                placeholder="e.g Student" value="{{ $testimonial->title }}">
                                        </div>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group row" id="image">
                                        <div class="col-md-3">
                                            @if (!empty(($image = $testimonial->getAvatar())))
                                            <a href="{{ $image }}" target="_blank">
                                                <img src="{{ $image }}" width="100" alt="Avatar" />
                                            </a>
                                            @endif
                                        </div>
                                        <div class="col-md-9">
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
                                    </div>

                                    <div class="form-group" id="content">
                                        <div class="form-line">
                                            <label for="">Comment Text</label>
                                            <textarea type="text" name="content"
                                                class="form-control">{{ $testimonial->content }}</textarea>
                                        </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>



                                    <div class="form-group row" id="content_image">
                                        <div class="col-md-3">
                                            @if (!empty(($image = $testimonial->getContentImage())))
                                            <a href="{{ $image }}" target="_blank">
                                                <img src="{{ $image }}" width="100" alt="Avatar" />
                                            </a>
                                            @endif
                                        </div>
                                        <div class="col-md-9">

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

                                    </div>

                                    <div class="form-group">
                                        <div class="form-line">
                                            <label for="">Comment Type</label>
                                            <select type="text" name="content_type" required class="form-control" required>
                                                <option disabled selected></option>
                                                <option value="text"
                                                    {{ $testimonial->content_type == 'text' ? 'selected' : '' }}>Text
                                                </option>
                                                <option value="image"
                                                    {{ $testimonial->content_type == 'image' ? 'selected' : '' }}>Image
                                                </option>
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
                                                <option value="0" {{ $testimonial->featured == 0 ? 'selected' : '' }}>
                                                    No</option>
                                                <option value="1" {{ $testimonial->featured == 1 ? 'selected' : '' }}>
                                                    Yes</option>
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
                                                <option value="{{ $activeStatus }}"
                                                    {{ $testimonial->status == $activeStatus ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="{{ $inactiveStatus }}"
                                                    {{ $testimonial->status == $inactiveStatus ? 'selected' : '' }}">
                                                    Inactive</option>
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
