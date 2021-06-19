<div class="item">
    <div class="testimonial-15 quote-right">
        <div class="testimonial-text">
            @if (strtolower($testimonial->content_type) == 'text')
                <p>{!! $testimonial->content !!}</p>
            @else
                @php($image = $testimonial->getContentImage())
                    <a href="{{ $image }}" target="_blank">
                        <img src="{{ $image }}" height="100" alt="Avatar" />
                    </a>
                @endif
            </div>
            <div class="testimonial-detail clearfix">
                <div class="testimonial-pic radius"><img src="{{ $testimonial->getAvatar() }}" width="100" height="100"
                        alt=""></div>
                <strong class="testimonial-name">{{ $testimonial->name }}</strong> <span
                    class="testimonial-position">{{ $testimonial->title }}</span>
            </div>
        </div>
    </div>
