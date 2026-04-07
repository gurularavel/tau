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


                <x-admin.crud.card :routeName="'internship_programs.store'" :method="'post'" :routeNameForBackButton="'internship_programs'">


                    <x-admin.crud.nav>

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'300'" />


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



                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'description'"
                                            :label="'description'" :summerNoteID="1" />
                                    </div>


                                    <h4>{{ __('translate.Requirements') }}</h4>

                                    <div class="project-items-wrapper" data-locale="{{ $locale }}">
                                        <div class="d-flex gap-2 mb-2 project-item-row">
                                            <input type="text" name="internship_items[0][{{ $locale }}][title]"
                                                class="form-control" placeholder="Title">
                                            <button type="button" class="btn btn-danger remove-item">✕</button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                        <button type="button" class="btn btn-success mt-2 add-item"
                                            data-locale="{{ $locale }}">
                                            + {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                    </div>

{{--
                                    <h4>{{ __('translate.Advantages') }}</h4>

                                    <div class="advantage-items-wrapper" data-locale="{{ $locale }}">
                                        <div class="d-flex gap-2 mb-2 advantage-item-row">
                                            <input type="text" name="advantage_items[0][{{ $locale }}][title]"
                                                class="form-control" placeholder="Title">
                                            <button type="button"
                                                class="btn btn-danger advantage-remove-item">✕</button>
                                        </div>
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                        <button type="button" class="btn btn-success mt-2 advantage-add-item"
                                            data-locale="{{ $locale }}">
                                            + {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                    </div> --}}



                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'meta_description'"
                                            :label="'Meta description'" :placeholder="'Write a meta description'" :type="'text'"
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
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'place_count'"
                                    :label="'Place count'" :placeholder="'Place count'" :type="'number'" :required="false" />
                            </div>

                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'created_at'"
                                    :label="'Deadline'" :placeholder="'Deadline'" :type="'date'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'duration'"
                                    :label="'Duration'" :placeholder="'Duration'" :type="'text'" :required="false" />
                            </div>




                        </div>
                    </div>
                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="''" :name="'image'" :folderName="'internship_programs'" />
                            {{-- <x-admin.crud.image.other-images :model="''" :routeName="'internship_programs'" :imageFolder="'project_images'" /> --}}

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


</x-admin.layout>
<script>
    let projectItemIndex = 1;

    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('add-item')) {
            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(
                `.project-items-wrapper[data-locale="${locale}"]`
            );

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="d-flex gap-2 mb-2 project-item-row">
                <input type="text"
                       name="internship_items[${projectItemIndex}][${locale}][title]"
                       class="form-control"
                       placeholder="Title">
                <button type="button" class="btn btn-danger remove-item">✕</button>
            </div>
        `);

            projectItemIndex++;
        }

        if (e.target.classList.contains('remove-item')) {
            e.target.closest('.project-item-row').remove();
        }
    });
</script>

<script>
    let advantageItemIndex = 1;

    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('advantage-add-item')) {
            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(
                `.advantage-items-wrapper[data-locale="${locale}"]`
            );

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="d-flex gap-2 mb-2 advantage-item-row">
                <input type="text"
                       name="advantage_items[${advantageItemIndex}][${locale}][title]"
                       class="form-control"
                       placeholder="Title">
                <button type="button" class="btn btn-danger advantage-remove-item">✕</button>
            </div>
        `);

            advantageItemIndex++;
        }

        if (e.target.classList.contains('advantage-remove-item')) {
            e.target.closest('.advantage-item-row').remove();
        }
    });
</script>

