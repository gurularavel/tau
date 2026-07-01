@foreach($items as $item)
<div class="media-element">
    <div class="media-image">
        <img src="{{ getImage('news', $item->image) }}" alt="{{ $item->title }}" />
    </div>
    <div class="media-element-content">
        <h3>
            <a href="{{ route('front.news.show', $item->slug) }}">
                {{ $item->title }}
            </a>
        </h3>
        @if($item->created_at)
        <span class="media-date">
            <img src="{{ asset('assets/front/icons/calendar-black-bg.svg') }}" alt="" />
            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}
        </span>
        @endif
        <p>
            {{ Str::limit($item->description, 120) }}
        </p>
    </div>
</div>

@endforeach
