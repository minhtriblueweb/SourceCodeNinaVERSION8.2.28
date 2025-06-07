@extends('layout')
@section('content')
    <section>
        <div class="max-width py-3">
            <div class="title-main">
                <span>{{ $titleMain }}</span>
                <div class="filter"><i class="fa-solid fa-filter"></i>&nbsp; Lọc </div>
            </div>
            @if (!empty($product))
                <div class="category">
                    @foreach ($product as $k => $v)
                        @component('component.itemProductList', ['product' => $v])
                        @endcomponent
                    @endforeach
                </div>
            @endif
            {!! $product->appends(request()->query())->links() !!}
        </div>
    </section>
@endsection
