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


                <x-admin.crud.card :routeName="'announcements.store'" :method="'post'" :routeNameForBackButton="'announcements'">


                    <x-admin.crud.nav>

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'300'" />

                        <x-admin.crud.success-message :delay="'5000'" />

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
                                        <x-admin.crud.input :locale="$locale" :model="''" :columnName="'description'"
                                            :label="'description'" :placeholder="'Write a description'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'content'"
                                            :label="'content'" :summerNoteID="1" />
                                    </div>
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
                                <x-admin.crud.option :label="'Author'" :name="'user_id'" :model="''"
                                    :options="$users
                                        ->map(
                                            fn($user) => [
                                                'label' => $user->name,
                                                'value' => $user->id,
                                            ],
                                        )
                                        ->toArray()" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'created_at'"
                                    :label="'Published date'" :placeholder="'Published date'" :type="'date'" :required="false" />
                            </div>
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.input :locale="''" :model="''" :columnName="'tags'"
                                    :label="'Tags'" :placeholder="'Tags'" :type="'text'" :required="false" />
                            </div>


                        </div>
                    </div>

                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="''" :name="'image'" :folderName="'announcements'" />
                            {{-- <x-admin.crud.image.other-images :model="''" :routeName="'announcements'" :imageFolder="'announcements_images'" /> --}}
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
