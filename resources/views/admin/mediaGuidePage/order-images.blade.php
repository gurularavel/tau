<x-admin.layout>


    <style>
        .sortable-ghost {
            opacity: 0.4;
        }

        .cursor-move {
            cursor: grab;
        }
    </style>

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
                    <x-admin.crud.success-message :delay="'5000'" />

        <x-admin.crud.main-content>

            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="$title" />


                <x-admin.crud.card :routeName="'mediaGuidePage.order-images.update'" :method="'update'" :model="$model" :backButtonURL="route('admin.mediaGuidePage.edit', $model)">




                       <div class="card">
                        <div class="card-body row" id="sortable-images">
                            @foreach ($images as $image)
                                <div class="col-lg-3 col-md-4 col-sm-6 mb-4 image-item" data-id="{{ $image->id }}">
                                    <div class="d-flex flex-column align-items-center cursor-move">
                                        <img src="{{ getImage('media_guide_page_images', $image->image) }}"
                                            alt="{{ $image->image }}" width="150" height="150"
                                            data-fancybox="gallery"
                                            style="cursor: grab; border-radius: 8px; border: 1px solid #ddd; margin-bottom: 8px;">

                                        <input type="hidden" name="imageOrders[{{ $image->id }}]"
                                            value="{{ $image->order }}" class="image-order">
                                    </div>
                                </div>
                            @endforeach
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
