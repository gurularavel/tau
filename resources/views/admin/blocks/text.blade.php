{{-- Text Block --}}
<div class="block block-text mb-4" data-block-type="text">
    <div class="content text-{{ $block->settings['alignment'] ?? 'left' }}">
        {!! $block->content !!}
    </div>
</div>
