@extends('web.layouts.app' , ['title' => $course->title   , 'activePage' => 'courses' , 'meta_keywords' => $course->meta_keywords , 'meta_description' => $course->meta_description ])
@section('content')
@php
    $courseRatings = getCourseRatingStats($course->id);
@endphp
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
                                <i class="fa fa-star"></i> <span>(<span class="review_avg">{{$courseRatings['avg']}}</span>)</span>
                                <div class="course-info-dec">Reviews (<span class="review_count">{{$courseRatings['count']}}</span>)</div>
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
                                            <span class="title-head">Review </span> <span class="text-primary ">(<span class="review_count">{{$courseRatings['count']}}</span>)</span>
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
                                                    <a href="{{ route('my_courses.take_course' , ['id' => $section->id , 'slug' => $section->slug ]) }}">
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
                                    <div id="review" class="tab-pane comments-area">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-5 m-b30">
                                                <h5>Average Rating</h5>
                                                <div class="icon-bx-wraper bx-style-1 center rating-average">
                                                    <h2 class="rating-title text-primary"><span class="review_avg">{{$courseRatings['avg']}}</span></h2>
                                                    <div class="icon-content">
                                                        <div class="star-rating">
                                                            <div class="user_review_stars avg_data_rating" data-rating="{{$courseRatings['avg']}}">
                                                                <i class="text-yellow fa fa-star-o" data-alt="1" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="2" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="3" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="4" title="regular"></i>
                                                                <i class="text-yellow fa fa-star-o" data-alt="5" title="regular"></i>
                                                            </div>
                                                        </div>
                                                        <p><span class="review_count">{{$courseRatings['count']}}</span> ratings</p>
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
                                                                <div class="bar-rat bg-primary star5percent" style="width:{{$courseRatings['stars']['five']['percent']}}%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group star5count">{{$courseRatings['stars']['five']['count']}}</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">4 stars</span>
                                                            </div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary star4percent" style="width:{{$courseRatings['stars']['four']['percent']}}%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group star4count">{{$courseRatings['stars']['four']['count']}}</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">3 stars</span>
                                                            </div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary star3percent" style="width:{{$courseRatings['stars']['three']['percent']}}%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group star3count">{{$courseRatings['stars']['three']['count']}}</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">2 stars</span>
                                                            </div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary star2percent" style="width:{{$courseRatings['stars']['two']['percent']}}%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group star2count">{{$courseRatings['stars']['two']['count']}}</span>
                                                            </div>
                                                        </li>
                                                        <li class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group">1 star </span>
                                                            </div>
                                                            <div class="bar">
                                                                <div class="bar-rat bg-primary star1percent" style="width:{{$courseRatings['stars']['one']['percent']}}%"></div>
                                                            </div>
                                                            <div class="input-group-prepend">
                                                                <span class="input-group star1count">{{$courseRatings['stars']['one']['count']}}</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="comments">
                                            <ol class="commentlist">
                                                @foreach ($course->activeReviews as $review)
                                                    <li class="comment">
                                                        <div class="comment_container">
                                                            <img class="avatar avatar-60 photo" src="{{ $review->user->getAvatar() }}" alt="">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <div class="user_review_stars"  data-rating="{{$review->stars}}">
                                                                        <i class="fa fa-star-o text-yellow" data-alt="1" title="regular"></i>
                                                                        <i class="fa fa-star-o text-yellow" data-alt="2" title="regular"></i>
                                                                        <i class="fa fa-star-o text-yellow" data-alt="3" title="regular"></i>
                                                                        <i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i>
                                                                        <i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i>
                                                                    </div>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong class="author">{{ $review->user->fullName() }}</strong>
                                                                    <span><i class="fa fa-clock-o"></i>{{ date('jS F Y', strtotime($review->created_at)) }}</span>
                                                                </p>
                                                                <div class="description">
                                                                    <p>{!! $review->comment !!}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </div>
                                        <div class="comment-respond" id="respond">
                                            @auth
                                                @if(!in_array($course->id , getMyCourses()->toArray()))
                                                    <div class="section-head text-center">
                                                        <h5 class="">ORDER THIS COURSE TO LEAVE A REVIEW</h5>
                                                    </div>
                                                @else
                                                    @if(!hasReviewedCourse($course->id , auth('web')->id()))
                                                        <div id="review_area">
                                                            <div class="section-head">
                                                                <h5 class="widget-title style-1">LEAVE A REVIEW</h5>
                                                            </div>
                                                            <form class="comment-form review_form" id="review_form" method="post" action="{{ route('our_courses.review_course')}}"> @csrf
                                                                <div class="user_rating ">
                                                                    <i class="text-yellow fa fa-star-o" data-alt="1" title="regular"></i>
                                                                    <i class="text-yellow fa fa-star-o" data-alt="2" title="regular"></i>
                                                                    <i class="text-yellow fa fa-star-o" data-alt="3" title="regular"></i>
                                                                    <i class="text-yellow fa fa-star-o" data-alt="4" title="regular"></i>
                                                                    <i class="text-yellow fa fa-star-o" data-alt="5" title="regular"></i>
                                                                </div>
                                                                <input type="hidden" name="stars" id="stars" required value="">
                                                                <input type="hidden" name="course_id" required value="{{ $course->id }}">
                                                                <p class="comment-form-comment">
                                                                    <label for="comment">Comment</label>
                                                                    <textarea rows="8" name="comment" placeholder="Describe your experience" id="comment_field"></textarea>
                                                                </p>
                                                                <p class="form-submit">
                                                                    <input type="submit" value="Post Review" class="site-button" id="submit">
                                                                </p>
                                                            </form>
                                                        </div>
                                                    @endif
                                                @endif
                                            @else
                                                <div class="section-head text-center">
                                                    <h5 class="">LOGIN TO LEAVE A REVIEW</h5>
                                                </div>
                                            @endauth
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
                                    @foreach($related_courses as $relatedCourse)
                                        @include('web.fragments.related_courses_item' , ['relatedCourse' => $relatedCourse])
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
{{-- Templates --}}
<li class="comment d-none" id="template">
    <div class="comment_container">
        <img class="avatar avatar-60 photo" src="" alt="">
        <div class="comment-text">
            <div class="star-rating">
                <div class="user_review_stars"  data-rating="">
                    <i class="fa fa-star-o text-yellow" data-alt="1" title="regular"></i>
                    <i class="fa fa-star-o text-yellow" data-alt="2" title="regular"></i>
                    <i class="fa fa-star-o text-yellow" data-alt="3" title="regular"></i>
                    <i class="fa fa-star-o text-yellow" data-alt="4" title="regular"></i>
                    <i class="fa fa-star-o text-yellow" data-alt="5" title="regular"></i>
                </div>
            </div>
            <p class="meta">
                <strong class="author"></strong>
                <span class="time"><i class="fa fa-clock-o"></i> </span>
            </p>
            <div class="description">
                <p class="comment_section"></p>
            </div>
        </div>
    </div>
</li>
@endsection
