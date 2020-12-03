@extends('web.layouts.app' , ['title' => $post->title   , 'activePage' => 'blog' , 'meta_keywords' => $post->meta_keywords , 'meta_description' => $post->meta_description ])
@section('content')
<!-- Content -->
<div class="page-content bg-gray">
    <!-- contact area -->
    <div class="content-area">
        <div class="container">
            <div class="row">
                <!-- Left part start -->
                <div class="col-xl-9 col-lg-8">
                    <!-- blog start -->
						<div class="blog-post blog-single sidebar">
							<div class="dlab-info">
								<div class="dlab-post-meta">
									<ul>
										<li class="post-author"> <i class="la la-user-circle"></i> By <a href="javascript:void(0);">{{ $post->author->fullName() ?? '' }}</a> </li>
										<li class="post-date"> <i class="la la-clock"></i> <span> {{ date('d M Y',strtotime($post->created_at)) }}</span> </li>
										<li class="post-tag"> <a href="javascript:void(0);">{{ strtoupper($post->category->title ?? '')}}</a> </li>
									</ul>
								</div>
								<h2 class="dlab-title">{!! $post->title ?? '' !!}</h2>
								<div class="dlab-media">
									<a href="javascript:;"><img src="{{ getFileFromStorage($post->image , 'storage') }}" alt=""></a>
								</div>
								<div class="dlab-post-text text se-wrapper-inner se-wrapper-wysiwyg sun-editor-editable">
                                     {!! $post->body ?? '' !!}
                                </div>
								<div class="post-footer">
                                    <div class="dlab-meta">
										{{-- <span class="title">TAGS : </span> --}}
										<ul class="tag-list">
											{{-- <li class="post-tag"><a href="tags.html">#Lifestyle</a></li> --}}
											{{-- <li class="post-tag"><a href="tags.html">#Blog</a></li> --}}
											{{-- <li class="post-tag"><a href="tags.html">#Instagram</a></li> --}}
											{{-- <li class="post-tag"><a href="tags.html">#Image</a></li> --}}
										</ul>
									</div>
									<div class="share-post">
										<ul class="list-inline m-b0">
											<li><a href="javascript:void(0);" class="site-button sharp radius-xl facebook"><i class="fa fa-facebook"></i></a></li>
											<li><a href="javascript:void(0);" class="site-button sharp radius-xl instagram"><i class="fa fa-instagram"></i></a></li>
											<li><a href="javascript:void(0);" class="site-button sharp radius-xl twitter"><i class="fa fa-twitter"></i></a></li>
											<li><a href="javascript:void(0);" class="site-button sharp radius-xl linkedin"><i class="fa fa-linkedin"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="clear m-b30" id="comment-list">
							<div class="comments-area" id="comments">
								<div class="section-head">
									<h5 class="widget-title style-1">Comments ({{$post->comments->count()}})</h5>
								</div>
								<!-- comment list END -->
								<ol class="comment-list" id="comment_list_body">
                                    @foreach ($post->comments as $comment)
									<li class="comment">
										<div class="comment-body">
											<div class="comment-author vcard">
												<img  class="avatar photo" src="{{ $comment->author->getAvatar() ?? ''}}" alt="">
                                                <cite class="fn">{{ $comment->author->fullName() ?? ''}}</cite>
												<span class="says">says:</span>
												 <div class="comment-meta">{{ date('d M Y h:i:A',strtotime($comment->created_at)) }} </div>
											</div>
											<div class="comment-content">
                                                <p>
                                                    {!! $comment->body !!}
                                                </p>
											</div>
										</div>
										<!-- list END -->
                                    </li>
                                    @endforeach

								</ol>
								<!-- comment list END -->
							</div>
						</div>
						<!-- Form -->
						<div class="comments-area" id="respond">
							<div class="comment-respond" id="respond">
								<div class="section-head">
									<h5 class="widget-title style-1">LEAVE A REPLY</h5>
								</div>
								<h3 class="comment-reply-title" id="reply-title">
									<small> <a style="display:none;" href="javascript:void(0);" id="cancel-comment-reply-link" rel="nofollow">Cancel reply</a> </small>
								</h3>
                                <form class="comment-form" id="commentform" action="{{ route('our_blog.blog_comment')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{$post->id}}" required>
									<p class="comment-form-comment">
										<label for="comment">Comment</label>
										<textarea rows="8" placeholder="Add a Comment" id="comment_text_area" name="body" required></textarea>
									</p>
									<p class="form-submit">
										<input type="submit" value="Post Comment" class="site-button" id="submit">
									</p>
								</form>
							</div>
						</div>
						<!-- blog END -->
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
                        @if($related_posts->count() > 0)
                        <div class="widget recent-posts-entry">
                            <h5 class="widget-title style-1">Featured Posts</h5>
                            <div class="widget-post-bx">
                                @foreach($related_posts as $relatedPost)
                                    @include('web.fragments.related_blog_item' , ['relatedPost' => $relatedPost])
                                @endforeach
                            </div>
                        </div>
                        @endif

                        @if($categories->count() > 0)
                        <div class="widget widget_archive">
                            <h5 class="widget-title style-1">Categories List</h5>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('our_blog.blog_category_posts' , ['id' => $category->id , 'slug' => $category->slug]) }}">
                                        {{ str_limit($category->title) }}</a></li>
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
<li class="comment d-none" id="comment_template">
    <div class="comment-body">
        <div class="comment-author vcard">
            <img  class="avatar photo" id="temp_img" src="" alt="">
            <cite class="fn" id="temp_name"></cite>
            <span class="says">says:</span>
             <div class="comment-meta" id="temp_date"></div>
        </div>
        <div class="comment-content">
            <p id="temp_comment"></p>
        </div>
    </div>
    <!-- list END -->
</li>
@endsection
