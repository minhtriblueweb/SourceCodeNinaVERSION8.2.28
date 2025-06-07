<div class="d-flex flex-wrap" data-aos="fade-up" data-aos-duration="1000">
    <a class="pic-news scale-img hover-img text-decoration-none" href="{{ url('slugweb', ['slug' => $news->slugvi]) }}"
        title="{{ $news->namevi }}">
        <img class="w-100" onerror="this.src='{{ thumbs('thumbs/210x144x1/assets/images/noimage.png') }}"
            src="{{ assets_photo('news', '210x144x1', $news->photo, 'thumbs') }}" alt="{{ $news->namevi }}"
            title="{{ $news->namevi }}" />
    </a>
    <div class="info-news pt-md-2">
        <h3>
            <a class="name-news transition text-decoration-none text-split"
                href="{{ url('slugweb', ['slug' => $news->slugvi]) }}"
                title="{{ $news->namevi }}">{{ $news->namevi }}</a>
        </h3>
        <p class="desc-news text-split mb-0">{{ $news->descvi }}</p>
        {!! $slot !!}
    </div>
</div>
