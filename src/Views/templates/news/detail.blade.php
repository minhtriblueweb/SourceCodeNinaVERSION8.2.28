@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3 mt-4">
            @if (!empty($rowDetail))
                <div class="title-main">
                    <span><?= $rowDetail->namevi ?></span>
                </div>




                @if ($com !== 'gioi-thieu')
                    <div class="meta-toc fiedx">
                        <a class="mucluc-dropdown-list_button">
                            Nội dung chính
                        </a>
                        <div class="box-readmore">
                            <ul class="toc-list" id="project-bar" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                        </div>
                    </div>
                @endif

                <div class="content-main baonoidung w-clear" id="toc-content"> {!! Func::decodeHtmlChars($rowDetail['contentvi']) !!}</div>



                <div class="share">
                    <b>Chia sẻ:</b>
                    <div class="social-plugin w-clear">
                        @component('component.share')
                        @endcomponent
                    </div>
                </div>
            @else
                <div class="alert alert-warning w-100" role="alert">
                    <strong>Đang cập nhật dữ liệu</strong>
                </div>
            @endif
        </div>
    </section>
    @if ($rowDetail['type'] == 'gioi-thieu' || $rowDetail['type'] == 'chinh-sach')
        @if ($partner->isNotEmpty())
            <div class="wrap-content">
                <div class="d-flex flex-wrap">
                    <div class="title-partner">
                        <span>{{ __('web.doitac') }}</span>
                    </div>
                    <div class="content-partner">
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
    @else
        <section>
            <div class="max-width py-3">
                <div class="title-main">
                    <span>{{ $titleMain }} liên quan</span>
                </div>
                @if (!empty($news))
                    <div class="row">
                        @foreach ($news as $k => $v)
                            <div class="col-md-6 mb-3">
                                @component('component.itemNews', ['news' => $v])
                                @endcomponent
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif
@endsection
@pushOnce('scripts')
    <script src="@asset('assets/toc/toc.js')"></script>
    <script>
        if (isExist($(".toc-list"))) {
            $(".toc-list").toc({
                content: "div#toc-content",
                headings: "h2,h3,h4"
            });

            if (!$(".toc-list li").length) $(".meta-toc").hide();

            $('.toc-list').find('a').click(function() {
                var x = $(this).attr('data-rel');
                goToByScroll(x, 130);
            });
            $(document).on("click", ".mucluc_1", function() {
                $(".box-readmore").stop().toggle('500');
            });

            $(document).scroll(function() {
                var y = $(this).scrollTop();
                if (y > 300) {
                    $('.meta-toc').addClass('fixed');
                } else {
                    $('.meta-toc').removeClass('fixed');
                }
            });
        }


        $(window).resize(function() {
            ResizeArticle();
        })
        ResizeArticle();

        function ResizeArticle() {
            var margintop = 3;
            $(".info_news").css({
                marginTop: margintop
            });
        }

        var lastId,
            topMenu = $("#project-bar"),
            topMenuHeight = 100;
        menuItems = topMenu.find("a"),
            scrollItems = menuItems.map(function() {
                var item = $($(this).attr("data-rel"));
                if (item.length) {
                    return item;
                }
            });

        menuItems.click(function(e) {
            var href = $(this).attr("data-rel"),
                offsetTop = href === "#" ? 0 : $(href).offset().top - topMenuHeight + 1;
            $('html, body').stop().animate({
                scrollTop: offsetTop
            }, 600);
            e.preventDefault();
        });

        $(window).scroll(function() {
            var fromTop = $(this).scrollTop() + topMenuHeight;
            var cur = scrollItems.map(function() {
                if ($(this).offset().top < fromTop)
                    return this;
            });
            cur = cur[cur.length - 1];
            var id = cur && cur.length ? cur[0].id : "";
            if (lastId !== id) {
                lastId = id;
                menuItems
                    .parent().removeClass("active")
                    .end().filter("[data-rel='#" + id + "']").parent().addClass("active");
            }
        });
        // if (isExist($('.toc-list'))) {
        //     $('.toc-list').toc({
        //         content: 'div#toc-content',
        //         headings: 'h2,h3,h4'
        //     });

        //     if (!$('.toc-list li').length) $('.meta-toc').hide();
        //     if (!$('.toc-list li').length) $('.meta-toc .mucluc-dropdown-list_button').hide();

        //     $('.toc-list')
        //         .find('a')
        //         .click(function() {
        //             var x = $(this).attr('data-rel');
        //             goToByScroll(x);
        //         });

        //     $('body').on('click', '.mucluc-dropdown-list_button', function() {
        //         $('.box-readmore').slideToggle(200);
        //     });

        //     $(document).scroll(function() {
        //         var y = $(this).scrollTop();
        //         if (y > 300) {
        //             $('.meta-toc').addClass('fiedx');
        //         } else {
        //             $('.meta-toc').removeClass('fiedx');
        //         }
        //     });
        // }
    </script>
@endPushOnce
