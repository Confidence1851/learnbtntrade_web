@php
    if(auth('web')->user()->role == $bloggerRole){
        $layout = 'blogger.layout.app';
    }
    else if(auth('web')->user()->role == $instructorRole){
        $layout = 'instructor.layout.app';
    }
    else{
        $layout = 'admin.layout.app';
    }
@endphp
@extends($layout,[ 'pageTitle' =>  'Edit Profile' , 'activeGroup'  => 'profile', 'activePage' => ''])
@section('content')

<div class="container-fluid">
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-3">
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src="{{$user->getAvatar()}}" width="160" height="160" alt="avatar" />
                                {{-- <div class="btn btn-sm btn-info" >
                                    Change Photo <i class="material-icons mt-4">camera_alt</i>
                                </div>
                                <form action="" method="post">
                                    <input type="hidden"  name="user_id" value="{{auth('web')->id()}}">
                                </form> --}}
                            </div>
                            <div class="content-area">
                                <h3>{{$user->name}}</h3>
                                <p>{{$user->getRole()}}</p>
                            </div>
                        </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Name</span>
                                    <span>{{$user->fullName()}}</span>
                                </li>
                                <li>
                                    <span>Email</span>
                                    <span>{{$user->email}}</span>
                                </li>
                                <li>
                                    <span>Phone</span>
                                    <span>{{$user->phone}}</span>
                                </li>
                                <li>
                                    <span>Country</span>
                                    <span>{{$user->country}}</span>
                                </li>
                                <li>
                                    <span>State</span>
                                    <span>{{$user->state}}</span>
                                </li>
                                <li>
                                    <span>Referral Code</span>
                                    <span>{{$user->ref_code}}</span>
                                </li>
                                <li>
                                    <span>Status</span>
                                    <span>{{$user->getStatus()}}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#profile_settings active" aria-controls="settings" role="tab" data-toggle="tab">Profile</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>

                                <div class="tab-content">


                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                    <form class="form-horizontal" method="POST" action="{{ route('profile.update')}}" enctype="multipart/form-data">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="NameSurname" class="col-sm-2 control-label">First Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                            <input type="text" class="form-control" id="NameSurname" name="fname" placeholder="Name Surname" value="{{$user->fname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="NameSurname" class="col-sm-2 control-label">Last Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                            <input type="text" class="form-control" id="NameSurname" name="lname" placeholder="Name Surname" value="{{$user->fname}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Email</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="email" class="form-control" readonly name="email" placeholder="Email" value="{{$user->email}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Phone</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="phone" placeholder="Phone number" value="{{$user->phone}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Gender</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control" name="gender"  required>
                                                                    <option value="" disabled selected>Select Option</option>
                                                                    <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                                                                    <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Country</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <select class="form-control" name="country"  required>
                                                                    {{-- <option value="" disabled selected>Select Option</option> --}}
                                                                    <option value="Nigeria">Nigeria</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">State</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="state" placeholder="e.g Lagos" value="{{$user->state}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="Email" class="col-sm-2 control-label">Profile Photo</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="file" class="form-control" name="avatar" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                    <form class="form-horizontal" method="POST" action="{{route('profile.password_reset') }}">
                                        @csrf
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="oldpassword" placeholder="Old Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPassword" name="password" placeholder="New Password" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="NewPasswordConfirm" name="password_confirmation" placeholder="New Password (Confirm)" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop
