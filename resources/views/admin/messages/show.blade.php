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
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4">

                            <div class="col-lg-12">


                                <div class="product-content mt-2">
                                    <div class="tab-pane">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    @foreach ($model->attributes() as $attribute => $title)
                                                        <tr>
                                                            <td class="table-row-title w-25">{{ $title }}</td>
                                                            <td class="table-center">
                                                                @switch($attribute)
                                                                    @case('actions')
                                                                        <x-admin.crud.index.actions :model="$model"
                                                                            :routeName="'messages'" :td="false"
                                                                            :view="false" :delete="true"/>
                                                                    @break

                                                                    @default
                                                                        {!! $model->{$attribute} !!}
                                                                @endswitch
                                                            </td>
                                                        </tr>
                                                    @endforeach


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div><!--end card-->
            </x-admin.crud.page-content>
        </x-admin.crud.main-content>


    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <x-admin.back-to-up />

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader />

</x-admin.layout>
