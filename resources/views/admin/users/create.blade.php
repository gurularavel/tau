<x-admin.layout>



    <!-- Begin page -->
    <div id="layout-wrapper">

        <x-admin.header/>

        <!-- removeNotificationModal -->
        <x-admin.remove-notification/>
        <!--removeNotificationModal -->

        <!-- ========== App Menu ========== -->
        <x-admin.app-menu/>
        <!-- Left Sidebar End -->


        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                    <x-admin.crud.page-title :title="$title"/>


                    <x-admin.crud.card :routeName="'users.store'" :method="'post'">



                                <x-admin.crud.tab-content>


                                            <x-admin.crud.card-body-row>

                                                <div class="mb-3 col-lg-3">
                                                    <x-admin.crud.input :locale="''" :model="''" :columnName="'name'" :label="'Name'" :placeholder="'Write a name'" :type="'text'" :required="true"/>
                                                </div>
                                                <div class="mb-3 col-lg-3">
                                                    <x-admin.crud.input :locale="''" :model="''" :columnName="'email'" :label="'Email'" :placeholder="'Write a email'" :type="'text'" :required="true"/>
                                                </div>
                                                <div class="mb-3 col-lg-3">
                                                    <x-admin.crud.input :locale="''" :model="''" :columnName="'password'" :label="'password'" :placeholder="'Write a password'" :type="'password'" :required="true"/>
                                                </div>
                                                <div class="mb-3 col-lg-3">
                                                    <x-admin.crud.option-multiple
                                                            :label="'Role'"
                                                            :name="'role_id'"
                                                            :options="$roles"
                                                            :valueField="'id'"
                                                            :textField="'name'"
                                                            :selected="$model->rolesIds"
                                                            />
                                                </div>

                                                <x-admin.crud.all-errors :errors="$errors"/>

                                            </x-admin.crud.card-body-row>

                                </x-admin.crud.tab-content>

                                <x-admin.crud.image.card :title="$title">
                                    <x-admin.crud.image.card-body>
                                        <x-admin.crud.image.main-image :title="$title" :columnValue="''" :name="'image'" :model="''" :folderName="'users'"/>
                                    </x-admin.crud.image.card-body>
                                </x-admin.crud.image.card>





                    </x-admin.crud.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <x-admin.back-to-up/>

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader/>


    </x-admin.layout>
