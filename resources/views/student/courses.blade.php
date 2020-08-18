@extends('web.layouts.app' , ['title' => 'My courses'   , 'activePage' => 'course' , 'meta_keywords' => '' , 'meta_description' => '' ])
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
                    <h1 class="text-white">My Courses</h1>
                @endif
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>My Courses</li>
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
                <div class="col-12">
                    @if($courses->count() > 0)
                        <div class="row">
                            @foreach ($courses as $course)
                                <div class="col-md-4">
                                   @include('web.fragments.course_item')
                                </div>
                            @endforeach
                        </div>
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
            </div>
        </div>
    </div>
</div>
<!-- Content END-->
@endsection
