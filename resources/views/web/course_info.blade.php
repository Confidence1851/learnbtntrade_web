@extends('web.layouts.app' , ['title' => $course->title   , 'activePage' => 'blog' , 'meta_keywords' => $course->meta_keywords , 'meta_description' => $course->meta_description ])
@section('content')
<!-- Content -->
<div class="page-content bg-gray">
    <div class="section-full content-inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 m-b30">
                    <div class="course-view text-center">
                        <h2 class="m-t0 m-b10 font-28 title text-black">{{ $course->title }}</h2>
                        <ul class="course-info">
                            <li>
                            <i class="fa fa-user"></i> <span>{{ $course->orderedCount() }}</span>
                                <div class="course-info-dec">Student(s)</div>
                            </li>
                            <li>
                                <i class="fa fa-star"></i> <span>0.0</span>
                                <div class="course-info-dec">Reviews (0)</div>
                            </li>
                            <li>
                            <i class="fa fa-clock-o"></i> <span> {{ formatTime($course->getDuration())}}</span>
                                <div class="course-info-dec">Duration</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- left part start -->
                <div class="col-xl-9 col-lg-8 col-md-12 m-b30">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="media m-b30">
                                <img src="{{ getFileFromStorage($course->image , 'storage') }}" alt="" style="width: 100%">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <!-- Tabs -->
                            <div class="course-details dlab-tabs border-top bg-tabs">
                                <ul class="nav nav-tabs ">
                                    <li>
                                        <a data-toggle="tab" href="#description" class="active">
                                            <i class="fa fa-bookmark m-r10"></i>
                                            <span class="title-head">Description</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#curriculum">
                                            <i class="fa fa-cube"></i>
                                            <span class="title-head">Curriculum</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#review">
                                            <i class="fa fa-comments"></i>
                                            <span class="title-head">Review </span> <span class="text-primary">(0)</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="description" class="tab-pane active">
                                        <h3 class="m-t0 m-b10">About This Course</h3>
                                        <div class="col-mt-3 mb-4">
                                            {!! $course->description !!}
                                        </div>
                                        <div class="m-t10 d-none">
                                            <h5>Share :</h5>
                                            <ul class="dlab-social-icon">
                                                <li><a href="javascript:void(0);" class="site-button circle fa fa-facebook facebook"></a></li>
                                                <li><a href="javascript:void(0);" class="site-button circle fa fa-twitter twitter"></a></li>
                                                <li><a href="javascript:void(0);" class="site-button circle fa fa-linkedin linkedin"></a></li>
                                                <li><a href="javascript:void(0);" class="site-button circle fa fa-whatsapp whatsapp"></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="curriculum" class="tab-pane">
                                        <h3 class="m-t0 m-b15">Curriculum</h3>
                                        <table class="table" >
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Title</th>
                                                    <th class="text-right">Duration</th>
                                                </tr>
                                            </thead>
                                            @foreach ($course->sections as $section)

                                            <tr>
                                                <td>
                                                    <a href="{{ route('my_courses.take_course' , ['id' => encrypt($section->id) , 'slug' => $section->slug ]) }}">
                                                        <span><i class="fa fa-play m-r10 text-primary"></i>Section {{$section->number}}</span>
                                                    </a>
                                                </td>
                                                <td>{{$section->title}}</td>
                                                <td class="text-right">
                                                    <span><i class="fa fa-clock-o m-r10"></i>{{$section->duration}} Minutes</span>
                                                </td>
                                            </tr>

                                            @endforeach
                                        </table>
                                    </div>
                                    <div id="review" class="tab-pane comments-area ">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 m-b30">
                                                <h5>Average Rating</h5>
                                                <div class="icon-bx-wraper bx-style-1 center rating-average">
                                                    <h2 class="rating-title text-primary">4.5</h2>
                                                    <div class="icon-content">
                                                        <div class="star-rating">
                                                            <div data-rating="3">
                                                                <i class="text-yellow fa fa-star" data-alt="1" title="regular"></i>
                                                                <i class="text-yellow fa fa-star" data-alt="2" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="3" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="4" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="5" title="regular"></i>
                                                            </div>
                                                        </div>
                                                        <p>100,453 ratings</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-sm-7 m-b30">
                                                <h5>Detailed Rating</h5>
                                                <div class="bar-rating">
                                                    <ul class="bar-rating-chart icon-bx-wraper bx-style-1 p-a30">
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">5 stars</span>
                                                            </div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary" style="width:100%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">5</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">4 stars</span></div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary" style="width:80%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">4</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">3 stars</span></div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary" style="width:60%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">3</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">2 stars</span></div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary" style="width:40%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">2</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">1 stars</span></div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary" style="width:20%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">1</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="comments">
                                            <ol class="commentlist">
                                                <li class="comment">
                                                    <div class="comment_container">
                                                        <img class="avatar avatar-60 photo" src="images/testimonials/pic1.jpg" alt="">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <div data-rating="3">
                                                                    <i class="fa fa-star text-yellow" data-alt="1" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="2" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="3" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i>
                                                                </div>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="author">Cobus Bester</strong>
                                                                <span><i class="fa fa-clock-o"></i> March 7, 2013</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment_container">
                                                        <img class="avatar avatar-60 photo" src="images/testimonials/pic2.jpg" alt="">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <div data-rating="3">
                                                                    <i class="fa fa-star text-yellow" data-alt="1" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="2" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="3" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i>
                                                                </div>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="author">Cobus Bester</strong>
                                                                <span><i class="fa fa-clock-o"></i> March 7, 2013</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="comment">
                                                    <div class="comment_container">
                                                        <img class="avatar avatar-60 photo" src="images/testimonials/pic3.jpg" alt="">
                                                        <div class="comment-text">
                                                            <div class="star-rating">
                                                                <div data-rating="3">
                                                                    <i class="fa fa-star text-yellow" data-alt="1" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="2" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="3" title="regular"></i>
                                                                    <i class="fa fa-star text-yellow" data-alt="4" title="regular"></i>
                                                                    <i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i>
                                                                </div>
                                                            </div>
                                                            <p class="meta">
                                                                <strong class="author">Cobus Bester</strong>
                                                                <span><i class="fa fa-clock-o"></i> March 7, 2013</span>
                                                            </p>
                                                            <div class="description">
                                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ol>
                                        </div>
                                        <div class="comment-respond" id="respond">
                                            <div class="section-head">
                                                <h5 class="widget-title style-1">LEAVE A REVIEW</h5>
                                            </div>
                                            <form class="comment-form" id="commentform" method="post">
                                                <div class="user_rating">
                                                    <i class="text-yellow fa fa-star" data-alt="1" title="regular"></i>
                                                    <i class="text-yellow fa fa-star" data-alt="2" title="regular"></i>
                                                    <i class="text-yellow fa fa-star" data-alt="3" title="regular"></i>
                                                    <i class="text-yellow fa fa-star" data-alt="4" title="regular"></i>
                                                    <i class="text-yellow fa fa-star" data-alt="5" title="regular"></i>
                                                </div>
                                                <p class="comment-form-comment">
                                                    <label for="comment">Comment</label>
                                                    <textarea rows="8" placeholder="Add a Comment" id="comment"></textarea>
                                                </p>
                                                <p class="form-submit">
                                                    <input type="submit" value="Post Comment" class="site-button" id="submit">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- left part start -->
                <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4 col-md-12 m-b30 ">
                    <aside class="side-bar sticky-top">
                        <div class="widget">
                            <div class="teacher-info text-center">
                                {{-- <div class="top-info">
                                    <span class="price text-primary">Free</span>
                                    <a href="" class="site-button button-sm">Take This Course</a>
                                </div> --}}
                                <div class="teacher-pic">
                                <a href="#"><img src="{{ $course->author->getAvatar() }}" alt=""></a>
                                </div>
                                <h4 class="name">{{ $course->author->fullName() }}</h4>
                                <span class="position">Course Instructor</span>
                                {{-- <div class="clearfix m-b20">
                                    <a href="" class="site-button button-sm">FOLLOW NOW <i class="fa fa-user-plus m-l5"></i></a>
                                </div>
                                <ul class="social-list">
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-facebook facebook"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-twitter twitter"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-linkedin linkedin"></a></li>
                                    <li><a href="javascript:void(0);" class="site-button circle fa fa-whatsapp whatsapp"></a></li>
                                </ul> --}}
                            </div>
                        </div>
                        @if($related_courses->count() > 0)
                            <div class="widget recent-posts-entry">
                                <h5 class="widget-title style-1">Related Courses</h5>
                                <div class="widget-post-bx">
                                    @foreach($related_courses as $course)
                                    <div class="widget-post clearfix">
                                        <div class="dlab-post-media">
                                            <img src="{{ getFileFromStorage($course->image , 'storage') }}" width="200" height="143" alt="">
                                        </div>
                                        <div class="dlab-post-info">
                                            <div class="dlab-post-meta">
                                                <ul>
                                                    <li class="post-date"> <i class="la la-clock"></i> <span> {{ date('d M Y',strtotime($course->created_at)) }}</span> </li>
                                                </ul>
                                            </div>
                                            <div class="dlab-post-header">
                                                <h6 class="post-title">
                                                <a href="{{ route('our_courses.course_info' , ['id' => $course->id , 'slug' => $course->slug]) }}">
                                                        {{ str_limit($course->title) }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            @if($categories->count() > 0)
                            <div class="widget widget_archive">
                                <h5 class="widget-title style-1">Categories List</h5>
                                <ul>
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('our_courses.category_courses' , ['id' => $category->id , 'slug' => $category->slug]) }}">{{ str_limit($category->title) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                    </aside>
                </div>
                <!-- Side bar END -->
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@endsection
