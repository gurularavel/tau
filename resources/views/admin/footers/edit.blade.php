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

                                        @forelse ($model->items as $item)
                                            <div class="d-flex gap-2 mb-2 footer-item-row">

                                                <!-- TITLE -->
                                                <input type="text"
                                                    name="footer_items[{{ $item->id }}][{{ $locale }}][title]"
                                                    class="form-control"
                                                    value="{{ $item->translate($locale)->title ?? '' }}"
                                                    placeholder="Title">

                                                <!-- SLUG (SELECT + INPUT) -->
                                                <div class="d-flex gap-2 w-100">

                                                    <!-- SELECT -->
                                                    <select class="form-control slug-select"
                                                        name="footer_items[{{ $item->id }}][{{ $locale }}][slug_select]">

                                                        <option value="">{{ __('translate.Select page') }}
                                                        </option>

                                                        @foreach ($pages as $page)
                                                            <option value="{{ $page->slug }}"
                                                                {{ $item->slug == $page->slug ? 'selected' : '' }}>
                                                                {{ $page->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                                          <select class="form-control slug-program"
                                                        name="footer_items[{{ $item->id }}][{{ $locale }}][slug_program]">

                                                        <option value="">{{ __('translate.Select program') }}
                                                        </option>

                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->slug }}"
                                                                {{ $item->slug == $program->slug ? 'selected' : '' }}>
                                                                {{ $program->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    <!-- MANUAL INPUT -->
                                                    <input type="text"
                                                        name="footer_items[{{ $item->id }}][{{ $locale }}][slug_manual]"
                                                        class="form-control" value="{{ $item->slug }}"
                                                        placeholder="Custom slug">

                                                </div>

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>

                                        @empty

                                            <div class="d-flex gap-2 mb-2 footer-item-row">

                                                <!-- TITLE -->
                                                <input type="text"
                                                    name="footer_items[new][{{ $locale }}][title]"
                                                    class="form-control" placeholder="Title">

                                                <!-- SLUG -->
                                                <div class="d-flex gap-2 w-100">

                                                    <select class="form-control slug-select"
                                                        name="footer_items[new][{{ $locale }}][slug_select]">

                                                        <option value="">{{ __('translate.Select page') }}
                                                        </option>

                                                        @foreach ($pages as $page)
                                                            <option value="{{ $page->slug }}">
                                                                {{ $page->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>


                                                     <select class="form-control slug-program"
                                                        name="footer_items[new][{{ $locale }}][slug_program]">

                                                        <option value="">{{ __('translate.Select program') }}
                                                        </option>

                                                        @foreach ($programs as $program)
                                                            <option value="{{ $program->slug }}">
                                                                {{ $program->title }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                    <input type="text"
                                                        name="footer_items[new][{{ $locale }}][slug_manual]"
                                                        class="form-control" placeholder="Custom slug">

                                                </div>

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                        @endforelse

                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <button type="button" class="btn btn-success mt-2 add-item"
                                            data-locale="{{ $locale }}">
                                            + {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                    </div>



                                    <x-admin.crud.all-errors :errors="$errors" />

                                </x-admin.crud.card-body-row>



                            </x-admin.crud.tab-pane>
                        @endforeach

                    </x-admin.crud.tab-content>
                    <div class="card">
                        <div class="card-body row">


                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.option :label="'status'" :name="'is_active'" :model="$model"
                                    :options="[
                                        ['label' => __('translate.active'), 'value' => 1],
                                        ['label' => __('translate.inactive'), 'value' => 0],
                                    ]" />

                            </div>
                        </div>
                    </div>





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


</x-admin.layout>
<script>
    let footerIndex = Date.now();

    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('add-item')) {

            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(`.footer-items-wrapper[data-locale="${locale}"]`);

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="d-flex gap-2 mb-2 footer-item-row">

                <input type="text"
                    name="footer_items[new_${footerIndex}][${locale}][title]"
                    class="form-control"
                    placeholder="Title">

                <select name="footer_items[new_${footerIndex}][${locale}][slug]"
                    class="form-control">

                    <option value="">{{ __('translate.Select page') }}</option>

                    @foreach ($pages as $page)
                        <option value="{{ $page->slug }}">{{ $page->title }}</option>
                    @endforeach

                </select>

                <button type="button" class="btn btn-danger remove-item">✕</button>
            </div>
        `);

            footerIndex++;
        }

        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.footer-item-row').remove();
        }

    });
</script>
<script>
    document.addEventListener('change', function(e) {

        if (e.target.classList.contains('slug-select')) {
            const input = e.target.closest('.d-flex').querySelector('input');
            if (input) {
                input.value = 'pages/' + e.target.value;
            }
        }

                if (e.target.classList.contains('slug-program')) {
            const input = e.target.closest('.d-flex').querySelector('input');
            if (input) {
                input.value = 'programs/' + e.target.value;
            }
        }

    });
</script>
