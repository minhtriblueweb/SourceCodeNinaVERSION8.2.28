@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3 mt-4">
            @if (!empty($rowDetail))
                <div class="title-main">
                    <span><?= $rowDetail->namevi ?></span>
                </div>
                <div class="row">
                    <div class="col-lg-9">

                        <div>
                            <div class="slick_photo1  overflow-hidden">
                                <a id="Zoom-1" class="MagicZoom"
                                    data-options="zoomMode: true; hint: off; rightClick: true; selectorTrigger: click; expandCaption: false; history: false;"
                                    href="{{ assets_photo('news', '', $rowDetail['photo']) }}"
                                    title="{{ $rowDetail['namevi'] }}">
                                    <img class=""
                                        onerror="this.src='{{ thumbs('thumbs/900x450x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('news', '900x450x1', $rowDetail['photo'], 'thumbs') }}"
                                        alt="{{ $rowDetail['namevi'] }}">
                                </a>
                            </div>
                            <div class="album-product my-2 mt-3 mg-album-product">
                                <div class="slick in-page" data-dots="0" data-infinite="0" data-arrows="0"
                                    data-autoplay='1' data-mousedrag="1" data-touchdrag="1" data-slidesDefault="4:1"
                                    data-lg-items='4:1' data-md-items='4:1' data-sm-items='4:1' data-xs-items="4:1"
                                    data-vertical="0">
                                    <div class="pad-album-product">
                                        <a class="thumb-pro-detail border-[1px] rounded-[8px]" data-zoom-id="Zoom-1"
                                            href="{{ assets_photo('news', '', $rowDetail['photo']) }}"
                                            title="{{ $rowDetail['namevi'] }}"
                                            data-image="{{ assets_photo('news', '900x450x1', $rowDetail['photo'], 'thumbs') }}"><img
                                                class=" !mb-0 !pb-0 !border-0"
                                                onerror="this.src='{{ thumbs('thumbs/900x450x1/assets/images/noimage.png') }}';"
                                                src="{{ assets_photo('news', '900x450x1', $rowDetail['photo'], 'thumbs') }}"
                                                alt="{{ $rowDetail['namevi'] }}"></a>
                                    </div>
                                    @foreach ($rowDetailPhoto as $v)
                                        <div class="pad-album-product">
                                            <a class="thumb-pro-detail border-[1px] rounded-[8px]" data-zoom-id="Zoom-1"
                                                href="{{ assets_photo('news', '', $v['photo']) }}"
                                                title="{{ $rowDetail['namevi'] }}"
                                                data-image="{{ assets_photo('news', '900x450x1', $v['photo'], 'thumbs') }}"><img
                                                    class=" !mb-0 !pb-0 !border-0"
                                                    onerror="this.src='{{ thumbs('thumbs/900x450x1/assets/images/noimage.png') }}';"
                                                    src="{{ assets_photo('news', '900x450x1', $v['photo'], 'thumbs') }}"
                                                    alt="{{ $rowDetail['namevi'] }}"></a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="meta-toc fiedx">
                            <a class="mucluc-dropdown-list_button">
                                Nội dung chính
                            </a>
                            <div class="box-readmore">
                                <ul class="toc-list" id="project-bar" data-toc="article" data-toc-headings="h1, h2, h3">
                                </ul>
                            </div>
                        </div>
                        <div class="content-main baonoidung w-clear" id="toc-content"> {!! Func::decodeHtmlChars($rowDetail['contentvi']) !!}</div>


                        <div class="share">
                            <b>Chia sẻ:</b>
                            <div class="social-plugin w-clear">
                                @component('component.share')
                                @endcomponent
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">

                        <div class="share othernews mb-3">
                            <b>Các dự án khác:</b>
                            <div class="form-row">
                                @foreach ($news as $k => $v)
                                    <div class="news-other d-flex flex-wrap col-12 col-lg-12 col-md-6">
                                        <a class="scale-img hover-img text-decoration-none pic-news-other"
                                            href="{{ $v['slugvi'] }}" title="{{ $v['namevi'] }}">

                                            <img class="w-100"
                                                onerror="this.src='{{ thumbs('thumbs/210x144x1/assets/images/noimage.png') }}';"
                                                src="{{ assets_photo('news', '210x144x1', $v['photo'], 'thumbs') }}"
                                                alt="{{ $v['namevi'] }}">
                                        </a>
                                        <div class="info-news-other">
                                            <h3>
                                                <a class="name-news-other text-decoration-none text-split"
                                                    href="{{ $v['slugvi'] }}"
                                                    title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            @else
                <div class="alert alert-warning w-100" role="alert">
                    <strong>Đang cập nhật dữ liệu</strong>
                </div>
            @endif
        </div>
    </section>
@endsection
@pushOnce('scripts')
    <script src="@asset('assets/toc/toc.js')"></script>
    <script>
        if (isExist($('.toc-list'))) {
            $('.toc-list').toc({
                content: 'div#toc-content',
                headings: 'h2,h3,h4'
            });

            if (!$('.toc-list li').length) $('.meta-toc').hide();
            if (!$('.toc-list li').length) $('.meta-toc .mucluc-dropdown-list_button').hide();

            $('.toc-list')
                .find('a')
                .click(function() {
                    var x = $(this).attr('data-rel');
                    goToByScroll(x);
                });

            $('body').on('click', '.mucluc-dropdown-list_button', function() {
                $('.box-readmore').slideToggle(200);
            });

            $(document).scroll(function() {
                var y = $(this).scrollTop();
                if (y > 300) {
                    $('.meta-toc').addClass('fiedx');
                } else {
                    $('.meta-toc').removeClass('fiedx');
                }
            });
        }
    </script>
@endPushOnce

@push('styles')
    <link rel="stylesheet" href="@asset('assets/magiczoomplus/magiczoomplus.css')">
@endpush
@push('scripts')
    <script src="@asset('assets/magiczoomplus/magiczoomplus.js')"></script>
@endpush
