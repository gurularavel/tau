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


                    <x-admin.crud.card :routeName="'sliders.store'" :method="'post'">


                                <x-admin.crud.nav>

                                    @foreach($locales as $key => $locale)
                                    <x-admin.crud.nav-item :locale="$locale" :key="$key"/>
                                    @endforeach



                                </x-admin.crud.nav>

                                <x-admin.crud.tab-content>

                                    @foreach($locales as $key => $locale)
                                        <x-admin.crud.tab-pane :key="$key">
                                            <x-admin.crud.card-body-row>


                                                <div class="mb-3 col-lg-12">
                                                    <x-admin.crud.input :locale="$locale" :model="''" :columnName="'title'" :label="'title'" :placeholder="'Write a title'" :type="'text'" :required="false"/>
                                                </div>

                                                <div class="mt-5">
                                                    <x-admin.crud.textarea :locale="$locale" :model="''" :columnName="'content'" :label="'content'" :summerNoteID="''"/>
                                                </div>
                                                <x-admin.crud.all-errors :errors="$errors"/>

                                            </x-admin.crud.card-body-row>


                                        </x-admin.crud.tab-pane>
                                    @endforeach
                                    <div class="mb-3 col-lg-12">
                                        <x-admin.crud.input :locale="''" :model="''" :columnName="'link'" :label="'URL'" :placeholder="'Write a video url'" :type="'text'" :required="true"/>
                                    </div>

                                </x-admin.crud.tab-content>

                                <x-admin.crud.image.card :title="$title">
                                    <x-admin.crud.image.card-body>
                                        <x-admin.crud.image.main-image :columnValue="''" :name="'image'" :folderName="'sliders'"/>
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
