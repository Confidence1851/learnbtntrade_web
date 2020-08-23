@extends('web.layouts.app' , ['title' => 'List of courses'   , 'activePage' => 'course' , 'meta_keywords' => '' , 'meta_description' => '' ])
@section('content')

<!-- Content -->
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr4.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                @if(!empty($search_keywords))
                    <h1 class="text-white">{{ $courses->count() }} Search result(s) for "{{ $search_keywords }}"</h1>
                @elseif(!empty($category_id))
                    <h1 class="text-white">Course(s) for "{{ $category_id->title }}"</h1>
                @else
                    <h1 class="text-white">Courses</h1>
                @endif
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>Courses</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <div class="content-area">
        <div class="container">
            <div class="row">

                <!-- left part start -->
                <div class="col-lg-9 col-md-7">
                    @if($courses->count() > 0)
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-md-4">
                                   @include('web.fragments.course_item')
                                </div>
                            @endforeach
                        </div>
                         <!-- Pagination start -->
                         <div class="pagination-bx rounded-sm primary clearfix m-b30 text-center">
                            <ul class="pagination">
                                {!! $courses->links() !!}
                            </ul>
                        </div>
                        <!-- Pagination END -->
                    @else
                        <div class="container">
                            <div class="text-center mt-5">
                                @if(!empty($search_keywords))
                                    No course matches your search
                                @else
                                    No course found at the moment
                                @endif
                            </div>
                        </div>
                        @endif
                </div>
                <!-- left part start -->
                 <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4 d-none d-md-block">
                    <aside class="side-bar sticky-top">
                        <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                            <form role="search" method="get" action="{{ route('our_courses.course_search')}}">
                                    <div class="input-group">
                                        <input name="keywords" class="form-control" value="{{ $search_keywords ?? '' }}" placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fa fa-search site-button sharp radius-no"></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if($featured_courses->count() > 0)
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Featured Courses</h5>
                            <div class="widget-post-bx">
                                @foreach($featured_courses as $course)
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
