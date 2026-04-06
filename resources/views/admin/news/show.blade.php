
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
                            <div class="col-lg-4">
                                <div class="sticky-side-div">
                                    <div class="card ribbon-box border shadow-none right">
                                        <img src="{{asset('uploads/news/' . $model->image)}}" alt="" class="img-fluid rounded">

                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-8">

                                    <div class="product-content mt-2">
                                       <div class="tab-pane" >
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <tbody>
                                                            @foreach($model->attributes() as $attribute => $title)
                                                                @if(in_array($attribute, $model->translatedAttributes))
                                                                    @foreach($locales as $locale)
                                                                        <tr>
                                                                            <th scope="row" style="width: 200px;">{{ $title . ' (' .str($locale)->upper() . ')'}}</th>
                                                                            <td>{!! $model->{$attribute.':' . $locale} !!}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                @else
                                                                <tr>
                                                                    <td class="table-row-title w-25">{{ $title }}</td>
                                                                    <td class="table-center">
                                                                        @switch($attribute)
                                                                            @case('user_id')
                                                                                {{ $model->user?->name }}
                                                                                @break
                                                                            @case('status')
                                                                                {!! approveDecline($model->{$attribute}) !!}
                                                                                @break

                                                                            @case('images')
                                                                            <div class="flex flex-wrap gap-5">
                                                                                <div class="flex flex-wrap gap-4">
                                                                                    @foreach($model->images as $gallery)
                                                                                        <a href="{{ asset('uploads/news_images/' . $gallery->image) }}" data-fancybox="gallery">
                                                                                            {!! image('news_images', $gallery->image, null, $model->title, 'cursor-pointer', 'width:125px; height:80px; border-radius: 10px; margin: 5px;') !!}
                                                                                        </a>
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>

                                                                                @break
                                                                                      @case('actions')
                                                                                <x-admin.crud.index.actions :model="$model" :routeName="'news'" :td="false" :view="false" :delete="true" :frontRouteName="null"/>
                                                                                @break
                                                                            @default
                                                                                {!! $model->{$attribute} !!}
                                                                        @endswitch
                                                                    </td>
                                                                </tr>
                                                                @endif
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
