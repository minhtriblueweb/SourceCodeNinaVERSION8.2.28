<div class="w-menu">
    <div class="menu">
        <ul class="menu-main">
            <li><a class="transition" href="" title="{{ __('web.home') }}"><span>{{ __('web.home') }}</span></a>
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
            <li><a class="transition {{ ($com ?? '') == 'lien-he' ? 'active' : '' }}" href="{{ url('lien-he') }}"
                    title="{{ __('web.lienhe') }}"><span>{{ __('web.lienhe') }}</span></a></li>

            <div class="search w-clear">
                <input class="form-control" type="text" id="keyword" placeholder="{{ __('web.timkiemsanpham') }}"
                    onkeypress="doEnter(event,'keyword');"
                    value="{{ !empty($_GET['keyword']) ? $_GET['keyword'] : '' }}" />
                <p onclick="onSearch('keyword');">
                    <img src="assets/images/h-search.png" alt="Search">
                </p>
            </div>
        </ul>
    </div>
</div>
