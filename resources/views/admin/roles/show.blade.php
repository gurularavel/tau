
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
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4">

                            <div class="col-lg-8">
                                <div>
                                    <div class="dropdown float-end">
                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle fs-16"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item view-item-btn" href="javascript:void(0);"><i class="ri-eye-fill align-bottom me-2 text-muted"></i>View</a></li>
                                            <li><a class="dropdown-item edit-item-btn" href="{{route('admin.roles.edit', $model)}}"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                            <li><a class="dropdown-item remove-item-btn" href="#!"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a></li>
                                        </ul>
                                    </div>

                                    </div>

                                    <div class="product-content mt-2">
                                       <div class="tab-pane" >
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            @foreach($model->attributes() as $attribute => $title)

                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">{{ $title }}</th>
                                                                            <td>
                                                                            @switch($attribute)
                                                                                @case('permissions_id')
                                                                                    {{ $model->permissionsLabel }}
                                                                                    @break
                                                                                @default
                                                                                    {{ $model->{$attribute} }}
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
    <x-admin.back-to-up/>

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader/>

</x-admin.layout>
