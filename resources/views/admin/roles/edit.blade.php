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


                <x-admin.crud.card :routeName="'roles.update'" :method="'update'" :model="$model">



                    <x-admin.crud.tab-content>
                        <x-admin.crud.card-body-row>

                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.input :locale="''" :model="$model" :columnName="'name'" :label="'title'" :placeholder="'Write a title'" :type="'text'" :required="true" />
                            </div>
                            <div class="mb-3 col-lg-6">
                                <x-admin.crud.option-multiple
                                :label="'Permissions'"
                                :name="'permissions_id[]'"
                                :options="$permissions"
                                :valueField="'id'"
                                :textField="'description'"
                                :selected="$model->permissions->modelKeys()"
                                :multiple="true"
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
