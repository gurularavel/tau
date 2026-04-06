<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="single-vacancy container my-5">
        <div class="main-desc">
            <h1 class="display-5 fw-bold">{{ $vacancy->title ?? '' }}</h1>
            <div class="mb-3">
                <span class="badge bg-secondary">{{ $vacancy->status_text }}</span>
                <span class="text-danger ms-3">
                    <i class="far fa-calendar-alt"></i> {{ __('translate.Deadline') }}: {{ $vacancy->deadline ? $vacancy->deadline->format('d.m.Y') : '---' }}
                </span>
            </div>
            <p class="lead">{{ $vacancy->description ?? '' }}</p>
        </div>

        <div class="responsibilities mt-4">
            {!! $vacancy->content !!}
        </div>

        <button type="button" class="btn btn-danger btn-lg rounded-pill px-5 mt-4" data-bs-toggle="modal" data-bs-target="#applyModal">
            {{ __('translate.Apply') }}
        </button>

        <div class="mb-3">
                <span class="text-danger ms-3">
                    <i class="far fa-calendar-alt"></i> {{ __('translate.View count') }}: {{$vacancy->view_counts ?? 0 }}
                </span>
            </div>
    </section>

    <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <div class="modal-content border-0 shadow-lg" style="border-radius: 15px;">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold" id="applyModalLabel">{{ __('translate.Submit Your Application') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cvUploadForm" action="{{ route('vacancy.upload.cv', $vacancy->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">{{ __('translate.Upload CV (PDF, DOCX)') }} *</label>
                            <input type="file" name="cv" class="form-control form-control-lg" accept=".pdf,.doc,.docx" required>
                            <div id="formResponse" class="mt-3"></div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0 pt-0">
                        <button type="submit" class="btn btn-danger btn-lg w-100 rounded-3" id="submitBtn">
                            {{ __('translate.Send Application') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#cvUploadForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let btn = $('#submitBtn');

                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Göndərilir...');

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $('#formResponse').html('<div class="alert alert-success border-0">' + res.message + '</div>');
                        setTimeout(() => {
                            var myModalEl = document.getElementById('applyModal');
                            var modal = bootstrap.Modal.getInstance(myModalEl);
                            modal.hide();
                            $('#cvUploadForm')[0].reset();
                            $('#formResponse').html('');
                        }, 2000);
                    },
                    error: function() {
                        $('#formResponse').html('<div class="alert alert-danger border-0">Xəta baş verdi!</div>');
                    },
                    complete: function() {
                        btn.prop('disabled', false).text('{{ __("translate.Send Application") }}');
                    }
                });
            });
        });
    </script>

</x-front.layout>
