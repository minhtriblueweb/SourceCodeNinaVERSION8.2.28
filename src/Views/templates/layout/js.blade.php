<script type="text/javascript">
    var NN_FRAMEWORK = NN_FRAMEWORK || {};
    var ASSET = '{{ assets('assets/') }}';
    var BASE = '{{ assets() }}';
    var CSRF_TOKEN = '{{ url('token') }}';
    var WEBSITE_NAME = '{{ !empty($setting['name' . $lang]) ? addslashes($setting['name' . $lang]) : '' }}';
    var RECAPTCHA_ACTIVE = {{ !empty(config('app.recaptcha.active')) ? 'true' : 'false' }};
    var RECAPTCHA_SITEKEY = '{{ config('app.recaptcha.sitekey') }}';
    var GOTOP = ASSET + 'images/top.png';
    var CART_URL = {
        'ADD_CART': '{{ url('cart', ['action' => 'add-to-cart']) }}',
        'UPDATE_CART': '{{ url('cart', ['action' => 'update-cart']) }}',
        'DELETE_CART': '{{ url('cart', ['action' => 'delete-cart']) }}',
        'DELETE_ALL_CART': '{{ url('cart', ['action' => 'delete-all-cart']) }}',
        'PAGE_CART': '{{ url('giohang') }}',
    };


    var LANG = {
        'no_keywords': '{{ __('web.chuanhaptukhoatimkiem') }}',
        'delete_product_from_cart': '{{ __('web.banmuonxoasanphamnay') }}',
        'no_products_in_cart': '{{ __('web.khongtontaisanphamtronggiohang') }}',
        'ward': '{{ __('web.phuongxa') }}',
        'back_to_home': '{{ __('web.vetrangchu') }}',
        'thongbao': '{{ __('web.thongbao') }}',
        'dongy': '{{ __('web.dongy') }}',
        'huy': '{{ __('web.huy') }}',
        'dungluonghinhanhlon': '{{ __('web.dungluonghinhanhlon') }}',
        'dulieukhonghople': '{{ __('web.dulieukhonghople') }}',
        'banchiduocchon1hinhanhdeuplen': '{{ __('web.banchiduocchon1hinhanhdeuplen') }}',
        'dinhdanghinhanhkhonghople': '{{ __('web.dinhdanghinhanhkhonghople') }}',
        'mabaovechuasansangvuilongthulai': '{{ __('web.mabaovechuasansangvuilongthulai') }}'
    };
</script>

@php
    jsminify()->set('js/jquery.min.js');
    jsminify()->set('bootstrap/bootstrap.js');
    jsminify()->set('js/lazyload.min.js');
    jsminify()->set('owlcarousel2/owl.carousel.js');
    jsminify()->set('holdon/HoldOn.js');
    jsminify()->set('confirm/confirm.js');
    jsminify()->set('simplenotify/simple-notify.js');
    jsminify()->set('fancybox5/fancybox.umd.js');
    jsminify()->set('fotorama/fotorama.js');
    jsminify()->set('admin/toastify/toastify.js');

    jsminify()->set('peShiner/jquery.pixelentity.shiner.min.js');

    jsminify()->set('mmenu/mmenu.js');
    jsminify()->set('aos/aos.js');
    jsminify()->set('slick/slick.js');
    jsminify()->set('slick/slick.js');
    jsminify()->set('js/functions.js');
    jsminify()->set('js/cart.js');
    jsminify()->set('js/apps.js');
    echo jsminify()->get();
@endphp
@stack('scripts')
<script src="@asset('assets/js/alpinejs.js')" defer></script>
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.async = true;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
@if (!empty(config('app.recaptcha.active')))
    <script src="https://www.google.com/recaptcha/api.js?render={{ config('app.recaptcha.sitekey') }}"></script>
@endif
{!! Func::decodeHtmlChars($setting['bodyjs']) !!}


<script>
    AOS.init({
        once: true,
    });
</script>

<script>
    $(function() {
        var Accordion = function(el, multiple) {
            this.el = el || {};
            this.multiple = multiple || false;

            // Variables privadas
            var links = this.el.find('.link');
            // Evento
            links.on('click', {
                el: this.el,
                multiple: this.multiple
            }, this.dropdown)
        }

        Accordion.prototype.dropdown = function(e) {
            var $el = e.data.el;
            $this = $(this),
                $next = $this.next();

            $next.slideToggle();
            $this.parent().toggleClass('open');

            if (!e.data.multiple) {
                $el.find('.submenu').not($next).slideUp().parent().removeClass('open');
            };
        }

        var accordion = new Accordion($('#accordion'), false);
    });
</script>
