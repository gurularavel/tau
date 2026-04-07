<x-admin.layout>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.app-menu />
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'footers.update'" :method="'update'" :model="$model" :routeNameForBackButton="'footers'">
                    <x-admin.crud.success-message :delay="'5000'" />

                    <x-admin.crud.nav>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">
                                <x-admin.crud.card-body-row>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    <h4>{{ __('translate.Items') }}</h4>

                                    <div class="footer-items-wrapper" data-locale="{{ $locale }}">
                                        @foreach ($model->items as $item)
                                            <div class="d-flex gap-2 mb-2 footer-item-row">
                                                <input type="text" name="footer_items[{{ $item->id }}][{{ $locale }}][title]"
                                                    class="form-control" value="{{ $item->translate($locale)->title ?? '' }}" placeholder="Title">

                                                <div class="d-flex gap-2 w-100 slug-container">
                                                    <select class="form-control slug-select" name="footer_items[{{ $item->id }}][{{ $locale }}][slug_select]">
                                                        <option value="">{{ __('translate.Select page') }}</option>
                                                        @foreach ($pages as $page)
                                                            <option value="pages/{{ $page->slug }}" {{ $item->slug == 'pages/'.$page->slug ? 'selected' : '' }}>
                                                                {{ $page->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <select class="form-control slug-program" name="footer_items[{{ $item->id }}][{{ $locale }}][slug_program]">
                                                        <option value="">{{ __('translate.Select program') }}</option>
                                                        @foreach ($programs as $program)
                                                            <option value="programs/{{ $program->slug }}" {{ $item->slug == 'programs/'.$program->slug ? 'selected' : '' }}>
                                                                {{ $program->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    <input type="text" name="footer_items[{{ $item->id }}][{{ $locale }}][slug_manual]"
                                                        class="form-control slug-manual" value="{{ $item->slug }}" placeholder="Custom slug">
                                                </div>
                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button type="button" class="btn btn-success mt-2 add-item" data-locale="{{ $locale }}">
                                        + {{ __('translate.add') }}
                                    </button>

                                    <x-admin.crud.all-errors :errors="$errors" />
                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>

                    <div class="card mt-3">
                        <div class="card-body">
                            <x-admin.crud.option :label="'status'" :name="'is_active'" :model="$model"
                                :options="[['label' => __('translate.active'), 'value' => 1], ['label' => __('translate.inactive'), 'value' => 0]]" />
                        </div>
                    </div>
                </x-admin.crud.card>
            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>
</x-admin.back-to-up />
<x-admin.preloader />

<script>
    let footerIndex = Date.now();

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-item')) {
            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(`.footer-items-wrapper[data-locale="${locale}"]`);

            wrapper.insertAdjacentHTML('beforeend', `
                <div class="d-flex gap-2 mb-2 footer-item-row">
                    <input type="text" name="footer_items[new_${footerIndex}][${locale}][title]" class="form-control" placeholder="Title">
                    <div class="d-flex gap-2 w-100 slug-container">
                        <select class="form-control slug-select" name="footer_items[new_${footerIndex}][${locale}][slug_select]">
                            <option value="">Select page</option>
                            @foreach ($pages as $page)
                                <option value="pages/{{ $page->slug }}">{{ $page->title }}</option>
                            @endforeach
                        </select>
                        <select class="form-control slug-program" name="footer_items[new_${footerIndex}][${locale}][slug_program]">
                            <option value="">Select program</option>
                            @foreach ($programs as $program)
                                <option value="programs/{{ $program->slug }}">{{ $program->title }}</option>
                            @endforeach
                        </select>
                        <input type="text" name="footer_items[new_${footerIndex}][${locale}][slug_manual]" class="form-control slug-manual" placeholder="Custom slug">
                    </div>
                    <button type="button" class="btn btn-danger remove-item">✕</button>
                </div>
            `);
            footerIndex++;
        }

        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.footer-item-row').remove();
        }
    });

    document.addEventListener('change', function(e) {
        const isSelect = e.target.classList.contains('slug-select');
        const isProgram = e.target.classList.contains('slug-program');

        if (isSelect || isProgram) {
            const container = e.target.closest('.slug-container');
            const manualInput = container.querySelector('.slug-manual');

            if (e.target.value !== "") {
                manualInput.value = e.target.value;
                if (isSelect) container.querySelector('.slug-program').value = "";
                if (isProgram) container.querySelector('.slug-select').value = "";
            }
        }
    });
</script>
</x-admin.layout>
