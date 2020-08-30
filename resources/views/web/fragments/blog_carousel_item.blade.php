<div class="item">
    <div class="blog-post blog-grid blog-rounded blog-effect1 post-style-1">
        <div class="dlab-post-media dlab-img-effect">
            <a href="{{ route('our_blog.blog_post_info' , ['id' => $post->id , 'slug' => $post->slug]) }}">
                <img src="{{ getFileFromStorage($post->image , 'storage') }}" alt="" class="img-responsive">
            </a>
        </div>
        <div class="dlab-info p-a20">
            <div class="dlab-post-meta">
                <ul>
                    <li class="post-author"> <i class="la la-user-circle"></i>
                        By <a href="javascript:void(0);">{{ str_limit($post->author->fullName() ?? '') }}</a>
                    </li>
                    <li class="post-tag"> <a title="{{$post->category->title ?? ''}}" href="javascript:void(0);">{{ str_limit(strtoupper($post->category->title ?? '')) }}</a> </li>
                </ul>
            </div>
            <div class="dlab-post-title">
                <h4 class="post-title">
                    <a title="{{$post->title ?? ''}}" href="{{ route('our_blog.blog_post_info' , ['id' => $post->id , 'slug' => $post->slug]) }}">{{ str_limit($post->title ?? '', 30) }}</a>
                </h4>
            </div>
            <div class="dlab-post-text">
                <p class="limit_content" limit="20">
                    {!! str_limit(strip_tags($post->body ?? '') , 160) !!}
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
                    <li><a class="site-button instagram circle-sm fa fa-instagram  " href="javascript:void(0);"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
