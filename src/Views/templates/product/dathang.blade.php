@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3">
            <div class="title-main">
                <span>{{ $titleMain }}</span>
            </div>

            @foreach ($productAll as $klist => $vlist)
                <div class="position-relative">
                    <div class="child__news__title">
                        <span>{{ $vlist->namevi }}</span>
                        <div class="d-md-flex d-none">
                            @if ($vlist->getCategoryCats()->get()->isNotEmpty())
                                @foreach ($vlist->getCategoryCats()->get() ?? [] as $vcat)
                                    <a href="{{ $vcat->slugvi }}"
                                        class="child__news__btn text-decoration-none transition mx-3">
                                        {{ $vcat->namevi }}
                                    </a>
                                    <strong>|</strong>
                                @endforeach
                            @endif
                            <a href="{{ $vlist->slugvi }}" class="child__news__btn text-decoration-none transition ms-3">
                                Xem thêm <i class="fa-sharp fa-solid fa-caret-right"></i>
                            </a>
                        </div>
                    </div>
                    @if ($vlist->getItems()->get()->isNotEmpty())
                        <div class="row row-20">
                            @foreach ($vlist->getItems()->get() ?? [] as $v)
                                <div class="col-lg-3 col-md-4 col-6 col-20">
                                    @component('component.itemProduct', ['product' => $v])
                                        <div class="attr-content-pro-detail d-none">
                                            <div class="quantity-pro-detail">
                                                <span class="quantity-minus-pro-detail">-</span>
                                                <input type="text" class="qty-pro !outline-none !shadow-none !ring-0"
                                                    min="1" value="1" readonly="">
                                                <span class="quantity-plus-pro-detail">+</span>
                                            </div>
                                        </div>
                                        <div class="item-product-cart">
                                            <a class="transition addcart text-decoration-none buynow"
                                                data-id="{{ $v['id'] }}" data-action="buynow">
                                                <i class="fa-sharp fa-regular fa-cart-plus"></i>
                                            </a>
                                        </div>
                                    @endcomponent
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@endsection
