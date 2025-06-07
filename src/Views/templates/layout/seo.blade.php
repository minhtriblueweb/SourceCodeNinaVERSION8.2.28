<ul class="h-card hidden">
    <li class="h-fn fn">{!! $setting['namevi'] !!}</li>
    <li class="h-org org">{!! $setting['namevi'] !!}</li>
    <li class="h-tel tel">{{ preg_replace('/[^0-9]/', '', $optSetting['hotline']) }}</li>
    <li><a class="u-url ul" href="{{ Seo::get('url') }}">{{ Seo::get('url') }}</a></li>
</ul>
<h1 class="hidden-seoh hidden">{{ Seo::get('h1') }}</h1>
