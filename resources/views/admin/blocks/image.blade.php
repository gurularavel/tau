{{-- Image Block --}}
<div class="block block-image mb-4" data-block-type="image">
    @php
        $alignment = $block->settings['alignment'] ?? 'center';
        $width = $block->settings['width'] ?? '100%';
        $hasCaption = $block->settings['has_caption'] ?? false;
        $isRounded = $block->settings['is_rounded'] ?? false;
    @endphp
    
    <div class="text-{{ $alignment }}">
        <img src="{{ $block->image }}" 
             alt="{{ $block->title ?? 'Image' }}" 
             class="img-fluid {{ $isRounded ? 'rounded' : '' }}"
             style="max-width: {{ $width }};">
        
        @if($hasCaption && $block->title)
            <p class="image-caption text-muted mt-2">{{ $block->title }}</p>
        @endif
    </div>
</div>
