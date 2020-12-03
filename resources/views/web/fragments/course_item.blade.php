<a href="{{ route('our_courses.course_info' , ['id' => $course->id , 'slug' => $course->slug]) }}">
    <div class="dlab-box courses-bx">
        <div class="dlab-media">
        <img src="{{ getFileFromStorage($course->image , 'storage') }}" alt="">
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
            <h6 class="dlab-title">
                <a href="{{ route('my_courses.go_to_course' , ['id' => $course->id , 'slug' => $course->slug]) }}" title="{{ $course->title }}" class="textLimit">
                    {{ $course->title }}
                </a>
            </h6>
            <p class="textLimit threeLines">{!! str_limit( $course->description, 250) !!}.</p>
            <div class="courses-info">
                <ul>
                    @if (auth('web')->check())
                        @if(!in_array($course->id , getMyCourses()->toArray()))
                            <li>
                                @if(!empty($item = cartHasCourse($course->id)))
                                    <form action="{{ route('cart.remove') }}" method="post" item_id="{{$course->id}}" class="cart_ajax_form cart_form_{{$course->id}}"> @csrf
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                        <input type="hidden" class="course_cart_input_{{$course->id}}" name="course_cart_id" value="{{$item->id}}">
                                        <button type="submit" class="course_enroll_btn btn cart_btn_{{$course->id}}" title="Remove from car">
                                            <span class="spinner-border text-light spinner cart_btn_spinner_{{$course->id}} d-none"></span>
                                            <span class="cart_btn_text_{{$course->id}}">Remove from cart</span>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('cart.add') }}" method="post" item_id="{{$course->id}}" class="cart_ajax_form"> @csrf
                                        <input type="hidden" name="course_id" value="{{$course->id}}">
                                        <input type="hidden" class="course_cart_input_{{$course->id}}" name="course_cart_id" value="">
                                        <button type="submit" class="course_enroll_btn btn cart_btn_{{$course->id}}" title="Add To Cart">
                                            <span class="spinner-border text-light spinner cart_btn_spinner_{{$course->id}} d-none"></span>
                                            <span class="cart_btn_text_{{$course->id}}">Add to cart</span>
                                        </button>
                                    </form>
                                @endif
                            </li>
                            @else
                                <li>
                                    <a href="{{ route('my_courses.go_to_course' , ['id' => $course->id , 'slug' => $course->slug]) }}">
                                        <button class="course_enroll_btn btn"  title="Go to Course">Go to Course</button>
                                    </a>
                                </li>
                            @endif
                    @else
                        <li>
                            <a href="{{ route('our_courses.course_info' , ['id' => $course->id , 'slug' => $course->slug]) }}">
                                <button class="course_enroll_btn btn"  title="View Course Details">View Course</button>
                            </a>
                        </li>
                    @endif
                </ul>
                <span class="price">{{ $course->getPrice() }}</span>
            </div>
        </div>
    </div>
</a>
