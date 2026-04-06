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


                <x-admin.crud.card :routeName="'contactPage.update'" :method="'update'" :model="$model" :routeNameForBackButton="''">


                    <x-admin.crud.nav>

                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.nav-item :locale="$locale" :key="$key" />
                        @endforeach
                        <x-admin.crud.summernote-editor-js :locales="$locales" :key="1" :height="'200'" />



                    </x-admin.crud.nav>

                    <x-admin.crud.tab-content>
                        <x-admin.crud.success-message :delay="'5000'" />


                        @foreach ($locales as $key => $locale)
                            <x-admin.crud.tab-pane :key="$key">

                                <x-admin.crud.card-body-row>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title2'"
                                            :label="'title'" :placeholder="'title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title3'"
                                            :label="'title'" :placeholder="'title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'address'"
                                            :label="'Address'" :placeholder="'Address'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'footer'"
                                            :label="'Footer'" :placeholder="'Footer'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'opening_hour'"
                                            :label="'Opening hour'" :summerNoteID="1" />
                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description'"
                                            :label="'Description'" :summerNoteID="1" />
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
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'phone'"
                                    :label="'Phone'" :placeholder="'Write a phone'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'email'"
                                    :label="'Email'" :placeholder="'Email'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'facebook'"
                                    :label="'Facebook'" :placeholder="'Facebook'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'instagram'"
                                    :label="'Instagram'" :placeholder="'Instagram'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'linkedin'"
                                    :label="'Linkedin'" :placeholder="'Linkedin'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'x_social_media'"
                                    :label="'X'" :placeholder="'X'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-3">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'youtube'"
                                    :label="'Youtube'" :placeholder="'Youtube'" :type="'text'" />
                            </div>
                            <div class="mb-3 col-lg-12">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'location_url'"
                                    :label="'Location URL'" :placeholder="'Location URL'" :type="'text'" />
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
