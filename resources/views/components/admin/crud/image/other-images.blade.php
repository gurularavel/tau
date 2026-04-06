@props(['title', 'model', 'routeName', 'imageFolder'])

<div>
    {{-- Başlıq və düymə --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h5 class="fs-14 mb-1">{{ $title ?? '' }} {{ __('translate.Gallery') }}</h5>
            <p class="text-muted mb-0">{{ __('translate.add') }} {{ $title ?? '' }} {{ __('translate.Gallery images') }}</p>
        </div>

        <a href="{{ route('admin.'. $routeName. '.order-images', $model) }}" class="btn btn-warning">
            {{ __('translate.Sorting images') }}
        </a>
    </div>

    {{-- Fayl seçimi --}}
    <input type="file" id="imageUpload" name="images[]" multiple class="form-control mb-3" accept="image/*">

    {{-- Şəkillər konteyneri --}}
    <ul class="list-unstyled mb-0" id="imagePreviewList">
        {{-- Əvvəl yüklənmiş şəkillər --}}
        @if ($model && $model->images)
            @foreach ($model->images as $image)
                <li class="media-card mb-2" data-media-id="{{ $image->id }}">
                    <div class="border rounded p-2 d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <img src="{{ asset('uploads/' . $imageFolder . '/' . $image->image) }}"
                                 width="120" height="120" style="border-radius: 10px; object-fit: cover;">
                            <span>{{ $image->image }}</span>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger remove-existing" data-media-id="{{ $image->id }}">
                            {{ __('translate.Delete') }}
                        </button>
                    </div>
                </li>
            @endforeach
        @endif
    </ul>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('imageUpload');
    const previewList = document.getElementById('imagePreviewList');
    let selectedFiles = []; // input-dakı faylları izləmək üçün array

    // Yeni şəkillər seçildikdə preview göstər
    input.addEventListener('change', function(e) {
        selectedFiles = Array.from(e.target.files); // yeni seçilənlər

        previewList.querySelectorAll('.temp-image').forEach(el => el.remove()); // köhnə preview-ləri təmizlə

        selectedFiles.forEach((file, index) => {
            const url = URL.createObjectURL(file);
            const li = document.createElement('li');
            li.classList.add('media-card', 'mb-2', 'temp-image');

            li.innerHTML = `
                <div class="border rounded p-2 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="${url}" width="120" height="120" style="border-radius:10px; object-fit:cover;">
                        <span>${file.name}</span>
                    </div>
                    <button type="button" class="btn btn-sm btn-danger remove-new" data-index="${index}">
                        {{ __('translate.Delete') }}
                    </button>
                </div>
            `;
            previewList.appendChild(li);
        });
    });

    // Yeni seçilmiş şəkilləri sil (input-dan və preview-dən)
    $(document).on('click', '.remove-new', function(e) {
        e.preventDefault();
        const index = $(this).data('index');
        selectedFiles.splice(index, 1); // array-dən sil

        // Yeni input fayl siyahısı yarat
        const dt = new DataTransfer();
        selectedFiles.forEach(file => dt.items.add(file));
        input.files = dt.files; // input-u yenilə

        $(this).closest('.media-card').remove(); // preview-dən sil
    });

    // Əvvəl yüklənmiş şəkilləri sil (AJAX)
    $(document).on('click', '.remove-existing', function(e) {
        e.preventDefault();
        e.stopPropagation();

        const mediaId = $(this).data('media-id');
        const $card = $(this).closest('.media-card');

        $.ajax({
            url: '{{ route('admin.remove-' . $routeName . '-media') }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { mediaId },
            success: function(response) {
                if (response.success) {
                    $card.remove();
                } else {
                    alert('Failed to delete the media. Please try again.');
                }
            },
            error: function() {
                alert('An error occurred. Please try again.');
            }
        });
    });
});
</script>
