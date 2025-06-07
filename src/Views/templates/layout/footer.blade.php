<footer>
    <div class="footer-section pad-top">
        <div class="max-width">
            <div class="top-footer">
                <div class="d-flex flex-column align-items-center justify-content-center text-center">
                    <h2 class="title-web">{{ $footer->namevi }}</h2>
                </div>
                <div class="content-main text-center w-clear"> {!! Func::decodeHtmlChars($footer->contentvi) !!}</div>
            </div>
            <div class="center-footer">
                @if ($thongTinLienHe->isNotEmpty())
                    <div class="position-relative">
                        <div class="owl-page owl-carousel owl-theme"
                            data-items="screen:0|items:1|margin:0,screen:425|items:2|margin:10,screen:575|items:3|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:20,screen:1199|items:4|margin:20"
                            data-rewind="1" data-autoplay="1" data-loop="0" data-lazyload="0" data-mousedrag="1"
                            data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800"
                            data-autoplaytimeout="5000" data-dots="0" data-animations="" data-nav="0"
                            data-navcontainer=".control-footer">
                            @foreach ($thongTinLienHe as $v)
                                <div class="item-ft">
                                    <div class="image-ft">
                                        <img onerror="this.src='{{ thumbs('thumbs/60x60x2/assets/images/noimage.png') }}';"
                                            src="{{ assets_photo('news', '60x60x2', $v['photo'], 'thumbs') }}"
                                            alt="{{ $v['namevi'] }}">
                                    </div>
                                    <div class="info-ft">
                                        <h3 class="name-ft text-split">{{ $v['namevi'] }}</h3>
                                        <p class="name-ft text-split">{{ $v['descvi'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="control-footer control-owl transition"></div>
                    </div>
                @endif
            </div>
            <div class="bottom-footer">
                <ul class="social-footer list-unstyled d-flex align-items-center justify-content-center p-0">
                    @foreach ($socialFooter as $v)
                        <li>
                            <a class="item-social-footer text-decoration-none mx-1" href="{{ $v['link'] }}"
                                target="_blank" title="{{ $v['namevi'] }}">
                                <img onerror="this.src='{{ thumbs('thumbs/40x40x2/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('photo', '40x40x2', $v['photo'], 'thumbs') }}"
                                    alt="{{ $v['namevi'] }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="wrap-content">
        <div class="box-map-footer">
        </div>
        <div class="footer-powered">
            <div class="copyright">© Copyright <span class="fw-bold">{{ $setting['namevi'] }}</span>. All rights
                reserved. Designed by
                <a href="https://nina.vn/" class="text-decoration-none fw-bold" target="_blank">NiNa</a>
            </div>
        </div>
    </div>
</footer>
