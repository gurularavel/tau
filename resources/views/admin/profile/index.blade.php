
<x-admin.layout>
    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <x-admin.header/>

            <!-- ========== App Menu ========== -->
            <x-admin.app-menu/>
            <!-- Left Sidebar End -->

            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>


            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        <div class="profile-foreground position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg">
                                <img src="{{asset('assets/admin/images/profile-bg.jpg')}}" alt="" class="profile-wid-img" />
                            </div>
                        </div>
                        <div class="pt-4 mb-4 mb-lg-3 pb-lg-4 profile-wrapper">
                            <div class="row g-4">
                                <div class="col-auto">
                                    <div class="avatar-lg">
                                        <img src="{{asset(profileImage('users', $model->image))}}" alt="user-img" class="img-thumbnail rounded-circle" />
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col">
                                    <div class="p-2">
                                        <h3 class="text-white mb-1">{{$model->name ?? ''}}</h3>
                                        <p class="text-white text-opacity-75">{{$model->rolesLabel}}</p>

                                    </div>
                                </div>
                                <!--end col-->

                                <!--end col-->

                            </div>
                            <!--end row-->
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="d-flex profile-wrapper">
                                        <!-- Nav tabs -->
                                        <div class="flex-shrink-0">
                                            <a href="{{route('admin.profile.edit')}}" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> {{__("translate.Edit Profile")}}</a>
                                        </div>
                                    </div>
                                    <!-- Tab panes -->
                                    <div class="tab-content pt-4 text-muted">
                                        <div class="tab-pane active" id="overview-tab" role="tabpanel">
                                            <div class="row">
                                                <div class="col">


                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-3">{{__("translate.Info")}}</h5>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless mb-0">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th class="ps-0" scope="row">{{__('translate.Name')}} :</th>
                                                                            <td class="text-muted">{{$model->name ?? ''}}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th class="ps-0" scope="row">{{__('translate.Email Address')}} :</th>
                                                                            <td class="text-muted">{{$model->email ?? ''}}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th class="ps-0" scope="row">{{__("translate.Joining Date")}}</th>
                                                                            <td class="text-muted">{{$model->created_at}}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div><!-- end card body -->
                                                    </div><!-- end card -->








                                                </div>
                                                <!--end col-->

                                            </div>
                                            <!--end row-->
                                        </div>

                                    </div>
                                    <!--end tab-content-->
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div><!-- container-fluid -->
                </div><!-- End Page-content -->


            </div><!-- end main content-->


        </div>

                <!--start back-to-top-->
        <x-admin.back-to-up/>

        <!--end back-to-top-->

        <!--preloader-->
        <x-admin.preloader/>
        <!-- Theme Settings -->
</x-admin.layout>
