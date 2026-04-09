<x-admin.layout>



    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header />

        <!-- removeNotificationModal -->
        <x-admin.remove-notification />
        <!--removeNotificationModal -->

        <!-- ========== App Menu ========== -->
        <x-admin.app-menu />
        <!-- Left Sidebar End -->


        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="'Home page'" />


                <x-admin.crud.card :routeName="'homePage.update'" :method="'update'" :model="$model" :routeNameForBackButton="''">


                    <x-admin.crud.nav>

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach



                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        <x-admin.crud.success-message :delay="'5000'" />


                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">

                                <x-admin.crud.card-body-row>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title2'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                        <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description'"
                                            :label="'description'" :summerNoteID="''" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title3'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                         <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description2'"
                                            :label="'description'" :summerNoteID="''" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description3'"
                                            :label="'description'" :summerNoteID="''" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title4'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description4'"
                                            :label="'description'" :summerNoteID="''" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title5'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>


                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description5'"
                                            :label="'description'" :summerNoteID="''" />
                                    </div>


                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>




                                    <x-admin.crud.all-errors :errors="$errors" />

                                </x-admin.crud.card-body-row>



                            </x-admin.crud.tab-pane>
                        @endforeach

                    </x-admin.crud.tab-content>
                    <div class="card">
                        <div class="card-body row">
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'student'"
                                    :label="'Student'" :placeholder="'student'" :type="'number'" :required="false" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'course'"
                                    :label="'Course'" :placeholder="'Course'" :type="'number'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'startup'"
                                    :label="'Startup'" :placeholder="'Startup'" :type="'number'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'language'"
                                    :label="'Language'" :placeholder="'Language'" :type="'number'" :required="false" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'teacher'"
                                    :label="'Teacher'" :placeholder="'Teacher'" :type="'number'" :required="false" />
                            </div>

                        </div>
                    </div>



                    {{-- ===== HERO SLIDER ===== --}}
                    <div class="card mt-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0"><i class="ri-slideshow-line me-2"></i>Hero Slider</h5>
                            <button type="button" class="btn btn-success btn-sm" id="add-slide-btn">
                                <i class="ri-add-line"></i> Add Slide
                            </button>
                        </div>
                        <div class="card-body">
                            <div id="slides-list">
                                @foreach(\App\Models\HeroSlide::with('translations')->orderBy('order')->get() as $slide)
                                <div class="slide-row card mb-3 border" data-id="{{ $slide->id }}">
                                    <div class="card-header d-flex justify-content-between align-items-center py-2 bg-light" style="cursor:grab;">
                                        <span><i class="ri-drag-move-2-line me-2 text-muted"></i><strong>Slide #{{ $loop->iteration }}</strong></span>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-sm btn-outline-secondary toggle-slide-body">
                                                <i class="ri-arrow-down-s-line"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger delete-slide" data-id="{{ $slide->id }}">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body slide-body" style="display:none;">
                                        <div class="row">
                                            <div class="col-lg-4 mb-3">
                                                <label class="form-label fw-semibold">Image</label>
                                                @if($slide->image)
                                                    <div class="mb-2">
                                                        <img src="{{ asset('uploads/hero_slides/'.$slide->image) }}"
                                                             class="img-thumbnail" style="max-height:120px;">
                                                    </div>
                                                @endif
                                                <input type="file" class="form-control slide-image-input" accept="image/*">
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <label class="form-label fw-semibold">Active</label>
                                                <select class="form-select slide-is-active">
                                                    <option value="1" {{ $slide->is_active ? 'selected' : '' }}>Yes</option>
                                                    <option value="0" {{ !$slide->is_active ? 'selected' : '' }}>No</option>
                                                </select>
                                            </div>
                                        </div>
                                        @foreach(getLocales() as $locale)
                                        <div class="border rounded p-3 mb-3">
                                            <h6 class="text-uppercase text-muted mb-3">{{ strtoupper($locale) }}</h6>
                                            <div class="row">
                                                <div class="col-lg-6 mb-2">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control slide-field"
                                                           data-locale="{{ $locale }}" data-field="title"
                                                           value="{{ $slide->translate($locale)?->title ?? '' }}">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="form-label">Description</label>
                                                    <input type="text" class="form-control slide-field"
                                                           data-locale="{{ $locale }}" data-field="description"
                                                           value="{{ $slide->translate($locale)?->description ?? '' }}">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="form-label">Button Text</label>
                                                    <input type="text" class="form-control slide-field"
                                                           data-locale="{{ $locale }}" data-field="button_text"
                                                           value="{{ $slide->translate($locale)?->button_text ?? '' }}">
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <label class="form-label">Button URL</label>
                                                    <input type="text" class="form-control slide-field"
                                                           data-locale="{{ $locale }}" data-field="button_url"
                                                           value="{{ $slide->translate($locale)?->button_url ?? '' }}">
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <button type="button" class="btn btn-primary save-slide" data-id="{{ $slide->id }}">
                                            <i class="ri-save-line"></i> Save Slide
                                        </button>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    {{-- ===== /HERO SLIDER ===== --}}

                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'"
                                :folderName="'homePage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image2" :name="'image2'"
                                :folderName="'homePage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image3" :name="'image3'"
                                :folderName="'homePage'" />

                        </x-admin.crud.image.card-body>
                    </x-admin.crud.image.card>


                </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <x-admin.back-to-up />

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader />


<script>
const CSRF = '{{ csrf_token() }}';
const locales = @json(getLocales());

// Toggle slide body
document.addEventListener('click', function(e) {
    if (e.target.closest('.toggle-slide-body')) {
        const body = e.target.closest('.slide-row').querySelector('.slide-body');
        const icon = e.target.closest('.toggle-slide-body').querySelector('i');
        body.style.display = body.style.display === 'none' ? 'block' : 'none';
        icon.className = body.style.display === 'none' ? 'ri-arrow-down-s-line' : 'ri-arrow-up-s-line';
    }
});

// Add new slide
document.getElementById('add-slide-btn').addEventListener('click', function() {
    const localesHtml = locales.map(locale => `
        <div class="border rounded p-3 mb-3">
            <h6 class="text-uppercase text-muted mb-3">${locale.toUpperCase()}</h6>
            <div class="row">
                <div class="col-lg-6 mb-2">
                    <label class="form-label">Title</label>
                    <input type="text" class="form-control slide-field" data-locale="${locale}" data-field="title">
                </div>
                <div class="col-lg-6 mb-2">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control slide-field" data-locale="${locale}" data-field="description">
                </div>
                <div class="col-lg-6 mb-2">
                    <label class="form-label">Button Text</label>
                    <input type="text" class="form-control slide-field" data-locale="${locale}" data-field="button_text">
                </div>
                <div class="col-lg-6 mb-2">
                    <label class="form-label">Button URL</label>
                    <input type="text" class="form-control slide-field" data-locale="${locale}" data-field="button_url">
                </div>
            </div>
        </div>`).join('');

    const row = document.createElement('div');
    row.className = 'slide-row card mb-3 border';
    row.dataset.id = 'new';
    row.innerHTML = `
        <div class="card-header d-flex justify-content-between align-items-center py-2 bg-light" style="cursor:grab;">
            <span><i class="ri-drag-move-2-line me-2 text-muted"></i><strong>New Slide</strong></span>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-outline-secondary toggle-slide-body"><i class="ri-arrow-up-s-line"></i></button>
                <button type="button" class="btn btn-sm btn-danger delete-slide" data-id="new"><i class="ri-delete-bin-line"></i></button>
            </div>
        </div>
        <div class="card-body slide-body">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file" class="form-control slide-image-input" accept="image/*">
                </div>
                <div class="col-lg-4 mb-3">
                    <label class="form-label fw-semibold">Active</label>
                    <select class="form-select slide-is-active">
                        <option value="1" selected>Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            ${localesHtml}
            <button type="button" class="btn btn-success save-slide" data-id="new">
                <i class="ri-save-line"></i> Create Slide
            </button>
        </div>`;
    document.getElementById('slides-list').appendChild(row);
});

// Save slide (create or update)
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.save-slide');
    if (!btn) return;

    const slideId = btn.dataset.id;
    const row = btn.closest('.slide-row');
    const fd  = new FormData();

    const imgInput = row.querySelector('.slide-image-input');
    if (imgInput && imgInput.files[0]) fd.append('image', imgInput.files[0]);

    const activeEl = row.querySelector('.slide-is-active');
    if (activeEl) fd.append('is_active', activeEl.value);

    row.querySelectorAll('.slide-field').forEach(input => {
        fd.append(`translations[${input.dataset.locale}][${input.dataset.field}]`, input.value);
    });

    const isNew = slideId === 'new';
    const url   = isNew
        ? '{{ route("admin.hero_slides.store") }}'
        : `/admin/hero-slides/${slideId}`;

    fd.append('_token', CSRF);

    btn.disabled = true;
    fetch(url, { method: 'POST', body: fd })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                if (isNew && data.id) {
                    row.dataset.id = data.id;
                    btn.dataset.id = data.id;
                    btn.textContent = '';
                    btn.innerHTML = '<i class="ri-save-line"></i> Save Slide';
                    btn.className = 'btn btn-primary save-slide';
                    row.querySelector('.delete-slide').dataset.id = data.id;
                    if (data.image) {
                        const imgWrap = document.createElement('div');
                        imgWrap.className = 'mb-2';
                        imgWrap.innerHTML = `<img src="/uploads/hero_slides/${data.image}" class="img-thumbnail" style="max-height:120px;">`;
                        imgInput.closest('.col-lg-4').insertBefore(imgWrap, imgInput);
                    }
                }
                showNotify('success', 'Saved!');
            }
        })
        .catch(() => showNotify('error', 'Error!'))
        .finally(() => { btn.disabled = false; });
});

// Delete slide
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.delete-slide');
    if (!btn) return;

    const slideId = btn.dataset.id;
    const row = btn.closest('.slide-row');

    if (slideId === 'new') { row.remove(); return; }

    if (!confirm('Delete this slide?')) return;

    fetch(`/admin/hero-slides/${slideId}`, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': CSRF, 'Content-Type': 'application/json' }
    })
    .then(r => r.json())
    .then(data => { if (data.success) { row.remove(); showNotify('success', 'Deleted!'); } })
    .catch(() => showNotify('error', 'Error!'));
});
</script>

</x-admin.layout>
