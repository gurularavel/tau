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
            fontNames: [
                'Arial', 'Arial Black', 'Comic Sans MS', 'Courier New',
                'Georgia', 'Impact', 'Inter', 'Lato', 'Montserrat',
                'Nunito', 'Open Sans', 'Poppins', 'Roboto',
                'Tahoma', 'Times New Roman', 'Trebuchet MS', 'Verdana'
            ],
            fontNamesIgnoreCheck: true
        });

        $('body').on('click', '.note-popover .dropdown-menu', function (e) {
            e.stopPropagation();
        });
    @endforeach
});
</script>
