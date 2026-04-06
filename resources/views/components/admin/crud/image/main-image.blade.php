@props(['columnValue','name', 'folderName','title' => null])
@php
    $isVideo = false;
    $extension = null;
    if ($columnValue) {
        $extension = strtolower(pathinfo($columnValue, PATHINFO_EXTENSION));
        $videoExtensions = ['mp4', 'webm', 'ogg', 'avi', 'mov', 'mkv'];
        $isVideo = in_array($extension, $videoExtensions);
    }
        $uniqueId = uniqid('media_');

@endphp
<h1>{{ $title ?? '' }}</h1>
<div class="mb-4">
    <div class="text-center" id="product-preview-container-{{ $uniqueId }}">
    @if($columnValue)
        @if($isVideo)
            <video style="border-radius: 15px;" width="300" height="300" controls>
                <source src="{{ asset('uploads/'.$folderName.'/'.$columnValue) }}" type="video/{{ $extension }}">
            </video>
        @else
            <img style="border-radius: 15px; cursor: zoom-in;" src="{{ asset('uploads/'.$folderName.'/'.$columnValue) }}" width="300" data-fancybox="gallery"/>
        @endif
    @else
        <img style="border-radius: 15px; cursor: zoom-in;" src="{{ asset('/assets/admin/images/product-img.png') }}" width="300" data-fancybox="gallery"/>
    @endif
</div>

<div class="d-flex justify-content-end">

<input class="form-control" id="product-media-input-{{ $uniqueId }}"  type="file" accept="image/*,video/*" name="{{ $name }}" >
</div>

</div>
