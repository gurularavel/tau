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


                <x-admin.crud.card :routeName="'projects.update'" :method="'update'" :model="$model" :routeNameForBackButton="'projects'"
                    :frontRouteName="'projects.show'">

                    <x-admin.crud.success-message :delay="'5000'" />
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

                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'author'"
                                            :label="'Author'" :placeholder="'Author'" :type="'text'"
                                            :required="false" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description'"
                                            :label="'description'" :summerNoteID="1" />
                                    </div>

                                    <h4>{{ __('translate.Main achievements') }}</h4>

                                    <div class="project-items-wrapper" data-locale="{{ $locale }}">
                                        @php
                                            $items = $model->items;
                                        @endphp

                                        @forelse ($items as $index => $item)
                                            <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="project_items[{{ $index }}][{{ $locale }}][title]"
                                                    class="form-control"
                                                    value="{{ $item->translate($locale)->title ?? '' }}"
                                                    placeholder="Title">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                        @empty
                                            <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="project_items[0][{{ $locale }}][title]"
                                                    class="form-control" placeholder="Title">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                        @endforelse
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                        <button type="button" class="btn btn-success mt-2 add-item"
                                            data-locale="{{ $locale }}">
                                            + Add
                                        </button>
                                    </div>
                                    <div class="mb-3 col-lg-6">
                                    </div>





                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_title'"
                                            :label="'Meta title'" :placeholder="'Write a meta title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_keywords'"
                                            :label="'Meta keywords'" :placeholder="'Write a meta keywords'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'meta_description'"
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
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'publisher_count'"
                                    :label="'Publisher count'" :placeholder="'Publisher count'" :type="'number'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'participant_count'"
                                    :label="'Participant count'" :placeholder="'Participant count'" :type="'number'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'created_at'"
                                    :label="'Published date'" :placeholder="'Published date'" :type="'date'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'duration'"
                                    :label="'Duration'" :placeholder="'Duration'" :type="'text'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'partners'"
                                    :label="'Partners'" :placeholder="'Partners'" :type="'text'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.option :label="'Project category'" :name="'project_category_id'" :model="$model"
                                    :options="$categories
                                        ->map(
                                            fn($category) => [
                                                'label' => $category->title,
                                                'value' => $category->id,
                                            ],
                                        )
                                        ->toArray()" :request="request('project_category_id')" :required="true" />
                            </div>

                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'slug'"
                                    :label="'Slug'" :placeholder="'Write a slug'" :type="'text'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.option :label="'status'" :name="'is_active'" :model="$model"
                                    :options="[
                                        ['label' => __('translate.active'), 'value' => 1],
                                        ['label' => __('translate.inactive'), 'value' => 0],
                                    ]" />

                            </div>
                        </div>
                    </div>



                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'"
                                :folderName="'projects'" />
                            <x-admin.crud.image.other-images :model="$model" :routeName="'projects'"
                                :imageFolder="'project_images'" />

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
    let projectItemIndex = {{ $model->items->count() ?: 1 }};

    document.addEventListener('click', function(e) {

        if (e.target.classList.contains('add-item')) {
            const locale = e.target.dataset.locale;
            const wrapper = document.querySelector(
                `.project-items-wrapper[data-locale="${locale}"]`
            );

            wrapper.insertAdjacentHTML('beforeend', `
            <div class="d-flex gap-2 mb-2 project-item-row">
                <input type="text"
                       name="project_items[${projectItemIndex}][${locale}][title]"
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
