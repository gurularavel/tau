@props(['locales', 'key', 'height' => '300'])

<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach ($locales as $locale)
        $('#summary-ckeditor-{{ $locale }}-{{$key}}').summernote({
            height: {{$height}},
            toolbar: [
                ['style', ['style']],
                ['font', ['fontname', 'fontsize', 'fontsizeunit', 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
                ['color', ['color']],
                ['lineheight', ['lineHeight']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['misc', ['undo', 'redo']],
                ['view', ['codeview', 'help']]
            ],
             fontNames: ['Inter'],
            fontNamesIgnoreCheck: ['Inter']
        });

        $('body').on('click', '.note-popover .dropdown-menu', function (e) {
            e.stopPropagation();
        });
    @endforeach
});
</script>
