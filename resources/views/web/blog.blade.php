@extends('web.layouts.app' , ['title' => 'Our Blog'  , 'activePage' => 'blog' , 'meta_keywords' => 'Our Blog' , 'meta_description' => 'Blog posts here'])
@section('content')
<!-- Content -->
<div class="page-content bg-gray">
    <!-- inner page banner -->
    <div class="dlab-bnr-inr overlay-black-middle bg-pt" style="background-image:url(images/banner/bnr1.jpg);">
        <div class="container">
            <div class="dlab-bnr-inr-entry">
                @if(!empty($search_keywords))
                    <h1 class="text-white">Search result for "{{ $search_keywords }}"</h1>
                @elseif(!empty($category_id))
                    <h1 class="text-white">Blog posts for "{{ $category_id->title }}"</h1>
                @else
                    <h1 class="text-white">Our Blog Posts</h1>
                @endif
                <!-- Breadcrumb row -->
                <div class="breadcrumb-row">
                    <ul class="list-inline">
                        <li><a href="{{ route('homepage')}} ">Home</a></li>
                        <li>Our Blog</li>
                    </ul>
                </div>
                <!-- Breadcrumb row END -->
            </div>
        </div>
    </div>
    <!-- inner page banner END -->
    <!-- contact area -->
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-xl-9 col-lg-8">
                    @if($posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="blog-post blog-md clearfix shadow bg-white">
                                <div class="dlab-post-media dlab-img-effect zoom-slow">
                                <a href="{{ route('our_blog.blog_post_info' , ['id' => $post->id , 'slug' => $post->slug]) }}"><img src="{{ getFileFromStorage($post->image) }}" alt="" class="img-responsive"></a>
                                </div>
                                <div class="dlab-post-info">
                                    <div class="dlab-post-meta">
                                        <ul>
                                            <li class="post-author"> <i class="la la-user-circle"></i> By <a href="javascript:void(0);">{{ $post->author->fullName() ?? '' }}</a> </li>
                                            <li class="post-tag"> <a href="javascript:void(0);">{{ strtoupper($post->category->title ?? '')}}</a> </li>
                                        </ul>
                                    </div>
                                    <div class="dlab-post-title ">
                                        <h4 class="post-title"><a href="{{ route('our_blog.blog_post_info' , ['id' => $post->id , 'slug' => $post->slug]) }}">{{ $post->title ?? '' }}</a></h4>
                                    </div>
                                    <div class="dlab-post-text">
                                        <p>
                                            {{-- {!! $post->body ?? '' !!} --}}
                                            {{ $post->title ?? '' }}
                                        </p>
                                    </div>
                                    <div class="post-footer">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i>  <span> {{ date('d M Y',strtotime($post->created_at)) }}</span> </li>
                                            </ul>
                                        </div>
                                        <ul class="dlab-social-icon dez-border">
                                            <li><a class="site-button facebook circle-sm fa fa-facebook" href="javascript:void(0);"></a></li>
                                            <li><a class="site-button twitter circle-sm fa fa-twitter " href="javascript:void(0);"></a></li>
                                            <li><a class="site-button linkedin circle-sm fa fa-linkedin " href="javascript:void(0);"></a></li>
                                            <li><a class="site-button instagram  circle-sm fa fa-instagram  " href="javascript:void(0);"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                    <div class="container">
                        <div class="text-center mt-5">
                            No blog posts at the moment!
                        </div>
                    </div>
                    @endif


                    <!-- Pagination start -->
                    <div class="pagination-bx rounded-sm primary clearfix m-b30 text-center">
                        <ul class="pagination">
                            {!! $posts->links() !!}
                        </ul>
                    </div>
                    <!-- Pagination END -->
                </div>
                <!-- Left part END -->
                <!-- Side bar start -->
                <div class="col-xl-3 col-lg-4">
                    <aside class="side-bar sticky-top">
                        <div class="widget">
                            <h5 class="widget-title style-1">Search</h5>
                            <div class="search-bx style-1">
                            <form role="search" method="get" action="{{ route('our_blog.blog_search')}}">
                                    <div class="input-group">
                                        <input name="keywords" class="form-control" value="{{ $search_keywords ?? '' }}" placeholder="Enter your keywords..." type="text">
                                        <span class="input-group-btn">
                                            <button type="submit" class="fa fa-search site-button sharp radius-no"></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @if($featured_posts->count() > 0)
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Featured Posts</h5>
                            <div class="widget-post-bx">
                                @foreach($featured_posts as $posts)
                                <div class="widget-post clearfix">
                                    <div class="dlab-post-media">
                                        <img src="{{ getFileFromStorage($post->image) }}" width="200" height="143" alt="">
                                    </div>
                                    <div class="dlab-post-info">
                                        <div class="dlab-post-meta">
                                            <ul>
                                                <li class="post-date"> <i class="la la-clock"></i> <span> {{ date('d M Y',strtotime($post->created_at)) }}</span> </li>
                                            </ul>
                                        </div>
                                        <div class="dlab-post-header">
                                            <h6 class="post-title">
                                            <a href="{{ route('our_blog.blog_post_info' , ['id' => $post->id , 'slug' => $post->slug]) }}">
                                                    {{ str_limit($post->title) }}
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
                                    <li><a href="{{ route('our_blog.blog_category_posts' , ['id' => $category->id , 'slug' => $category->slug]) }}">{{ str_limit($category->title) }}</a></li>
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
