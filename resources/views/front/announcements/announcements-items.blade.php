@foreach($items as $item)
<div class="media-element">
    <div class="media-image">
        <img src="{{ getImage('announcements', $item->image) }}" alt="{{ $item->title }}" />
    </div>
    <div class="media-element-content">
        <h3>
            <a href="{{ route('front.announcements.show', $item->slug) }}">
                {{ $item->title }}
            </a>
        </h3>
        <p>
            {{ Str::limit($item->description, 120) }}
        </p>
    </div>
</div>

@endforeach
