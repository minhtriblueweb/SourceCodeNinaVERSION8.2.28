@extends('layout')
@section('content')
    <section>
        @if ($news->isNotEmpty())
            <div class="max-width py-3">
                <div class="title-main">
                    <span>{{ $titleMain }}</span>
                </div>
                @foreach ($news as $klist => $vlist)
                    <div class="position-relative">
                        <div class="child__news__title">
                            <span>{{ $vlist->namevi }}</span>
                            <a href="{{ $vlist->slugvi }}" class="child__news__btn text-decoration-none transition">
                                Xem thêm <i class="fa-sharp fa-solid fa-caret-right"></i>
                            </a>
                        </div>
                        @if ($vlist->getItems()->get()->isNotEmpty())
                            <div class="row">
                                @foreach ($vlist->getItems()->get() ?? [] as $v)
                                    <div class="col-md-6 mb-3">
                                        @component('component.itemNews', ['news' => $v])
                                        @endcomponent
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
                {!! $news->links() !!}
            </div>
        @endif
    </section>
@endsection
