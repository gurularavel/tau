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


                <x-admin.crud.card :routeName="'languages.update'" :method="'update'" :model="$model">

                    <x-admin.crud.success-message :delay="'5000'"/>


                    <x-admin.crud.tab-content>
                        <x-admin.crud.card-body-row>

                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'name'" :label="'title'" :placeholder="'Write a title'" :type="'text'" :required="true" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'locale'" :label="'Code'" :placeholder="'Write a code'" :type="'text'" :required="true" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.option
                                    :label="'status'"
                                    :name="'is_active'"
                                    :model="$model"
                                    :options="[
                                        ['label' => 'active', 'value' => 1],
                                        ['label' => 'inactive', 'value' => 0]
                                    ]"

                                />

                            </div>
                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.option
                                    :label="'is_main'"
                                    :name="'is_main'"
                                    :model="$model"
                                    :options="[
                                        ['label' => 'active', 'value' => 1],
                                        ['label' => 'inactive', 'value' => 0]
                                    ]"

                                />

                            </div>


                            <x-admin.crud.all-errors :errors="$errors" />

                        </x-admin.crud.card-body-row>

                    </x-admin.crud.tab-content>






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
