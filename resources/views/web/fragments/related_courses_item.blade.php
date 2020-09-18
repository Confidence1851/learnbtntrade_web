<div class="widget-post clearfix">
    <div class="dlab-post-media">
        <img src="{{ getFileFromStorage($relatedCourse->image , 'storage') }}" width="200" height="143" alt="">
    </div>
    <div class="dlab-post-info">
        <div class="dlab-post-meta">
            <ul>
                <li class="post-date"> <i class="la la-clock"></i> <span> {{ date('d M Y',strtotime($relatedCourse->created_at)) }}</span> </li>
            </ul>
        </div>
        <div class="dlab-post-header">
            <h6 class="post-title">
            <a href="{{ route('our_courses.course_info' , ['id' => $relatedCourse->id , 'slug' => $relatedCourse->slug]) }}">
                    {{ str_limit($relatedCourse->title) }}
                </a>
            </h6>
        </div>
    </div>
</div>
