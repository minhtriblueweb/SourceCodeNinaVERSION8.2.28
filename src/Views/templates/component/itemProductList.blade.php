<div class="item-category" ata-aos="fade-up" data-aos-duration="1000">
    <div class="row-category">
        <div class="col-category image-category">
            <a class="pic-category text-decoration-none scale-img hover-img"
                href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}" title="{{ $product['namevi'] }}">
                <img class="w-100" onerror="this.src='{{ thumbs('thumbs/645x400x1/assets/images/noimage.png') }}';"
                    src="{{ assets_photo('product', '645x400x1', $product['photo'], 'thumbs') }}"
                    alt="{{ $product['namevi'] }}">
            </a>
        </div>
        <div class="col-category info-category">
            <h3 class="mb-0">
                <a class="text-split text-decoration-none transition name-category"
                    href="{{ url('slugweb', ['slug' => $product['slugvi']]) }}"
                    title="{{ $product['namevi'] }}">{{ $product['namevi'] }}</a>
            </h3>
            <div class="content-category">
                <div class="content-main w-clear"> {!! Func::decodeHtmlChars($product['descvi']) !!}</div>
            </div>
            <div class="gt_xemthem gt_xemthem_category mt-1">
                <a href="{{ $product['slugvi'] }}" class="text-decoration-none"
                    title="{{ __('web.xemthem') }}">{{ __('web.xemthem') }}</a>
            </div>
        </div>
    </div>
</div>
