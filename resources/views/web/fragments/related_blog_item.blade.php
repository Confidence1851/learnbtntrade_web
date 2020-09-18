<div class="widget-post clearfix">
    <div class="dlab-post-media">
        <img src="{{ getFileFromStorage($relatedPost->image , 'storage') }}" width="200" height="143" alt="">
    </div>
    <div class="dlab-post-info">
        <div class="dlab-post-meta">
            <ul>
                <li class="post-date"> <i class="la la-clock"></i> <span> {{ date('d M Y',strtotime($relatedPost->created_at)) }}</span> </li>
            </ul>
        </div>
        <div class="dlab-post-header">
            <h6 class="post-title">
            <a href="{{ route('our_blog.blog_post_info' , ['id' => $relatedPost->id , 'slug' => $relatedPost->slug]) }}">
                    {{ str_limit($relatedPost->title , 35) }}
                </a>
            </h6>
        </div>
    </div>
</div>
