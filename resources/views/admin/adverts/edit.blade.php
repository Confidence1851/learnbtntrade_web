@extends('admin.layout.app',[ 'pageTitle' =>  'Edit Advertisement | Advertisements' , 'activeGroup'  => 'adverts', 'activePage' => ''])
@section('content')
     <div class="container-fluid">

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EDIT ADVERTISEMENT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="{{ route('adverts.index') }}" class="btn btn-sm btn-outline-primary"> Back to list</a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form action="{{ route('adverts.update' , $advert->id )}}" method="post">@csrf @method('put')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Merchant User</label>
                                                <select type="text" name="merchant_id" required class="form-control">
                                                    <option value="" selected>Select User</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{$user->id}}" {{ $advert->merchant_id == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('merchant_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Merchant Name</label>
                                                <input type="text" name="name" required class="form-control" value="{{ $advert->name }}">
                                            </div>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Merchant Email</label>
                                                <input type="email" name="email" required class="form-control" value="{{ $advert->email }}">
                                            </div>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Company Name</label>
                                                <input type="text" name="company_name" class="form-control" value="{{ $advert->company_name }}">
                                            </div>
                                            @error('company_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Advert Host</label>
                                                <select type="text" name="host" required class="form-control" >
                                                    <option disabled selected></option>
                                                    <option value="Self" {{ $advert->host == "Self" ? 'selected' : '' }}>Self</option>
                                                    <option value="Commercial" {{ $advert->host == "Commercial" ? 'selected' : '' }}>Commercial</option>
                                                </select>
                                            </div>
                                            @error('host')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Advert Type</label>
                                                <select type="text" name="type" required class="form-control">
                                                    <option disabled selected></option>
                                                    <option value="Banner" {{ $advert->type == "Banner" ? 'selected' : '' }}>Banner</option>
                                                    <option value="Regular" {{ $advert->type == "Regular" ? 'selected' : '' }}>Regular</option>
                                                </select>
                                            </div>
                                            @error('type')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Starts on</label>
                                                <input type="date" name="start_date" required class="form-control"  value="{{ date('Y-m-d',strtotime($advert->start_date)) }}">
                                            </div>
                                            @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Ends on</label>
                                                <input type="date" name="stop_date" required class="form-control"  value="{{ date('Y-m-d',strtotime($advert->stop_date)) }}">
                                            </div>
                                            @error('stop_date')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Rate per Day</label>
                                                <input type="number" name="rate" required class="form-control"  value="{{ $advert->rate }}">
                                            </div>
                                            @error('rate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Discount</label>
                                                <input type="number" name="discount" required class="form-control" value="{{ $advert->discount }}">
                                            </div>
                                            @error('rate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Title</label>
                                                <input type="text" name="title" required class="form-control"  value="{{ $advert->title }}" >
                                            </div>
                                            @error('title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Url Link</label>
                                                <input type="text" name="url" required class="form-control"  value="{{ $advert->url }}">
                                            </div>
                                            @error('url')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Status</label>
                                                <select type="text" name="status" required class="form-control">
                                                    <option disabled selected></option>
                                                    <option value="0" {{ $advert->status == "0" ? 'Pending' : '' }}>Pending</option>
                                                    <option value="1" {{ $advert->status == "1" ? 'Active' : '' }}>Active</option>
                                                    <option value="2" {{ $advert->status == "2" ? 'Inactive' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                            @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label for="">Description</label>
                                                <textarea rows="6" name="description"  class="form-control"> {{ $advert->description }}</textarea>
                                            </div>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-right ">
                                        <button type="submit" class="btn btn-success "> Proceed </button>
                                    </div>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
@stop
