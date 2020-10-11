<!-- Footer -->
<footer class="site-footer text-uppercase">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="widget widget_services border-0">
              <h5 class="m-b30 text-white">Useful Links</h5>
              <ul>
                <li><a href="{{ route('homepage')}}">Home </a></li>
                <li><a href="{{ route('contact_us')}}">Contact Us</a></li>
                <li><a href="{{ route('about_us')}}">About Us</a></li>
                <li><a href="{{ route('terms_and_conditions')}}">Terms and Conditions</a></li>
                <li><a href="{{ route('faqs')}}">Frequently Asked Questions</a></li>
                {{-- <li><a href="{{ route('crypto_heaven')}}">Crypto Heaven</a></li> --}}
            </ul>
            </div>
          </div>
          <div class="col-md-5">
            <div class="widget widget_getintuch">
              <h5 class="m-b30 text-white ">Contact us</h5>
              <ul>
                <li><i class="ti-location-pin"></i><strong>Address</strong> No 15 Ikpa Road Uyo , Akwa Ibom State, Nigeria.</li>
                <li><i class="ti-mobile"></i><strong>phone</strong><a href="tel:+2348094110146">+234 809 411 0146 (Support Line)</a></li>
                <li><i class="ti-email"></i><strong>email</strong><a href="mailto:learnbtctrade@gmail.com" style="text-transform: none !important">Learnbtctrade@gmail.com</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget">
              <h5 class="m-b30 text-white">Subscribe To Our Newsletter</h5>
              <p class="text-capitalize m-b20">
                  Stay up to date with our latest offers and courses
              </p>
              <div class="subscribe-form m-b20">
                <form class="subscribe_form" action="{{ route('subscribe_email') }}" method="post">@csrf
                  <div class="dzSubscribeMsg"></div>
                  <div class="input-group">
                    <input name="name" required  class="form-control" placeholder="Enter your name" type="text">
                  </div>
                  <div class="input-group mt-2">
                    <input name="email" required  class="form-control" placeholder="Enter email address" type="email">
                    <span class="input-group-btn">
                      <button name="submit" value="Submit" type="submit" class="site-button">Subscribe</button>
                    </span>
                  </div>
                </form>
              </div>
              <ul class="list-inline m-a0">
                <li><a target="_blank" href="https://www.facebook.com/Learnbtctrade-Academy-103280771417756/" class="site-button facebook circle "><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="https://t.me/Learnbtctradeacademy" class="site-button google-plus circle "><i class="fa fa-telegram"></i></a></li>
                <li><a target="_blank" href="https://www.linkedin.com/in/emmanuel-jackson-a04822189" class="site-button linkedin circle "><i class="fa fa-linkedin"></i></a></li>
                <li><a target="_blank" href="https://www.instagram.com/learnbtctrade?r=nametag" class="site-button instagram circle "><i class="fa fa-instagram"></i></a></li>
                <li><a target="_blank" href="https://twitter.com/LearnbtctradeA?s=09" class="site-button twitter circle "><i class="fa fa-twitter"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- footer bottom part -->
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 text-left "> <span>Copyright © 2020 LearnBtcTrade</span> </div>
          <div class="col-md-6 col-sm-6 text-right ">
            <div class="widget-link ">
              <ul>
                <li><a href="javascript:void(0);">Powered by RootTechnologies</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer END -->
