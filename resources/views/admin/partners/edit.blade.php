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


                <x-admin.crud.card :routeName="'partners.update'" :method="'update'" :model="$model" :backButtonURL="route('admin.internshipProgramPage.index')"
                    >

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

                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="true" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'title2'"
                                            :label="'title'" :placeholder="'Write a title'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'address'"
                                            :label="'address'" :placeholder="'Write a address'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-3">
                                        <x-admin.crud.input :locale="$locale" :model="$model" :columnName="'intership_location'"
                                            :label="'Intership location'" :placeholder="'Intership location'" :type="'text'"
                                            :required="false" />
                                    </div>
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.textarea :locale="$locale" :model="$model" :columnName="'description'"
                                            :label="'description'" />
                                    </div>



                                    <x-admin.crud.all-errors :errors="$errors" />

                                </x-admin.crud.card-body-row>



                            </x-admin.crud.tab-pane>
                        @endforeach

                    </x-admin.crud.tab-content>
                    <div class="card">
                        <div class="card-body row">
                            <div class="mb-3 col-lg-4">
                                <x-admin.crud.option :label="'status'" :name="'is_active'" :model="$model"
                                    :options="[
                                        ['label' => __('translate.active'), 'value' => 1],
                                        ['label' => __('translate.inactive'), 'value' => 0],
                                    ]" :required="true" />
                            </div>
                        </div>
                    </div>
                    <x-admin.crud.image.card :title="$title">
                        <x-admin.crud.image.card-body>
                            <x-admin.crud.image.main-image :columnValue="$model->image" :name="'image'" :folderName="'partners'" />

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
