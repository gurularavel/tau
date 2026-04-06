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


                <x-admin.crud.card :routeName="'campusGalleryPage.update'" :method="'update'" :model="$model" :back="true" :frontRouteName="'campus.index'">


                    <x-admin.crud.nav>

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'200'" />
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="2" :height="'200'" />
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="3" :height="'200'" />



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
                                            :label="'description'" :summerNoteID="1" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description2'"
                                            :label="'description'" :summerNoteID="2" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description3'"
                                            :label="'description'" :summerNoteID="3" />
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

                            <div class="mb-3 col-lg-12">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'video_url'"
                                    :label="'Video URL'" :placeholder="'Video URL'" :type="'text'" />
                            </div>




                        </div>
                    </div>

                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image"  :name="'image'"  :folderName="'campusGalleryPage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image2" :name="'image2'" :folderName="'campusGalleryPage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image3" :name="'image3'" :folderName="'campusGalleryPage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image4" :name="'image4'" :folderName="'campusGalleryPage'" />
                            <x-admin.crud.image.main-image :columnValue="$model->image5" :name="'image5'" :folderName="'campusGalleryPage'" />


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
