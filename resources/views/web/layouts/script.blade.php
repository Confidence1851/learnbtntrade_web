
<script src="{{ $web_source }}/js/jquery.min.js"></script><!-- JQUERY.MIN JS -->
<script src="{{ $web_source }}/plugins/wow/wow.js"></script><!-- WOW JS -->
<script src="{{ $web_source }}/plugins/bootstrap/js/popper.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ $web_source }}/plugins/bootstrap/js/bootstrap.min.js"></script><!-- BOOTSTRAP.MIN JS -->
<script src="{{ $web_source }}/plugins/bootstrap-select/bootstrap-select.min.js"></script><!-- FORM JS -->
<script src="{{ $web_source }}/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script><!-- FORM JS -->
<script src="{{ $web_source }}/plugins/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="{{ $web_source }}/plugins/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="{{ $web_source }}/plugins/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<script src="{{ $web_source }}/plugins/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED -->
<script src="{{ $web_source }}/plugins/masonry/masonry-3.1.4.js"></script><!-- MASONRY -->
<script src="{{ $web_source }}/plugins/masonry/masonry.filter.js"></script><!-- MASONRY -->
<script src="{{ $web_source }}/plugins/owl-carousel/owl.carousel.js"></script><!-- OWL SLIDER -->
<script src="{{ $web_source }}/plugins/lightgallery/js/lightgallery-all.min.js"></script><!-- Lightgallery -->
<script src="{{ $web_source }}/js/custom.js"></script><!-- CUSTOM FUCTIONS  -->
<script src="{{ $web_source }}/js/dz.carousel.min.js"></script><!-- SORTCODE FUCTIONS  -->
<script src="{{ $web_source }}/plugins/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="{{ $web_source }}/js/dz.ajax.js"></script><!-- CONTACT JS  -->
<script src="{{ $web_source }}/plugins/rangeslider/rangeslider.js" ></script><!-- Rangeslider -->
<script src="{{ $web_source }}/js/jquery.lazy.min.js"></script>
<!-- REVOLUTION JS FILES -->
<script src="{{ $web_source }}/plugins/revolution/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/jquery.themepunch.revolution.min.js"></script>
<!-- Slider revolution 5.0 Extensions  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{ $web_source }}/plugins/revolution/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{ $web_source }}/js/rev.slider.js"></script>
<script src="{{ $web_source }}/js/ajax.js"></script>
<script>
jQuery(document).ready(function() {
	'use strict';
	dz_rev_slider_4();
	$('.lazy').Lazy();
});	/*ready*/
</script>
<!-- Tost-->
<script src="{{asset('toast')}}/jquery.toast.min.js"></script>

<!-- toastr init js-->
{{-- <script src="{{url('admin')}}/assets/js/pages/toastr.init.js"></script> --}}
<script>
	! function(p) {
		"use strict";
		var notifier;

		function t() {}
		t.prototype.send = function(t, i, o, e, n, a, s, r) {
				var c = {
					heading: t,
					text: i,
					position: o,
					loaderBg: e,
					icon: n,
					hideAfter: a = a || 3e3,
					stack: s = s || 1
				};
				r && (c.showHideTransition = r),
					// console.log(c),
					p.toast().reset("all"),
					p.toast(c)
			},
			p.NotificationApp = new t,
			p.NotificationApp.Constructor = t
	}(window.jQuery),
	function(i) {
		notifier = i;
		"use strict";
	}(window.jQuery);

	function successMsg(title, msg) {
		notifier.NotificationApp.send(title, msg, "top-right", "#5ba035", "success")
	}

	function errorMsg(title, msg) {
		notifier.NotificationApp.send(title, msg, "top-right", "#bf441d", "error")
	}
</script>
<script>

    $('body').on('click',function(e){
        console.log(e);
        var target = $(e.target);
        if(target.hasClass('toggleFloatingMenu')){
            $('#floating_menu').toggleClass('d-none');
        }
        else{
            if(!$('#floating_menu').hasClass('d-none')){
                $('#floating_menu').addClass('d-none');
            }
        }

    })

</script>
<script src="https://public.bnbstatic.com/static/js/ocbs/binance-fiat-widget.js"></script>
<script>
    window.onload = function () {
        var t = document.querySelector('#crypto_widget')
        window.binanceFiatWidget.Widget(t, {
            locale: 'en',
            coinInfo: {
                fiat: '',
                crypto: '',
                isInUS: false
            },
            urlParmas: {
                us_ref: 'your us refId',
                ref: '37572124'
            }
        })
    }
</script>
