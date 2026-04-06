<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/media/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="academic-calendar container">
        <h3>{{ __('translate.Academic calendar') }}</h3>

        <form action="{{ route('front.academic_calendar.index') }}" method="GET" id="filter-form">
            <div class="calendar-filters">

                {{-- Filter: Akademik İl --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Academic Year') }}</span></div>
                            <div class="selected-value">{{ request('academic_year') ?: 'Hamısı' }}</div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($academicYears as $year)
                            <div class="option" data-value="{{ $year }}">{{ $year }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="academic_year" value="{{ request('academic_year') }}">
                </div>

                {{-- Filter: Semestr --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Semester') }}</span></div>
                            <div class="selected-value">
                                {{ $semesters->firstWhere('id', request('semester_id'))?->translate(app()->getLocale())->name ?? 'Hamısı' }}
                            </div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($semesters as $semester)
                            <div class="option" data-value="{{ $semester->id }}">{{ $semester->translate(app()->getLocale())->name }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="semester_id" value="{{ request('semester_id') }}">
                </div>

                {{-- Filter: Tədris pilləsi --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Education Level') }}</span></div>
                            <div class="selected-value">
                                {{ $levels->firstWhere('id', request('education_level_id'))?->translate(app()->getLocale())->name ?? 'Hamısı' }}
                            </div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($levels as $level)
                            <div class="option" data-value="{{ $level->id }}">{{ $level->translate(app()->getLocale())->name }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="education_level_id" value="{{ request('education_level_id') }}">
                </div>

                {{-- Filter: Fakültə --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Faculty') }}</span></div>
                            <div class="selected-value">
                                {{ $faculties->firstWhere('id', request('faculty_id'))?->translate(app()->getLocale())->name ?? 'Hamısı' }}
                            </div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($faculties as $faculty)
                            <div class="option" data-value="{{ $faculty->id }}">{{ $faculty->translate(app()->getLocale())->name }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="faculty_id" value="{{ request('faculty_id') }}">
                </div>

                {{-- Filter: Tədris forması --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Education Type') }}</span></div>
                            <div class="selected-value">
                                {{ $types->firstWhere('id', request('education_type_id'))?->translate(app()->getLocale())->name ?? 'Hamısı' }}
                            </div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($types as $type)
                            <div class="option" data-value="{{ $type->id }}">{{ $type->translate(app()->getLocale())->name }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="education_type_id" value="{{ request('education_type_id') }}">
                </div>

                {{-- Filter: Tədbir növü --}}
                <div class="filter-wrapper">
                    <div class="filter-all">
                        <div class="texts">
                            <div class="label-row"><span class="label-text">{{ __('translate.Event Type') }}</span></div>
                            <div class="selected-value">
                                {{ $eventTypes->firstWhere('id', request('event_type_id'))?->translate(app()->getLocale())->name ?? 'Hamısı' }}
                            </div>
                        </div>
                        <div class="icon-wrapper"><img src="{{ asset('assets/front/icons/arrow-down.svg') }}" alt="arrow" /></div>
                    </div>
                    <div class="options-menu">
                        <div class="option" data-value="">Hamısı</div>
                        @foreach($eventTypes as $eType)
                            <div class="option" data-value="{{ $eType->id }}">{{ $eType->translate(app()->getLocale())->name }}</div>
                        @endforeach
                    </div>
                    <input type="hidden" name="event_type_id" value="{{ request('event_type_id') }}">
                </div>

            </div>
        </form>

        {{-- AJAX ilə yenilənəcək cədvəl hissəsi --}}
        <div class="calendar table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translate.Subject') }}</th>
                        <th>{{ __('translate.Academic Year') }}</th>
                        <th>{{ __('translate.Semester') }}</th>
                        <th>{{ __('translate.Education Level') }}</th>
                        <th>{{ __('translate.Faculty') }}</th>
                        <th>{{ __('translate.Education Type') }}</th>
                        <th>{{ __('translate.Event Type') }}</th>
                        <th>{{ __('translate.Event Date') }}</th>
                        <th>{{ __('translate.Remaining days') }}</th>
                    </tr>
                </thead>
                <tbody id="calendar-table-body">
                    @include('front.academicCalendar.partials.table')
                </tbody>
            </table>
        </div>
    </section>

    {{-- AJAX JavaScript Məntiqi --}}
    <script>
        document.querySelectorAll('.option').forEach(option => {
            option.addEventListener('click', function() {
                const val = this.getAttribute('data-value');
                const text = this.innerText;
                const wrapper = this.closest('.filter-wrapper');

                // Seçilmiş dəyəri və gizli inputu vizual yenilə
                wrapper.querySelector('input[type="hidden"]').value = val;
                wrapper.querySelector('.selected-value').innerText = text;

                // Seçim panelini bağla (CSS-dən asılı olaraq toggle class-ı əlavə edə bilərsən)
                wrapper.classList.remove('active');

                // Məlumatı realtime çək
                fetchFilteredData();
            });
        });

        function fetchFilteredData() {
            const form = document.getElementById('filter-form');
            const formData = new FormData(form);
            const params = new URLSearchParams(formData).toString();
            const url = `${form.getAttribute('action')}?${params}`;

            // Loading effekti (opsional)
            const tbody = document.getElementById('calendar-table-body');
            tbody.style.opacity = '0.5';

            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.text())
            .then(html => {
                tbody.innerHTML = html;
                tbody.style.opacity = '1';

                // URL-i brauzer sətrində yenilə (Səhifəni refresh etmədən)
                window.history.pushState({}, '', url);
            })
            .catch(error => {
                console.error('AJAX Error:', error);
                tbody.style.opacity = '1';
            });
        }
    </script>
</x-front.layout>
