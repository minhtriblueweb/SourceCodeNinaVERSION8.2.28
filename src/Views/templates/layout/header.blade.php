<div class="header">
    <div class="wrap-content">
        <div class="header__layout">
            <div class="header__start">
                <div class="effect-run">
                    @if (!empty($logoPhoto))
                        <a href="" class="logo text-decoration-none d-inline-block">
                            <img onerror="this.src='{{ thumbs('thumbs/146x126x2/assets/images/noimage.png') }}';"
                                src="{{ assets_photo('photo', '146x126x2', $logoPhoto->photo ?? '', 'thumbs') }}"
                                alt="{{ $setting->namevi }}">
                        </a>
                    @endif
                </div>
            </div>
            <div class="header__end">
                <div class="topbar">
                    <h2 class="title-web">{{ $setting->namevi }}</h2>
                    <div class="topbar__right">
                        <div class="item-topbar">
                            <div class="item-topbar-image">
                                <img src="assets/images/h-call.png" alt="icon">
                            </div>
                            <div class="item-topbar-info">
                                <span class="item-topbar-name d-block">Hotline</span>
                                <span class="item-topbar-content">{{ Func::formatPhone($optSetting['hotline']) }}</span>
                            </div>
                        </div>

                        <a href="gio-hang" class=" text-decoration-none item-topbar ms-4"
                            title="{{ __('web.giohang') }}">
                            <div class="item-topbar-image">
                                <img src="assets/images/h-cart.png" alt="icon">
                            </div>
                            <div class="item-topbar-info">
                                <span class="item-topbar-name d-block">{{ __('web.giohang') }}</span>
                                <p class="mb-0 d-flex align-items-center">( <span
                                        class="item-topbar-content count-cart">{{ Cart::count() }} </span>)
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
                @include('layout.menu')
            </div>
        </div>
    </div>

    @include('layout.mmenu')
</div>
