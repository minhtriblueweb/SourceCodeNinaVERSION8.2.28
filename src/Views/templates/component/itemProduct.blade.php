<div class="product" ata-aos="fade-up" data-aos-duration="1000">
    <div class="pic-product">
        <a class="scale-img hover-img aspect-[300/300]" href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
            title="{{ $product['namevi'] }}">
            <img onerror="this.src='{{ thumbs('thumbs/300x300x1/assets/images/noimage.png') }}';"
                src="{{ assets_photo('product', '300x300x1', $product['photo'], 'watermarks') }}"
                alt="{{ $product['namevi'] }}">
        </a>
    </div>
    <div class="info-product">
        <h3 class="mb-0">
            <a class="text-split text-decoration-none name-product transition"
                href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
                title="{{ $product['namevi'] }}">{{ $product['namevi'] }}</a>
        </h3>
        <p class="price-product">
            @if (empty($product->sale_price))
                @if (empty($product->regular_price))
                    <span>Giá: </span>
                    <span class="price-new">Liên hệ</span>
                @else
                    <span>Giá: </span>
                    <span class="price-new">{{ Func::formatMoney($product->regular_price) }}</span>
                @endif
            @else
                <span class="price-old">{{ Func::formatMoney($product->regular_price) }}</span>
                <span class="price-new">{{ Func::formatMoney($product->sale_price) }}</span>
            @endif
        </p>
    </div>
    {!! $slot !!}
</div>
