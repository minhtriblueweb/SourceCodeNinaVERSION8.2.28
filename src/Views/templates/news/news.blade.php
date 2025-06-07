@extends('layout')
@section('content')
    <section>
        @if ($news->isNotEmpty())
            <div class="max-width padding-top-bottom">
                <div class="row">
                    @foreach ($news as $k => $v)
                        <div class="col-md-6 mb-3">
                            @component('component.itemNews', ['news' => $v])
                            @endcomponent
                        </div>
                    @endforeach
                </div>
                {!! $news->links() !!}
            </div>
        @endif
    </section>
@endsection
