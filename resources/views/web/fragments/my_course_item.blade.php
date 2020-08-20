<a href="{{ route('our_courses.course_info' , ['id' => $course->id , 'slug' => $course->slug]) }}">
    <div class="dlab-box courses-bx">
        <div class="dlab-media">
        <img src="{{ getFileFromStorage($course->image) }}" alt="">
            <div class="user-info">
                <img src="{{ $course->author->getAvatar() }}" alt="">
                <h6 class="title">{{ $course->author->fullName() }}</h6>
                <div class="review">
                    <ul class="item-review">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <span>{{ $course->countReviews() }}</span>
                </div>
            </div>
        </div>
        <div class="dlab-info">
            <h6 class="dlab-title"><a href="courses-details.html">{{ str_limit($course->title) }}</a></h6>
            <p>{!! str_limit($course->description) !!}.</p>
            <div class="courses-info">
                <ul>
                        <li>
                            <a href="{{ route('my_courses.go_to_course' ,['id' => $course->id , 'slug' => $course->slug]) }}">
                                <button class="course_enroll_btn btn"  title="Go to Course">Go to Course</button>
                            </a>
                        </li>
                </ul>
                <span class="price">{{ $course->getPrice() }}</span>
            </div>
        </div>
    </div>
</a>
