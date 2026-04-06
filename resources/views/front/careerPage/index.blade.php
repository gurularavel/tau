<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'careerPage'" :image="$careerPage->image">
    <style>
        .breadcrumb.background {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.4) 0%, #000000 100%),
                        url({{ getImage('careerPage', $careerPage->image) }});
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            height: 400px;
            display: flex;
            align-items: center;
            color: #ffffff;
        }

        .breadcrumb h1 {
            font-weight: 700;
            font-size: 42px;
            margin-bottom: 15px;
        }

        .breadcrumb p {
            max-width: 700px;
            font-weight: 400;
            font-size: 18px;
            line-height: 1.6;
        }

        .vacancies-section {
            padding: 60px 0;
        }

        .vacancy-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .vacancy-table thead th {
            padding: 15px;
            background-color: #f8f9fa;
            color: #333;
            font-weight: 600;
            border-bottom: 2px solid #dee2e6;
        }

        .vacancy-table tbody tr {
            background: #ffffff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .vacancy-table tbody tr:hover {
            transform: translateY(-2px);
            background-color: #fcfcfc;
        }

        .vacancy-table td {
            padding: 20px 15px;
            vertical-align: middle;
        }

        .status-badge {
            background: #e9ecef;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 14px;
            color: #495057;
        }

        .deadline-text {
            color: #dc3545; /* Diqqət çəkməsi üçün qırmızıya yaxın */
            font-weight: 500;
        }

        .btn-view {
            color: #0056b3;
            font-weight: 600;
            text-decoration: none;
        }
    </style>

    <section class="breadcrumb background container-fluid">
        <div class="container">
            <h1>{{ $careerPage->title ?? '' }}</h1>
            <p>
                {!! $careerPage->description ?? '' !!}
            </p>
        </div>
    </section>

    <section class="vacancies-section container">
        <div class="table-responsive">
            <table class="vacancy-table">
                <thead>
                    <tr>
                        <th style="width: 80px;">No</th>
                        <th>{{ __('translate.Position') }}</th>
                        <th>{{ __('translate.Status') }}</th>
                        <th>{{ __('translate.Deadline') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vacancies as $key => $vacancy)

                        <tr>
                            <td><strong>{{ $key + 1 }}</strong></td>
                            <td>
                                <a href="{{ route('front.careerPage.show', $vacancy->slug) }}" class="btn-view">
                                    {{ $vacancy->title ?? '---' }}
                                </a>
                            </td>
                            <td>
                                <span class="status-badge">
                                    {{ $vacancy->status_text ?? '---' }}
                                </span>
                            </td>
                            <td>
                                <span class="deadline-text">
                                    <i class="far fa-calendar-alt me-1"></i>
                                    {{ $vacancy->deadline ? $vacancy->deadline->format('d.m.Y') : '---' }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-5">
                                <img src="{{ asset('assets/front/images/error-file.png') }}" alt="" style="width: 100px; opacity: 0.5;">
                                <p class="mt-3 text-muted">{{ __('translate.No vacancies available at the moment') }}</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
</x-front.layout>
