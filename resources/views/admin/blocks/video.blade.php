{{-- Video Block --}}
<div class="block block-video mb-4" data-block-type="video">
    @php
        $autoplay = $block->settings['autoplay'] ?? false;
        $controls = $block->settings['controls'] ?? true;
        $loop = $block->settings['loop'] ?? false;
        
        // YouTube/Vimeo embed URL-ni çevir
        $embedUrl = $block->video_url;
        if (str_contains($embedUrl, 'youtube.com') || str_contains($embedUrl, 'youtu.be')) {
            preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\?\/]+)/', $embedUrl, $matches);
            if (isset($matches[1])) {
                $embedUrl = "https://www.youtube.com/embed/{$matches[1]}";
            }
        } elseif (str_contains($embedUrl, 'vimeo.com')) {
            preg_match('/vimeo\.com\/(\d+)/', $embedUrl, $matches);
            if (isset($matches[1])) {
                $embedUrl = "https://player.vimeo.com/video/{$matches[1]}";
            }
        }
    @endphp
    
    @if($block->title)
        <h5 class="mb-3">{{ $block->title }}</h5>
    @endif
    
    <div class="ratio ratio-16x9">
        <iframe src="{{ $embedUrl }}" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
        </iframe>
    </div>
</div>
