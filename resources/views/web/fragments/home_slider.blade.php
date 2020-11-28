<div id="carouselExampleInterval" class="carousel slide" data-ride="carousel" >
    <div class="carousel-inner">
      <div class="carousel-item active" data-interval="10000">
        <div class="slider_object" style="background-image: url({{ $web_source }}/images/main-slider/slider1_.jpg)">
            <div class="slider_btn_area">
                <a href="{{ route('about_us') }}" class="btn btn-primary slider_btn">About Us</a>
            </div>
        </div>
      </div>
      <div class="carousel-item " data-interval="10000">
        <div class="slider_object" style="background-image: url({{ $web_source }}/images/main-slider/slider1.jpeg)">
            <div class="slider_btn_area">
                <a href="{{ route('about_us') }}" class="btn btn-primary slider_btn">About Us</a>
            </div>
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <div class="slider_object" style="background-image: url({{ $web_source }}/images/main-slider/slider2.jpeg)">
            {{-- <div class="slider_btn_area">
                <a href="{{ route('about_us') }}" class="btn btn-primary slider_btn">About Us</a>
            </div> --}}
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <div class="slider_object" style="background-image: url({{ $web_source }}/images/main-slider/slider2_.jpeg)">
            {{-- <div class="slider_btn_area">
                <a href="{{ route('about_us') }}" class="btn btn-primary slider_btn">About Us</a>
            </div> --}}
        </div>
      </div>
      <div class="carousel-item" data-interval="10000">
        <div class="slider_object"  style="background-image: url({{ $web_source }}/images/main-slider/slider3.jpeg)">
            <div class="slider_btn_area">
                <a href="{{ route('about_us') }}" class="btn btn-primary slider_btn">About Us</a>
            </div>
        </div>
      </div>
     
    </div>
    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
