<x-admin.layout>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>
        <x-admin.crud.main-content>
            <x-admin.crud.page-content>


                <div class="container">

                    <h3>{{ __('translate.Academic calendar') }}</h3>

                    @php $locales = getLocales(); @endphp
                    <div class="container">
                        <div class="row g-3">
                            {{-- SEMESTERS --}}
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ __('translate.Semesters') }}</span>
                                        <button class="btn btn-primary open-modal" data-type="semester"
                                            data-bs-toggle="modal" data-bs-target="#lookupModal">
                                            {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($semesters as $item)
                                                <li class="mb-2 d-flex justify-content-between align-items-center">
                                                    <span>{{ $item->translate(app()->getLocale())->name }}</span>
                                                    <button class="btn btn-sm btn-warning open-modal"
                                                        data-type="semester" data-id="{{ $item->id }}"
                                                        @foreach ($locales as $locale)
                                        data-{{ $locale }}="{{ $item->translate($locale)->name ?? '' }}" @endforeach
                                                        data-bs-toggle="modal" data-bs-target="#lookupModal">
                                                        {{ __('translate.edit') }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- FACULTIES --}}
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ __('translate.Faculties') }}</span>
                                        <button class="btn btn-primary open-modal" data-type="faculty"
                                            data-bs-toggle="modal" data-bs-target="#lookupModal">
                                            {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($faculties as $item)
                                                <li class="mb-2 d-flex justify-content-between align-items-center">
                                                    <span>{{ $item->translate(app()->getLocale())->name }}</span>
                                                    <button class="btn btn-sm btn-warning open-modal"
                                                        data-type="faculty" data-id="{{ $item->id }}"
                                                        @foreach ($locales as $locale)
                                        data-{{ $locale }}="{{ $item->translate($locale)->name ?? '' }}" @endforeach
                                                        data-bs-toggle="modal" data-bs-target="#lookupModal">
                                                        {{ __('translate.edit') }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- EDUCATION LEVEL --}}
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ __('translate.Education levels') }}</span>
                                        <button class="btn btn-primary open-modal" data-type="education_level"
                                            data-bs-toggle="modal" data-bs-target="#lookupModal">
                                            {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($educationLevels as $item)
                                                <li class="mb-2 d-flex justify-content-between align-items-center">
                                                    <span>{{ $item->translate(app()->getLocale())->name }}</span>
                                                    <button class="btn btn-sm btn-warning open-modal"
                                                        data-type="education_level" data-id="{{ $item->id }}"
                                                        @foreach ($locales as $locale)
                                        data-{{ $locale }}="{{ $item->translate($locale)->name ?? '' }}" @endforeach
                                                        data-bs-toggle="modal" data-bs-target="#lookupModal">
                                                        {{ __('translate.edit') }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- EDUCATION TYPE --}}
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ __('translate.Education types') }}</span>
                                        <button class="btn btn-primary open-modal" data-type="education_type"
                                            data-bs-toggle="modal" data-bs-target="#lookupModal">
                                            {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($educationTypes as $item)
                                                <li class="mb-2 d-flex justify-content-between align-items-center">
                                                    <span>{{ $item->translate(app()->getLocale())->name }}</span>
                                                    <button class="btn btn-sm btn-warning open-modal"
                                                        data-type="education_type" data-id="{{ $item->id }}"
                                                        @foreach ($locales as $locale)
                                        data-{{ $locale }}="{{ $item->translate($locale)->name ?? '' }}" @endforeach
                                                        data-bs-toggle="modal" data-bs-target="#lookupModal">
                                                        {{ __('translate.edit') }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            {{-- EVENT TYPE --}}
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-header d-flex justify-content-between">
                                        <span>{{ __('translate.Event types') }}</span>
                                        <button class="btn btn-primary open-modal" data-type="event_type"
                                            data-bs-toggle="modal" data-bs-target="#lookupModal">
                                            {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="card-body">
                                        <ul>
                                            @foreach ($eventTypes as $item)
                                                <li class="mb-2 d-flex justify-content-between align-items-center">
                                                    <span>{{ $item->translate(app()->getLocale())->name }}</span>
                                                    <button class="btn btn-sm btn-warning open-modal"
                                                        data-type="event_type" data-id="{{ $item->id }}"
                                                        @foreach ($locales as $locale)
                                        data-{{ $locale }}="{{ $item->translate($locale)->name ?? '' }}" @endforeach
                                                        data-bs-toggle="modal" data-bs-target="#lookupModal">
                                                        {{ __('translate.edit') }}
                                                    </button>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div> {{-- row --}}
                    </div> {{-- container --}}

                </div>

                {{-- ================= MODAL ================= --}}
                <div class="modal fade" id="lookupModal">
                    <div class="modal-dialog">
                        <form method="POST" id="lookupForm">
                            @csrf

                            <input type="hidden" name="id" id="lookup_id">

                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="modalTitle"></h5>
                                </div>

                                <div class="modal-body">

                                    @foreach ($locales as $locale)
                                        <input type="text" name="name[{{ $locale }}]"
                                            id="name_{{ $locale }}" class="form-control mb-2"
                                            placeholder="{{ strtoupper($locale) }}">
                                    @endforeach

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-success">
                                        {{ __('translate.save') }}
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

    {{-- ================= JS ================= --}}
    <script>
        const locales = @json(getLocales());

        document.querySelectorAll('.open-modal').forEach(btn => {
            btn.addEventListener('click', function() {

                let type = this.dataset.type;
                let id = this.dataset.id || '';

                let routes = {
                    semester: "{{ route('admin.academic_lookups.semester.store') }}",
                    faculty: "{{ route('admin.academic_lookups.faculty.store') }}",
                    education_level: "{{ route('admin.academic_lookups.education_level.store') }}",
                    education_type: "{{ route('admin.academic_lookups.education_type.store') }}",
                    event_type: "{{ route('admin.academic_lookups.event_type.store') }}"
                };

                document.getElementById('lookupForm').action = routes[type];
                document.getElementById('modalTitle').innerText = type.toUpperCase();
                document.getElementById('lookup_id').value = id;

                locales.forEach(locale => {
                    document.getElementById('name_' + locale).value = this.dataset[locale] || '';
                });
            });
        });
    </script>


</x-admin.layout>
