<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <style>
        .custom-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            display: none;
            /* İlkin olaraq gizli */
            align-items: center;
            justify-content: center;
            z-index: 9999;
            backdrop-filter: blur(4px);
        }

        .custom-modal-content {
            background: #ffffff;
            width: 90%;
            max-width: 500px;
            border-radius: 20px;
            padding: 30px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: modalFadeIn 0.3s ease-out;
        }

        @keyframes modalFadeIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 24px;
            cursor: pointer;
            color: #121212;
            border: none;
            background: none;
        }

        .modal-header-title {
            font-weight: 600;
            font-size: 24px;
            color: #121212;
            margin-bottom: 20px;
        }

        .custom-form-group {
            margin-bottom: 20px;
        }

        .custom-form-group label {
            display: block;
            font-weight: 500;
            font-size: 16px;
            color: #212121;
            margin-bottom: 8px;
        }

        .custom-file-input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
        }

        /* Sənin ".apply" stilinlə eyni olan göndər düyməsi */
        .modal-submit-btn {
            width: 100%;
            height: 48px;
            border-radius: 60px;
            background: #d63832;
            border: none;
            color: #ffffff;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .modal-submit-btn:hover {
            background: #b52f2a;
        }

        .modal-submit-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        #formResponse {
            margin-top: 15px;
            font-size: 14px;
            text-align: center;
        }
    </style>

    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="single-vacancy container my-5">
        <div class="main-desc">
            <h1>{{ $vacancy->title ?? '' }}</h1>
            <p>{{ $vacancy->description ?? '' }}</p>
        </div>

        <div class="responsibilities">
            {!! $vacancy->content !!}
        </div>

        <a href="javascript:void(0)" class="apply" id="openModalBtn">
            {{ __('translate.Apply') }}
        </a>

        <div class="mt-3">
            <span class="text-danger">
                <i class="far fa-calendar-alt"></i> {{ __('translate.View count') }}: {{ $vacancy->view_counts ?? 0 }}
            </span>
        </div>
    </section>

    <div class="custom-modal-overlay" id="modalOverlay">
        <div class="custom-modal-content">
            <button class="modal-close-btn" id="closeModalBtn">&times;</button>
            <div class="modal-header-title">{{ __('translate.Submit Your Application') }}</div>

            <form id="cvUploadForm" action="{{ route('vacancy.upload.cv', $vacancy->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="custom-form-group">
                    <label>{{ __('translate.Upload CV (PDF, DOCX)') }} *</label>
                    <input type="file" name="cv" class="custom-file-input" accept=".pdf,.doc,.docx" required>
                </div>

                <button type="submit" class="modal-submit-btn" id="submitBtn">
                    {{ __('translate.Send Application') }}
                </button>

                <div id="formResponse"></div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const overlay = $('#modalOverlay');

            // Modalı aç
            $('#openModalBtn').on('click', function() {
                overlay.css('display', 'flex');
            });

            // Modalı bağla
            $('#closeModalBtn, #modalOverlay').on('click', function(e) {
                if (e.target === this) {
                    overlay.hide();
                }
            });

            // Formu göndər
            $('#cvUploadForm').on('submit', function(e) {
                e.preventDefault();
                let formData = new FormData(this);
                let btn = $('#submitBtn');

                btn.prop('disabled', true).text('...');

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        $('#formResponse').html('<span style="color: green;">' + res.message +
                            '</span>');
                        setTimeout(() => {
                            overlay.hide();
                            $('#cvUploadForm')[0].reset();
                            $('#formResponse').html('');
                        }, 2000);
                    },
                    error: function(xhr) {
                        let errorMessage = '{{ __('translate.An error occurred!') }}';

                        // Əgər Laravel validasiya xətası (422) qaytarıbsa
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            // İlk gələn xətanı mesaj kimi götürürük
                            errorMessage = Object.values(errors)[0][0];
                        } else if (xhr.responseJSON && xhr.responseJSON.message) {
                            // Digər xüsusi server mesajları (məsələn: 400 və ya 500 xətası)
                            errorMessage = xhr.responseJSON.message;
                        }

                        $('#formResponse').html(
                            '<span style="color: #d63832; font-weight: 500;">' +
                            errorMessage + '</span>');
                    },
                    complete: function() {
                        btn.prop('disabled', false).text(
                            '{{ __('translate.Send Application') }}');
                    }
                });
            });
        });
    </script>

</x-front.layout>
