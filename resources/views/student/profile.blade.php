@extends('web.layouts.app' , ['title' => 'My Profile'   , 'activePage' => 'profile' , 'meta_keywords' => '' , 'meta_description' => '' ])
@section('content')
 <!-- Content -->
 <div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                <h1 class="text-white">M Profile</h1>
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="index.html">Home</a></li>
                        <li>Student Profile</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- Teachers Profile -->
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 m-b30">
                    <div class="teachers-profile">
                        <div class="img">
                            <img src="{{ auth('web')->user()->getAvatar() }}">
                        </div>
                        <div class="teachers-info">
                            <h4 class="name">{{ $user->fullName() }}</h4>
                            <span class="position">Student</span>
                        </div>
                        <div class="teachers-contact">
                            <ul>
                                <li class="title">Contact Info</li>
                                <li><span>Country:</span>{!! $user->country !!}</li>
                                <li><span>State:</span>{!! $user->state !!}</li>
                                <li><span>Address:</span>{!! $user->address !!}</li>
                                <li><span>Email:</span>{{ $user->email }}</li>
                                <li><span>Phone:</span>{{ $user->phone }}</li>
                            </ul>
                            <div class="share-list">
                                <div><b>Referral Code:</b> {{ $user->ref_code }}</div>
                                <div><b>Ref Link:</b>
                                     <input class="ref_invite form-control" value="{{ route('ref_invite' , $user->ref_code) }}">
                                 </div>
                                {{-- <h5>Share :</h5>
                                <ul class="dlab-social-icon">
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-facebook facebook"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-twitter twitter"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-linkedin linkedin"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-whatsapp whatsapp"></a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="col-lg-12">
                        {{-- <div class="sort-title clearfix text-center">
                            <h4>Tabs defult</h4>
                        </div> --}}
                        <!-- tabs defult -->
                        <div class="section-content box-sort-in button-example p-t10 p-b30 tabs-site-button">
                            <div class="dlab-tabs">
                                <ul class="nav nav-tabs">
                                    <li><a data-toggle="tab" href="#profile" class="active"><i class="ti-image"></i><span class="title-head">Edit Profile</span></a></li>
                                    <li><a data-toggle="tab" href="#password"><i class="fa fa-cog"></i><span class="title-head">Change Password</span></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane active">
                                        <form action="{{ route('student.profile.update')}}" method="post" enctype="multipart/form-data">@csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">FIRST NAME *</label>
                                                        <input name="fname" class="form-control" placeholder="Your Name" type="text" value="{{ $user->fname }}" required autocomplete="fname" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">LAST NAME *</label>
                                                        <input name="lname" class="form-control" placeholder="Your Name" type="text" value="{{ $user->lname }}" required autocomplete="lname" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">PHONE *</label>
                                                        <input type="tel" class="form-control" placeholder="Your Phnoe number e.g +234700000000"  value="{{ $user->phone }}" required  autocomplete="email" autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">COUNTRY *</label>
                                                        <select type="text" name="country" required class="form-control" required>
                                                            <option value="Nigeria" >Nigeria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">STATE *</label>
                                                        <select type="text" name="state" required class="form-control" required>
                                                            <option value="Nigeria" >Nigeria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">GENDER *</label>
                                                        <select type="text" name="gender" required class="form-control" required>
                                                            <option value="" disabled selected>Select one</option>
                                                            <option value="Male" {{$user->gender == 'Male' ? 'selected' : ''}} >Male</option>
                                                            <option value="Female" {{$user->gender == 'Female' ? 'selected' : ''}} >Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">PROFILE IMAGE </label>
                                                        <input type="file" class="form-control" name="avatar">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">ADDRESS *</label>
                                                        <textarea rows="3" class="form-control" placeholder="" name="address"  required  autocomplete="address" autofocus>{!! $user->address !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <button class="btn btn-success col-12 mt-3">SAVE</button>
                                                </div>
                                            </div>
                                        </form>
                                     </div>
                                    <div id="password" class="tab-pane">
                                    <form action="{{ route('student.profile.password_reset')}}" method="post">@csrf
                                           <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">CURRENT PASSWORD *</label>
                                                        <input name="oldpassword" class="form-control" placeholder="Your current password" type="text"  required autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">NEW PASSWORD *</label>
                                                        <input name="password" class="form-control" placeholder="Enter new password" type="text"  required autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="font-weight-700">CONFIRM PASSWORD *</label>
                                                        <input name="password_confirmation" class="form-control" placeholder="Confirm new password" type="text"  required autofocus>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <button class="btn btn-success col-12 mt-4">SAVE</button>
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
    </div>
    <!-- Teachers Profile End -->
</div>
<!-- Content END-->

@endsection
