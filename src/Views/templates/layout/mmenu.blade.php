<div class="w-menu-res">
    <div class="menu_mobi menu-res">
        <p class="menu_baophu" style="display: none;"></p>
        <div class=" d-flex align-items-center justify-content-between">
            <p class="icon_menu_mobi"><i class="fas fa-bars"></i></p>
            <div class=" logo-mb text-center">
                @if (!empty($logoPhoto))
                    <a href="" class="logo-res text-decoration-none d-inline-block">
                        <img onerror="this.src='{{ thumbs('thumbs/146x126x2/assets/images/noimage.png') }}';"
                            src="{{ assets_photo('photo', '146x126x2', $logoPhoto->photo ?? '', 'thumbs') }}"
                            alt="{{ $setting->namevi }}">
                    </a>
                @endif
            </div>
            <div class="search-res">
                <p class="icon-search transition"><i class="fa fa-search"></i></p>
                <div class="search-grid w-clear">
                    <p onclick="onSearch('keyword-res');"><i class="fa fa-search"></i></p>
                    <input class=" form-control" type="text" name="keyword-res" id="keyword-res"
                        placeholder="Nhập từ khóa cần tìm..." onkeypress="doEnter(event,'keyword-res');">

                </div>
            </div>
        </div>
    </div>

</div>

<div class="menu_mobi_add menu-res">
    <div class="menures_inner">
        <div class="menures_header">
            <div class=" logo-mb text-left">
                @if (!empty($logoPhoto))
                    <a href="" class="logo-res text-decoration-none d-inline-block">
                        <img onerror="this.src='{{ thumbs('thumbs/146x126x2/assets/images/noimage.png') }}';"
                            src="{{ assets_photo('photo', '146x126x2', $logoPhoto->photo ?? '', 'thumbs') }}"
                            alt="{{ $setting->namevi }}">
                    </a>
                @endif
            </div>
            <span class="close_menu">
                <svg viewBox="0 0 19 19" role="presentation">
                    <path
                        d="M9.1923882 8.39339828l7.7781745-7.7781746 1.4142136 1.41421357-7.7781746 7.77817459 7.7781746 7.77817456L16.9705627 19l-7.7781745-7.7781746L1.41421356 19 0 17.5857864l7.7781746-7.77817456L0 2.02943725 1.41421356.61522369 9.1923882 8.39339828z"
                        fill-rule="evenodd"></path>
                </svg>
            </span>
        </div>
        <div class="menures_content">
            <div class="load-menu">
                <ul class=" menu-res-m">
                    <li><a class="transition" href=""
                            title="{{ __('web.home') }}"><span>{{ __('web.home') }}</span></a>
                    </li>
                    <li><a class="transition {{ ($com ?? '') == 'gioi-thieu' ? 'active' : '' }}" href="gioi-thieu"
                            title="{{ __('web.gioithieu') }}"><span>{{ __('web.gioithieu') }}</span></a>
                        @if (!empty($aboutMenu))
                            <ul>
                                @foreach ($aboutMenu ?? [] as $vlist)
                                    <li>
                                        <a class="transition" href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                                            title="{{ $vlist['namevi'] }}">
                                            {{ $vlist['namevi'] }}
                                        </a>
                                    </li>
                                @endforeach
                                <li>
                                    <a class="transition" href="he-thong-phan-phoi" title="Hệ thống phân phối">
                                        Hệ thống phân phối
                                    </a>
                                </li>
                            </ul>
                        @endif
                    </li>
                    <li>
                        <a class="transition {{ ($com ?? '') == 'san-pham' ? 'active' : '' }}" href="san-pham"
                            title="{{ __('web.sanpham') }}"><span>{{ __('web.sanpham') }}</span></a>
                        @if (!empty($listProductMenu))
                            <ul>
                                @foreach ($listProductMenu ?? [] as $vlist)
                                    <li>
                                        <a class="transition" href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                                            title="{{ $vlist['namevi'] }}">
                                            {{ $vlist['namevi'] }}
                                        </a>
                                        @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                                            <ul>
                                                @foreach ($vlist->getCategoryCats()->get() ?? [] as $vcat)
                                                    <li>
                                                        <a class="transition"
                                                            href="{{ url('slugweb', ['slug' => $vcat['slugvi']]) }}"
                                                            title="{{ $vcat['namevi'] }}">
                                                            {{ $vcat['namevi'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li><a class="transition {{ ($com ?? '') == 'dat-hang' ? 'active' : '' }}" href="dat-hang"
                            title="{{ __('web.dathang') }}"><span>{{ __('web.dathang') }}</span></a></li>
                    <li><a class="transition {{ ($com ?? '') == 'du-an' ? 'active' : '' }}" href="du-an"
                            title="{{ __('web.duan') }}"><span>{{ __('web.duan') }}</span></a></li>
                    <li>
                        <a class="transition {{ ($com ?? '') == 'tin-tuc' ? 'active' : '' }}" href="tin-tuc"
                            title="{{ __('web.tintuc') }}"><span>{{ __('web.tintuc') }}</span></a>
                        @if (!empty($listNewsMenu))
                            <ul>
                                @foreach ($listNewsMenu ?? [] as $vlist)
                                    <li>
                                        <a class="transition" href="{{ url('slugweb', ['slug' => $vlist['slugvi']]) }}"
                                            title="{{ $vlist['namevi'] }}">
                                            {{ $vlist['namevi'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                    <li><a class="transition {{ ($com ?? '') == 'lien-he' ? 'active' : '' }}"
                            href="{{ url('lien-he') }}"
                            title="{{ __('web.lienhe') }}"><span>{{ __('web.lienhe') }}</span></a></li>
                </ul>
            </div>
        </div>
        <div class="menures_footer">

        </div>
    </div>
</div>
