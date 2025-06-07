@extends('layout')
@section('content')
<section x-data>
    <div class="dtproduct">
        <div class="wrap-content">
            <div class="dtproduct__row">
                <div class="dtproduct__left">
                    <div class="box-photo-detail">
                        <div class="slick_photo1  overflow-hidden">
                            <a id="Zoom-1" class="MagicZoom"
                                data-options="zoomMode: true; hint: off; rightClick: true; selectorTrigger: click; expandCaption: false; history: false;"
                                href="{{ assets_photo('product', '', $rowDetail['photo']) }}"
                                title="{{ $rowDetail['namevi'] }}">
                                <img class=""
                                    onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                                    src="{{ assets_photo('product', '540x540x1', $rowDetail['photo'], 'thumbs') }}"
                                    alt="{{ $rowDetail['namevi'] }}">
                            </a>
                        </div>
                        <div class="album-product mt-2">
                            <div class="slick in-page" data-dots="0" data-infinite="0" data-arrows="0" data-autoplay='0'
                                data-slidesDefault="5:1" data-lg-items='5:1' data-md-items='5:1' data-sm-items='5:1'
                                data-xs-items="5:1" data-vertical="0">
                                <a class="thumb-pro-detail p-1 border-[1px] rounded-[8px] border-0"
                                    data-zoom-id="Zoom-1" href="{{ assets_photo('product', '', $rowDetail['photo']) }}"
                                    title="{{ $rowDetail['namevi'] }}"
                                    data-image="{{ assets_photo('product', '540x540x1', $rowDetail['photo'], 'thumbs') }}"><img
                                        class=" !mb-0 !pb-0 !border-0"
                                        onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('product', '540x540x1', $rowDetail['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}"></a>
                                @foreach ($rowDetailPhoto as $v)
                                <a class="thumb-pro-detail p-1 border-[1px] rounded-[8px] border-0"
                                    data-zoom-id="Zoom-1" href="{{ assets_photo('product', '', $v['photo']) }}"
                                    title="{{ $rowDetail['namevi'] }}"
                                    data-image="{{ assets_photo('product', '540x540x1', $v['photo'], 'thumbs') }}"><img
                                        class=" !mb-0 !pb-0 !border-0"
                                        onerror="this.src='{{ thumbs('thumbs/540x540x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('product', '540x540x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}"></a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dtproduct__center">
                    <h1 class="title-pro-detail">{{ $rowDetail['namevi'] }}</h1>

                    <ul class="attr-pro-detail">
                        <li>
                            <label class="attr-label-pro-detail">Luợt xem: </label>
                            <div class="attr-content-pro-detail">{{ $rowDetail['view'] }}</div>
                        </li>
                        <li>
                            <label class="attr-label-pro-detail">Mã sản phẩm: </label>
                            <div class="attr-content-pro-detail">{{ $rowDetail['code'] }}</div>
                        </li>
                    </ul>
                    @if ($rowDetail['sale_price'])
                    <span class="price-new-pro-detail">{{ Func::formatMoney($rowDetail['sale_price']) }}</span>
                    <span class="price-old-pro-detail">{{ Func::formatMoney($rowDetail['regular_price']) }}</span>
                    @else
                    <span
                        class="price-new-pro-detail">{{ $rowDetail['regular_price'] ? Func::formatMoney($rowDetail['regular_price']) : 'Liên hệ' }}</span>
                    @endif

                    <div class="content-text">{!! Func::decodeHtmlChars($rowDetail['descvi']) !!}</div>
                    <div class="cart-pro-detail">
                        <div class="attr-content-pro-detail d-block">
                            <div class="quantity-pro-detail">
                                <span class="quantity-minus-pro-detail">-</span>
                                <input type="text" class="qty-pro !outline-none !shadow-none !ring-0" min="1" value="1"
                                    readonly="">
                                <span class="quantity-plus-pro-detail">+</span>
                            </div>
                        </div>
                        <a class="transition addcart text-decoration-none buynow" data-id="{{ $rowDetail['id'] }}"
                            data-action="buynow">
                            <span>Mua ngay</span>
                        </a>
                        <a class="transition addcart text-decoration-none addnow" data-id="{{ $rowDetail['id'] }}"
                            data-action="addnow">Thêm vào giỏ hàng</a>
                    </div>
                    <a href="tel:{{ $optSetting['hotline'] }}"
                        class="call-detail-product text-decoration-none transition">Liên hệ tư vấn</a>
                </div>
                <div class="dtproduct__right">
                    <div class="sticky__dtproduct__right">
                        <div class="policy-product">
                            <div class="title-policy-product">
                                <span>Thông số kỹ thuật</span>
                            </div>
                            <div class="content-text">{!! Func::decodeHtmlChars($rowDetail['parametervi']) !!}</div>
                        </div>

                        <div class="policy-product mt-4">
                            <div class="title-policy-product">
                                <span>Chính sách khách hàng</span>
                            </div>
                            <ul class="ul-policy-product">
                                @foreach ($policy as $v)
                                <li>
                                    <a href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                        class=" text-decoration-none transition" title="{{ $v['namevi'] }}">
                                        <img src="assets/images/checklist.gif" alt="icon">
                                        <span>{{ $v['namevi'] }}</span>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="policy-product mt-4">
                            <div class="title-policy-product">
                                <span>{{ $khuyenmai['namevi'] }}</span>
                            </div>
                            <div class="content-main baonoidung w-clear"> {!!
                                Func::decodeHtmlChars($khuyenmai['contentvi'])
                                !!}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="tabs-pro-detail">
                    <ul class="nav nav-tabs" id="tabsProDetail" role="tablist">

                        <li class="nav-item">
                            <a class="nav-link active" id="info2-pro-detail-tab" data-bs-toggle="tab"
                                href="#info2-pro-detail" role="tab">Thông tin chi tiết</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="info3-pro-detail-tab" data-bs-toggle="tab" href="#info3-pro-detail"
                                role="tab">Tài liệu</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="info4-pro-detail-tab" data-bs-toggle="tab" href="#info4-pro-detail"
                                role="tab">Video</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="info5-pro-detail-tab" data-bs-toggle="tab" href="#info5-pro-detail"
                                role="tab">Bình luận</a>
                        </li>

                    </ul>
                    <div class="tab-content pt-4 pb-4" id="tabsProDetailContent">
                        <div class="tab-pane fade show active" id="info2-pro-detail" role="tabpanel">
                            <div class="content-text">{!! Func::decodeHtmlChars($rowDetail['contentvi']) !!}</div>
                        </div>

                        <div class="tab-pane fade show" id="info3-pro-detail" role="tabpanel">
                            <div class="content-text">{!! Func::decodeHtmlChars($rowDetail['incentivesvi']) !!}</div>
                        </div>

                        <div class="tab-pane fade show" id="info4-pro-detail" role="tabpanel">
                            <div class="video-detail-product">
                                <iframe width="100%" height="100%"
                                    src="//www.youtube.com/embed/{!! Func::getYoutube($rowDetail['link_video']) !!}"
                                    frameborder="0" allowfullscreen></iframe>
                            </div>
                        </div>

                        <div class="tab-pane fade show" id="info5-pro-detail" role="tabpanel">
                            <div class="fb-comments" data-href="{!! Func::getCurrentPageURL() !!}" data-numposts="3"
                                data-colorscheme="light" data-width="100%"></div>
                        </div>

                    </div>
                </div>
            </div>

            @if ($product->isNotEmpty())
            <div class="py-3">
                <div class="title-main">
                    <span>Sản phẩm cùng loại</span>
                </div>
                <div class="owl-page owl-carousel owl-theme"
                    data-items="screen:0|items:2|margin:10,screen:425|items:2|margin:10,screen:575|items:3|margin:10,screen:767|items:3|margin:10,screen:991|items:4|margin:10,screen:1199|items:4|margin:20"
                    data-rewind="1" data-autoplay="0" data-loop="0" data-lazyload="0" data-mousedrag="1"
                    data-touchdrag="1" data-smartspeed="800" data-autoplayspeed="800" data-autoplaytimeout="5000"
                    data-dots="0"
                    data-animations="animate__fadeInDown, animate__backInUp, animate__rollIn, animate__backInRight, animate__zoomInUp, animate__backInLeft, animate__rotateInDownLeft, animate__backInDown, animate__zoomInDown, animate__fadeInUp, animate__zoomIn"
                    data-nav="0" data-navcontainer="">
                    @foreach ($product as $k => $v)
                    @component('component.itemProduct', ['product' => $v])
                    @endcomponent
                    @endforeach
                </div>

            </div>
            @endif

            @if ($cauhoi->isNotEmpty())
            <div class="wrap-cauohoi padding-top-bottom">
                <div class="container-cauhoi">
                    <div class="title-main">
                        <span>Câu hỏi thường gặp</span>
                        <p>{{ $slogan->namevi }}</p>
                    </div>
                    <!-- Contenedor -->
                    <ul id="accordion" class="accordion">
                        @foreach ($cauhoi as $v)
                        <li class="">
                            <div class="link">

                                <div class="link__end">
                                    <p class="name-link text-split">{{ $v['namevi'] }}</p>
                                </div>
                                <div class="link__start">

                                </div>
                            </div>
                            <ul class="submenu">
                                <div class="desc-link">
                                    <div class="content-main content-text w-clear">
                                        {!! Func::decodeHtmlChars($v->contentvi ?? '') !!}
                                    </div>
                                </div>
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@component('component.detailProduct', [
'rowDetail' => $rowDetail ?? [],
'rowDetailPhoto' => $rowDetailPhoto ?? [],
'rowDetailPhoto1' => $rowDetailPhoto1 ?? [],
])
@endcomponent
@endsection

@push('styles')
<link rel="stylesheet" href="@asset('assets/magiczoomplus/magiczoomplus.css')">
@endpush
@push('scripts')
<script src="@asset('assets/magiczoomplus/magiczoomplus.js')"></script>
@endpush