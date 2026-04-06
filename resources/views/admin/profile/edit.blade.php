
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

                        <div class="position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg profile-setting-img">
                                <img src="{{asset('back/assets/images/profile-bg.jpg')}}" class="profile-wid-img" alt="">
                                <div class="overlay-content">
                                    <div class="text-end p-3">
                                        {{-- <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                            <input id="profile-foreground-img-file-input" type="file" class="profile-foreground-img-file-input">
                                            <label for="profile-foreground-img-file-input" class="profile-photo-edit btn btn-light">
                                                <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                            </label>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xxl-3">
                                <div class="card mt-n5">
                                    <div class="card-body p-4">
                                        <div class="text-center">
                                            <form action="{{route('admin.profile.update')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                                <img src="{{asset(profileImage('users', $model->image))}}" class="rounded-circle avatar-xl img-thumbnail user-profile-image material-shadow" alt="user-profile-image">
                                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                                    <input id="profile-img-file-input" name="image"  type="file" class="profile-img-file-input">
                                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                                        <span class="avatar-title rounded-circle bg-light text-body material-shadow">
                                                            <i class="ri-camera-fill"></i>
                                                        </span>
                                                    </label>
                                                </div>
                                            </div>
                                            <h5 class="fs-16 mb-1">{{$model->name ?? ''}}</h5>
                                            <p class="text-muted mb-0">{{$model->rolesLabel}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end card-->
                            </div>
                            <!--end col-->
                            <div class="col-xxl-9">
                                <div class="card mt-xxl-n5">
                                    <div class="card-header">
                                        <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                                    <i class="fas fa-home"></i> {{__("translate.Personal Details")}}
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                                    <i class="far fa-user"></i>{{__("translate.Change Password")}}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="card-body p-4">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label  class="form-label">{{__('translate.Name')}}</label>
                                                                <input name="name" type="text" class="form-control" placeholder="{{__("translate.Enter your firstname")}}" value="{{old('name', $model->name)}}">
                                                            </div>
                                                        </div>
                                                        <!--end col-->

                                                        <div class="col-lg-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">{{__('translate.Email Address')}}</label>
                                                                <input name="email" type="email" class="form-control" placeholder="{{__("translate.Enter your email")}}" value="{{old('name', $model->email)}}">
                                                            </div>
                                                        </div>
                                                        <x-admin.crud.success-message :delay="'5000'"/>
                                                        <x-admin.crud.all-errors :errors="$errors"/>


                                                        <!--end col-->
                                                        <div class="col-lg-12">
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <button type="submit" class="btn btn-primary">{{__("translate.Update")}}</button>
                                                                <button type="button" class="btn btn-soft-success" onclick="window.location.href='{{ route('admin.profile.show') }}'">
                                                                    {{ __("translate.Cancel") }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                            <!--end tab-pane-->
                                            <div class="tab-pane" id="changePassword" role="tabpanel">
                                                <form action="{{route('admin.change-password.store')}}" method="POST">
                                                    @csrf
                                                    <div class="row g-2">

                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <label class="form-label">{{__('translate.New Password')}}*</label>
                                                                <input name="password" type="password" class="form-control"  placeholder="{{__("translate.Enter new password")}}">
                                                            </div>
                                                        </div>


                                                        <!--end col-->
                                                        <div class="col-lg-6">
                                                                <button style="margin-top: 27px;" type="submit" class="btn btn-success">{{__('translate.Change Password')}}</button>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                    <!--end row-->
                                                </form>
                                            </div>
                                            <!--end tab-pane-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                    </div>
                    <!-- container-fluid -->
                </div><!-- End Page-content -->


            </div>
            <!-- end main content-->



        </div>

                <!--start back-to-top-->
        <x-admin.back-to-up/>

        <!--end back-to-top-->

        <!--preloader-->
        <x-admin.preloader/>
        <!-- Theme Settings -->
</x-admin.layout>

