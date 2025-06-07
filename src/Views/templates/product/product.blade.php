@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3">
            <div class="title-main">
                <span>{{ $titleMain }}</span>
                <div class="filter"><i class="fa-solid fa-filter"></i>&nbsp; Lọc </div>
            </div>
            @if (isset($dm_cap2) && $dm_cap2->isNotEmpty())
                <div class="row row-20">
                    @foreach ($dm_cap2 as $v)
                        <div class="col-lg-3 col-md-4 col-6 col-20">
                            <div class="product">
                                <div class="pic-product">
                                    <a class="scale-img hover-img aspect-[300/300]"
                                        href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}" title="{{ $v['namevi'] }}">
                                        <img onerror="this.src='{{ thumbs('thumbs/300x300x1/assets/images/noimage.png') }}';"
                                            src="{{ assets_photo('product', '300x300x1', $v['photo'], 'watermarks') }}"
                                            alt="{{ $v['namevi'] }}">
                                    </a>
                                </div>
                                <div class="info-product">
                                    <h3 class="mb-0">
                                        <a class="text-split text-decoration-none name-product transition h-auto"
                                            href="{{ url('slugweb', ['slug' => $v['slugvi']]) }}"
                                            title="{{ $v['namevi'] }}">{{ $v['namevi'] }}</a>
                                    </h3>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($itemList['contentvi']))
                <div class="content-text">{!! Func::decodeHtmlChars($itemList['contentvi']) !!}</div>
            @endif

            @if (!empty($product))
                <div class="row row-20">
                    @foreach ($product as $v)
                        <div class="col-lg-3 col-md-4 col-6 col-20">
                            @component('component.itemProduct', ['product' => $v])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
            @endif
            {!! $product->appends(request()->query())->links() !!}
        </div>
    </section>
@endsection
