<div class="slideshow bg-slide padding-top-bottom">
    <div class="wrap-content">
        <div class="slideshow__layout">
            <div class="slideshow__start">
                <div class="title-slide">
                    <p class="desc-slide">công Ty TNHH Sản Xuất TM & DV</p>
                    <span class="name-slide">Hồng Kỳ</span>
                </div>
                @if (!empty($listProductMenu))
                    <div class="content-slide">
                        <ul>
                            @foreach ($listProductMenu ?? [] as $vlist)
                                <li>
                                    <a class="transition" href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                                        title="{{ $vlist['namevi'] }}">
                                        <img src="assets/images/vector.png" alt="icon">
                                        <span>{{ $vlist['namevi'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <a href="lien-he" class="btn-slide text-decoration-none transition" title="Liên hệ ngay">Liên hệ
                    ngay</a>
            </div>
            <div class="slideshow__end">
                <div class="slide-01 all-slide">
                    @foreach ($slider01 as $v)
                        <div>
                            <div class="text-center tieude-slide">
                                <h3 class="mb-0"><a class="text-slide transition text-split text-decoration-none"
                                        target="_blank" href="{{ $v['link'] }}"
                                        title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                            </div>
                            <div class="item-slide-mask">
                                <a class="text-decoration-none d-block slide-mask" href="{{ $v['link'] }}"
                                    target="_blank" title="{{ $v['namevi'] }}">
                                    <img class="w-100 position-relative"
                                        onerror="this.src='{{ thumbs('thumbs/274x243x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('photo', '274x243x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $v['namevi'] }}" title="{{ $v['namevi'] }}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="slide-02 all-slide">
                    @foreach ($slider02 as $v)
                        <div>
                            <div class="d-flex align-items-end ">
                                <div class="text-end left-slide-02">
                                    <h3 class="mb-0"><a class="text-slide transition text-split text-decoration-none"
                                            target="_blank" href="{{ $v['link'] }}"
                                            title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                                </div>
                                <div class="right-slide-02">
                                    <div class="item-slide-mask">
                                        <a class="text-decoration-none d-block slide-mask" href="{{ $v['link'] }}"
                                            target="_blank" title="{{ $v['namevi'] }}">
                                            <img class="w-100 position-relative"
                                                onerror="this.src='{{ thumbs('thumbs/237x211x1/assets/images/noimage.png') }}';"
                                                src="{{ assets_photo('photo', '237x211x1', $v['photo'], 'thumbs') }}"
                                                alt="{{ $v['namevi'] }}" title="{{ $v['namevi'] }}" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="slide-03 all-slide">
                    @foreach ($slider03 as $v)
                        <div>
                            <div class="text-center tieude-slide">
                                <h3 class="mb-0"><a class="text-slide transition text-split text-decoration-none"
                                        target="_blank" href="{{ $v['link'] }}"
                                        title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a></h3>
                            </div>
                            <div class="item-slide-mask">
                                <a class="text-decoration-none d-block slide-mask" href="{{ $v['link'] }}"
                                    target="_blank" title="{{ $v['namevi'] }}">
                                    <img class="w-100 position-relative"
                                        onerror="this.src='{{ thumbs('thumbs/386x346x1/assets/images/noimage.png') }}';"
                                        src="{{ assets_photo('photo', '386x346x1', $v['photo'], 'thumbs') }}"
                                        alt="{{ $v['namevi'] }}" title="{{ $v['namevi'] }}" />
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
