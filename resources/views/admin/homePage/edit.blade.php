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


</x-admin.layout>
