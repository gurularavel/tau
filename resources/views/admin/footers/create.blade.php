<x-admin.layout>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.app-menu />
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.card :routeName="'footers.store'" :method="'post'" :routeNameForBackButton="'footers'">
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
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>

                                    <h4>{{ __('translate.Items') }}</h4>

                                    <div class="project-items-wrapper" data-locale="{{ $locale }}">
                                        <div class="d-flex gap-2 mb-2 project-item-row">
                                            <input type="text" name="footer_items[new_0][{{ $locale }}][title]"
                                                class="form-control" placeholder="Title">

                                            <div class="d-flex gap-2 w-100 slug-container">
                                                <select class="form-control slug-select" name="footer_items[new_0][{{ $locale }}][slug_select]">
                                                    <option value="">{{__('translate.Select page')}}</option>
                                                    @foreach ($pages as $page)
                                                        <option value="pages/{{ $page->slug }}">{{ $page->title }}</option>
                                                    @endforeach
                                                </select>

                                                <select class="form-control slug-program" name="footer_items[new_0][{{ $locale }}][slug_program]">
                                                    <option value="">{{__('translate.Select program')}}</option>
                                                    @foreach ($programs as $program)
                                                        <option value="programs/{{ $program->slug }}">{{ $program->title }}</option>
                                                    @endforeach
                                                </select>

                                                <input type="text" name="footer_items[new_0][{{ $locale }}][slug_manual]"
                                                    class="form-control slug-manual" placeholder="Custom slug">
                                            </div>
                                            <button type="button" class="btn btn-danger remove-item">✕</button>
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-success mt-2 add-item" data-locale="{{ $locale }}">
                                        + {{ __('translate.add') }}
                                    </button>

                                    <x-admin.crud.all-errors :errors="$errors" />
                                </x-admin.crud.card-body-row>
                            </x-admin.crud.tab-pane>
                        @endforeach
                    </x-admin.crud.tab-content>
                </x-admin.crud.card>
            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>
</x-admin.layout>

<script>
    let footerIndex = 1;

    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-item')) {
            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(`.project-items-wrapper[data-locale="${locale}"]`);

            const html = `
            <div class="d-flex gap-2 mb-2 project-item-row">
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
            </div>`;

            wrapper.insertAdjacentHTML('beforeend', html);
            footerIndex++;
        }

        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.project-item-row').remove();
        }
    });

    // Slug ötürmə məntiqi
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
