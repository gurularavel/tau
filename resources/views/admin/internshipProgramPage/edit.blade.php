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


                <x-admin.crud.card :routeName="'internshipProgramPage.update'" :method="'update'" :model="$model" :routeNameForBackButton="''" :frontRouteName="'internship_programs.index'">


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
                                            :required="true" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description'"
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

                                    <h4>{{ __('translate.Application process') }}</h4>

                                    <div class="project-items-wrapper" data-locale="{{ $locale }}">
                                        @php
                                            $items = $model->items;
                                        @endphp

                                        @forelse ($items as $index => $item)
                                            <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="internship_program_page_items[{{ $index }}][{{ $locale }}][title]"
                                                    class="form-control"
                                                    value="{{ $item->translate($locale)->title ?? '' }}"
                                                    placeholder="{{__('translate.Title')}}">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                            <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="internship_program_page_items[{{ $index }}][{{ $locale }}][description]"
                                                    class="form-control"
                                                    value="{{ $item->translate($locale)->description ?? '' }}"
                                                    placeholder="{{__('translate.Description')}}">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                            <br>
                                        @empty
                                            <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="internship_program_page_items[0][{{ $locale }}][title]"
                                                    class="form-control" placeholder="{{__('translate.Title')}}">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                                           <div class="d-flex gap-2 mb-2 project-item-row">
                                                <input type="text"
                                                    name="internship_program_page_items[0][{{ $locale }}][description]"
                                                    class="form-control" placeholder="{{__('translate.Description')}}">

                                                <button type="button" class="btn btn-danger remove-item">✕</button>
                                            </div>
                                            <br>
                                        @endforelse
                                    </div>
                                    <div class="mb-3 col-lg-6">

                                        <button type="button" class="btn btn-success mt-2 add-item"
                                            data-locale="{{ $locale }}">
                                            + {{ __('translate.add') }}
                                        </button>
                                    </div>
                                    <x-admin.crud.all-errors :errors="$errors" />

                                </x-admin.crud.card-body-row>



                            </x-admin.crud.tab-pane>
                        @endforeach

                    </x-admin.crud.tab-content>
                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'" :folderName="'internshipProgramPage'" />
                        </x-admin.crud.image.card-body>
                    </x-admin.crud.image.card>


                </x-admin.crud.card>

                <x-admin.crud.show.sub-card :title="'Intership programs'" :route="route('admin.internship_programs.create')" :thArray="['Image', 'Title', 'Active']" :models="$internshipPrograms"
                    :tdArray="['image', 'title', 'is_active', 'actions']" :mainRouteName="'internship_programs'" :view="false"/>


                          <x-admin.crud.show.sub-card :title="'Partner companies'" :route="route('admin.partners.create')" :thArray="['Image', 'Title', 'Active']" :models="$partners"
                    :tdArray="['image', 'title', 'is_active', 'actions']" :mainRouteName="'partners'" :view="false" />

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
            <br>
            <div class="d-flex gap-2 mb-2 project-item-row">
                <input type="text"
                       name="internship_program_page_items[${projectItemIndex}][${locale}][title]"
                       class="form-control"
                       placeholder="{{__('translate.Title')}}">
                <button type="button" class="btn btn-danger remove-item">✕</button>
            </div>
                        <div class="d-flex gap-2 mb-2 project-item-row">
                <input type="text"
                       name="internship_program_page_items[${projectItemIndex}][${locale}][description]"
                       class="form-control"
                       placeholder="{{__('translate.Description')}}">
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
