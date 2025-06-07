@extends('layout')
@section('content')
    @if (!empty($about))
        <div class="wrap-about padding-top-bottom">
            <div class="wrap-content">
                <div class="about__layout">
                    <div class="about__start">
                        <div class="title-about" data-aos="fade-up" data-aos-duration="1000">
                            <p class="slogan-about">{{ __('web.gioithieu') }}</p>
                            <p class="name-about">{{ $about->descvi }}</p>
                            <h2 class="heading-about">{{ $about->namevi }}</h2>
                        </div>
                        <div class="content-main w-clear" data-aos="fade-up" data-aos-duration="1000">
                            {!! Func::decodeHtmlChars($about->contentvi) !!}</div>
                        <div class="row-gioithieu">
                            @foreach ($gioithieuHot as $v)
                                <div class="col-gioithieu" data-aos="fade-up" data-aos-duration="1000">
                                    <a href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                        class="item-gioithieu text-decoration-none transition" title="{{ $v['namevi'] }}">
                                        <span class="text-split"><img src="assets/images/i-check.png" alt="icon">
                                            {{ $v['namevi'] }}</span>
                                    </a>
                                </div>
                            @endforeach
                            <div class="col-gioithieu" data-aos="fade-up" data-aos-duration="1000">
                                <a href="he-thong-phan-phoi" class="item-gioithieu text-decoration-none transition"
                                    title="{{ __('web.hethongphanphoi') }}">
                                    <span class="text-split"><img src="assets/images/i-check.png" alt="icon">
                                        {{ __('web.hethongphanphoi') }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="gt_xemthem">
                            <a href="gioi-thieu" class="text-decoration-none"
                                title="{{ __('web.xemthem') }}">{{ __('web.xemthem') }}</a>
                        </div>
                    </div>
                    <div class="about__end">
                        <div data-aos="fade-up" data-aos-duration="1000">
                            <div class="owl-page owl-carousel owl-theme" data-items="screen:0|items:1" data-rewind="1"
                                data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1" data-touchdrag="1"
                                data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000" data-dots="0"
                                data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                                data-nav="0" data-navcontainer=".control-about">
                                <a class="text-decoration-none scale-img hover-img radius-about" href="gioi-thieu"
                                    title="{{ $setting->namevi }}">
                                    <img class="w-100"
                                        onerror="this.src='{{ thumbs('thumbs/640x550x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('news', '640x550x1', $about['photo'], 'thumbs') }}"
                                        alt="{{ $setting->namevi }}">
                                </a>
                                @foreach ($albumAbout as $v)
                                    <div>
                                        <a class="text-decoration-none scale-img hover-img radius-about" href="gioi-thieu"
                                            title="{{ $setting->namevi }}">
                                            <img class="w-100"
                                                onerror="this.src='{{ thumbs('thumbs/640x550x1/assets/images/noimage.png') }}';"
                                                src="{{ assets_photo('news', '640x550x1', $v['photo'], 'thumbs') }}"
                                                alt="{{ $setting->namevi }}">
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <div class="control-about control-owl transition"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($thanhTuu->isNotEmpty())
        <div class="wrap-thanhtuu" data-aos="fade-up" data-aos-duration="1000">
            <div class="max-width">
                <div class="position-relative">
                    <div class="owl-page owl-carousel owl-theme"
                        data-items="screen:0|items:2|margin:10,screen:425|items:2|margin:10,screen:575|items:3|margin:10,screen:767|items:4|margin:10,screen:991|items:5|margin:10,screen:1199|items:6|margin:10"
                        data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                        data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                        data-dots="0" data-animations="" data-nav="0" data-navcontainer=".control-thanhtuu">
                        @foreach ($thanhTuu as $v)
                            <div class="item-tt">
                                <div class="quantity-tt">
                                    <span>{{ $v['quantity'] }}</span>
                                </div>
                                <h3 class="quantity-name">{{ $v['namevi'] }}</h3>
                            </div>
                        @endforeach
                    </div>
                    <div class="control-thanhtuu control-owl transition"></div>
                </div>
            </div>
        </div>
    @endif

    @if ($listProductNB->isNotEmpty())
        <div class="position-relative padding-top-bottom">
            <div class="wrap-content">
                <div class="title-main" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <span>Chúng tôi có gì ?</span>
                    </h2>
                    @if (!empty($slogan1))
                        <p>{{ $slogan1->namevi }}</p>
                    @endif
                </div>
                <div class="category">
                    @foreach ($listProductNB as $k => $v)
                        @component('component.itemProductList', ['product' => $v])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($tieuchi->isNotEmpty())
        <div class="wrap-tieuchi padding-top-bottom">
            <div class="wrap-content">
                <div class="title-tieuchi" data-aos="fade-up" data-aos-duration="1000">
                    @if (!empty($sloganTieuchi))
                        <span>{{ $sloganTieuchi->namevi }}</span>
                    @endif
                </div>
                <div class="content-tieuchi">
                    <div class="owl-page owl-carousel owl-theme"
                        data-items="screen:0|items:2|margin:5,screen:425|items:2|margin:5,screen:575|items:2|margin:10,screen:767|items:2|margin:10,screen:991|items:3|margin:10,screen:1199|items:3|margin:10"
                        data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                        data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                        data-dots="0" data-animations="" data-nav="0" data-navcontainer="">
                        @foreach ($tieuchi as $v)
                            <div class="item-tieuchi">
                                <div class="image-tieuchi">
                                    <img onerror="this.src='{{ thumbs('thumbs/68x68x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('news', '', $v['photo'], '') }}" alt="{{ $v['namevi'] }}">
                                </div>
                                <div class="quantity-tieuchi">
                                    <span>+</span>
                                    <span>{{ $v['quantity'] }}</span>
                                </div>
                                <h3 class="name-tieuchi">{{ $v['namevi'] }}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($projectHot->isNotEmpty())
        <div class="wrap-project padding-top-bottom overflow-hidden">
            <div class="wrap-content">
                <div class="title-main" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <span>{{ __('web.duan') }}</span>
                    </h2>
                    @if (!empty($slogan2))
                        <p>{{ $slogan2->namevi }}</p>
                    @endif
                </div>
            </div>
            <div class="row-project">
                <div class="slide__project">
                    @foreach ($projectHot as $v)
                        <div class="col-project">
                            <div class="item-project">
                                <a class="pic-project text-decoration-none scale-img hover-img"
                                    href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}" title="{{ $v['namevi'] }}">
                                    <img class="w-100"
                                        onerror="this.src='{{ thumbs('thumbs/1000x606x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('news', '1000x606x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $v['namevi'] }}">
                                </a>
                                <div class="info-project">
                                    <span class="project-heading">{{ __('web.duan') }}</span>
                                    <h3 class="mb-0"><a class="name-project transition text-split text-decoration-none"
                                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                            title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                                    <p class="desc-project text-split">{{ $v['descvi'] }}</p>
                                    <a href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                        class="btn-view text-decoration-none transition"
                                        title="{{ __('web.chitiet') }}">{{ __('web.chitiet') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($danhGia->isNotEmpty())
        <div class="wrap-customer padding-top-bottom mg-bottom">
            <div class="wrap-content">
                <div class="title-main" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <span>Đánh giá của khách hàng</span>
                    </h2>
                    @if (!empty($slogan3))
                        <p class="text-white">{{ $slogan3->namevi }}</p>
                    @endif
                </div>
                <div class="position-relative">
                    <div class="owl-page owl-carousel owl-theme"
                        data-items="screen:0|items:1|margin:10,screen:425|items:1|margin:10,screen:575|items:2|margin:10,screen:767|items:2|margin:10,screen:991|items:3|margin:20,screen:1199|items:3|margin:20"
                        data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                        data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                        data-dots="0"
                        data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                        data-nav="0" data-navcontainer=".control-customer">
                        @foreach ($danhGia as $v)
                            <div class="item-customer">
                                <div class="top-customer">
                                    <div class="content-customer text-split">{{ $v['contentvi'] }}</div>
                                </div>
                                <div class="bottom-customer">
                                    <div class="image-customer">
                                        <img class="w-100"
                                            onerror="this.src='{{ thumbs('thumbs/100x100x1/assets/images/noimage.png') }}';"
                                            src="{{ assets_photo('news', '100x100x1', $v['photo'], 'thumbs') }}"
                                            alt="{{ $v['namevi'] }}">
                                    </div>
                                    <div class="info-customer">
                                        <h3 class="name-customer">{{ $v['namevi'] }}</h3>
                                        <p class="desc-customer">{{ $v['descvi'] }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="control-customer control-owl transition"></div>
                </div>
            </div>
        </div>
    @endif

    @if ($partner->isNotEmpty())
        <div class="wrap-content">
            <div class="d-flex flex-wrap">
                <div class="title-partner" data-aos="fade-up" data-aos-duration="1000">
                    <span>{{ __('web.doitac') }}</span>
                </div>
                <div class="content-partner" data-aos="fade-up" data-aos-duration="1000">
                    <div class="owl-page owl-carousel owl-theme"
                        data-items="screen:0|items:2|margin:10,screen:425|items:2|margin:10,screen:575|items:3|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:10,screen:1199|items:5|margin:15"
                        data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                        data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                        data-dots="0"
                        data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                        data-nav="0" data-navcontainer=".control-ti">
                        @foreach ($partner as $v)
                            <div>
                                <a class="text-decoration-none scale-img hover-img item-partner"
                                    href="{{ $v['link'] }}" target="_blank" title="{{ $v['namevi'] }}">
                                    <img class="w-100"
                                        onerror="this.src='{{ thumbs('thumbs/222x132x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('photo', '222x132x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $v['namevi'] }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if ($ketnoi->isNotEmpty())
        <div class="position-relative padding-top-bottom">
            <div class="wrap-content">
                <div class="title-main" data-aos="fade-up" data-aos-duration="1000">
                    <h2>
                        <span>Kết nối với chúng tôi</span>
                    </h2>
                    @if (!empty($slogan4))
                        <p>{{ $slogan4->namevi }}</p>
                    @endif
                </div>
                <div class="owl-page owl-carousel owl-theme"
                    data-items="screen:0|items:1|margin:0,screen:425|items:1|margin:0,screen:575|items:2|margin:20,screen:767|items:2|margin:20,screen:991|items:3|margin:20,screen:1199|items:3|margin:80"
                    data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                    data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                    data-dots="0"
                    data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                    data-nav="0" data-navcontainer=".control-ketnoi">
                    @foreach ($ketnoi as $v)
                        <div>
                            <a class="text-decoration-none d-block item-ketnoi" href="{{ $v['link'] }}"
                                target="_blank" title="{{ $v['namevi'] }}">
                                <img class="w-100"
                                    onerror="this.src='{{ thumbs('thumbs/380x366x1/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('photo', '380x366x1', $v['photo'], 'thumbs') }}"
                                    alt="{{ $v['namevi'] }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif


    <div class="wrap-newsletter">
        <div class="wrap-content">
            <div class="newsletter__layout">
                <div class="newsletter__start" data-aos="fade-up" data-aos-duration="1000">
                    <div class="title-newsletter">
                        <span>Liên hệ</span>
                        @if (!empty($slogan5))
                            <p>{{ $slogan5->namevi }}</p>
                        @endif
                    </div>
                </div>
                <div class="newsletter__end" data-aos="fade-up" data-aos-duration="1000">
                    <form class="form-newsletter validation-newsletter" id="newsletter-form" novalidate=""
                        method="POST" action="{{ url('letter') }}" enctype="multipart/form-data">
                        <div class="dangky-layout">
                            <div class="dangky-left">
                                <div class="row-newsletter">
                                    <div class="col-newsletter">
                                        <div class="newsletter-input">
                                            <img src="assets/images/lt-1.png" alt="icon">
                                            <input type="text" class="form-control" id="ten-newsletter"
                                                name="dataNewsletter[fullname]" value=""
                                                placeholder="Họ và tên ..." required>
                                        </div>
                                    </div>
                                    <div class="col-newsletter">
                                        <div class="newsletter-input">
                                            <img src="assets/images/lt-2.png" alt="icon">
                                            <input type="text" class="form-control" id="address-newsletter"
                                                name="dataNewsletter[address]" value="" placeholder="Địa chỉ ..."
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-newsletter">
                                        <div class="newsletter-input">
                                            <img src="assets/images/lt-3.png" alt="icon">
                                            <input type="tel" class="form-control" id="dienthoai-newsletter"
                                                name="dataNewsletter[phone]" placeholder="Điện thoại ..." required>
                                        </div>

                                    </div>
                                    <div class="col-newsletter">
                                        <div class="newsletter-input">
                                            <img src="assets/images/lt-4.png" alt="icon">
                                            <input type="email" class="form-control" id="email-newsletter"
                                                name="dataNewsletter[email]" placeholder="Email ..." required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="dangky-right">
                                <div class=" d-flex flex-wrap align-items-center">
                                    <div class="newsletter-textarea">
                                        <textarea class="form-control text-sm" id="content-newsletter" name="dataNewsletter[content]"
                                            placeholder="Nội dung"></textarea>
                                    </div>
                                    <div class="newsletter-button">
                                        <input type="button"
                                            onclick="submit_form_check_recaptcha('newsletter-form','newsletter','recaptchaResponseNewsletter')"
                                            class="btn btn-danger" value="Gửi" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
                        <input type="hidden" class="btn w-100" name="submit-newsletter" value="ok">
                        <input type="hidden" name="recaptcha_response_newsletter" id="recaptchaResponseNewsletter">
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if ($listNewsHot->isNotEmpty())
        <div class="wrap-list-tintuc pad-top">
            <div class="wrap-content">
                <div class="list-tintuc-row row-tintuc-index">
                    @if ($listNewsHot[0]->getItemsNB()->get()->isNotEmpty())
                        <div class="list-tintuc-col col-tintuc-index">
                            <div class="title-list-tintuc">
                                <span>{{ $listNewsHot[0]['namevi'] }}</span>
                            </div>
                            <div class="mg-tintuc">
                                <div class="slide__tintuc__left">
                                    @foreach ($listNewsHot[0]->getItemsNB()->get() ?? [] as $v)
                                        <div class="col-tintuc">
                                            <div class="position-relative">
                                                <a class="text-decoration-none scale-img hover-img"
                                                    href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                    title="{{ $v['namevi'] }}">
                                                    <img class="w-100"
                                                        onerror="this.src='{{ thumbs('thumbs/345x167x1/assets/images/noimage.png') }}';"
                                                        src="{{ assets_photo('news', '345x167x1', $v['photo'], 'thumbs') }}"
                                                        alt="{{ $v['namevi'] }}">
                                                </a>
                                                <div class="times-tintuc">
                                                    <strong>{{ date('d', $v['date_created']) }}</strong>
                                                    <span>T{{ date('m', $v['date_created']) }}-{{ date('Y', $v['date_created']) }}</span>
                                                </div>
                                            </div>
                                            <div class="info-tintuc">
                                                <h3 class="mb-0 text-center"><a
                                                        class="name-tintuc transition text-split text-decoration-none"
                                                        href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                        title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endif

                    @if ($listNewsHot[1]->getItemsNB()->get()->isNotEmpty())
                        <div class="list-tintuc-col col-tintuc-index">
                            <div class="title-list-tintuc">
                                <span>{{ $listNewsHot[1]['namevi'] }}</span>
                            </div>
                            <div class="owl-page owl-carousel owl-theme"
                                data-items="screen:0|items:1|margin:0,screen:425|items:1|margin:0,screen:575|items:1|margin:0,screen:767|items:1|margin:0,screen:991|items:1|margin:0,screen:1199|items:1|margin:0"
                                data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                                data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800"
                                data-autoplaytimeout="5000" data-dots="0"
                                data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                                data-nav="0" data-navcontainer="">
                                @foreach ($listNewsHot[1]->getItemsNB()->get() ?? [] as $v)
                                    <div>
                                        <div class="position-relative">
                                            <a class="text-decoration-none scale-img hover-img"
                                                href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                title="{{ $v['namevi'] }}">
                                                <img class="w-100"
                                                    onerror="this.src='{{ thumbs('thumbs/635x325x1/assets/images/noimage.png') }}';"
                                                    src="{{ assets_photo('news', '635x325x1', $v['photo'], 'thumbs') }}"
                                                    alt="{{ $v['namevi'] }}">
                                            </a>
                                            <div class="times-tintuc">
                                                <strong>{{ date('d', $v['date_created']) }}</strong>
                                                <span>T{{ date('m', $v['date_created']) }}-{{ date('Y', $v['date_created']) }}</span>
                                            </div>
                                        </div>
                                        <div class="info-tintuc p-4">
                                            <h3 class="mb-3 text-start"><a
                                                    class="name-tintuc transition text-split text-decoration-none"
                                                    href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                    title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                                            <p class="desc-tintuc text-split mb-0">{{ $v['descvi'] }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    @if ($listNewsHot[2]->getItemsNB()->get()->isNotEmpty())
                        <div class="list-tintuc-col col-tintuc-index">
                            <div class="title-list-tintuc">
                                <span>{{ $listNewsHot[2]['namevi'] }}</span>
                            </div>
                            <div class="mg-tintuc">
                                <div class="slide__tintuc__right">
                                    @foreach ($listNewsHot[2]->getItemsNB()->get() ?? [] as $v)
                                        <div class="col-tintuc">
                                            <div class="d-flex flex-wrap">
                                                <div class="image-tintuc-right position-relative">
                                                    <a class="text-decoration-none scale-img hover-img"
                                                        href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                        title="{{ $v['namevi'] }}">
                                                        <img class="w-100"
                                                            onerror="this.src='{{ thumbs('thumbs/180x136x1/assets/images/noimage.png') }}';"
                                                            src="{{ assets_photo('news', '180x136x1', $v['photo'], 'thumbs') }}"
                                                            alt="{{ $v['namevi'] }}">
                                                    </a>
                                                    <div class="times-tintuc">
                                                        <strong>{{ date('d', $v['date_created']) }}</strong>
                                                        <span>T{{ date('m', $v['date_created']) }}-{{ date('Y', $v['date_created']) }}</span>
                                                    </div>
                                                </div>
                                                <div class="info-tintuc-right">
                                                    <div class="info-tintuc h-100">
                                                        <h3 class="mb-0"><a
                                                                class="name-tintuc transition text-split text-decoration-none"
                                                                href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                                                title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
@endsection
