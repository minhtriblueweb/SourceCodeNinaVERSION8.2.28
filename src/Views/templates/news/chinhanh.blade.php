@extends('layout')
@section('content')
    <section>
        <div class="wrap-content py-3">
            <div class="title-main">
                <span>{{ $titleMain }}</span>
            </div>

            <div class="input-cart mb-3">
                <select class=" form-select form-control text-sm">
                    <option value="">Chọn Tỉnh / Thành</option>
                    @foreach ($newsList ?? [] as $k => $v)
                        <option value="{{ $v->id }}">{{ $v['namevi'] }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">Vui lòng chọn Tỉnh / Thành</div>
            </div>

            @if ($news->isNotEmpty())
                <div class="chinhanh-footer" id="chinhanh--index">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="chinhanh-left mb-3">
                            <div class="chinhanh-contain">
                                <div class="layout-chinhanh-item">
                                    @foreach ($news as $v)
                                        <div class="chinhanh-item js--chinhanh-item" data-id="{{ $v->id }}"
                                            data-url="{{ url('show-chi-nhanh') }}">
                                            <div class="chinhanh-item-left">
                                                <img onerror="this.src='{{ thumbs('thumbs/60x60x2/assets/images/noimage.png') }}';"
                                                    src="{{ assets_photo('news', '60x60x2', $v['photo'], 'thumbs') }}"
                                                    alt="{{ $v->namevi }}">
                                            </div>
                                            <div class="chinhanh-item-right">
                                                <h3 class="name-chinhanh-item text-split">{{ $v->namevi }}</h3>
                                                <p class="desc-chinhanh-item text-split"><i
                                                        class="fa-sharp fa-solid fa-location-dot text-warning pe-1"></i> Địa
                                                    chỉ:
                                                    {{ $v->address }}</p>
                                                <p class="desc-chinhanh-item mb-0"><i
                                                        class="fa-sharp fa-solid fa-phone text-warning pe-1"></i> Điện
                                                    thoại:
                                                    {{ $v['phone'] }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="chinhanh-right mb-3">
                            <div class="show-chi-nhanh">loading</div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
