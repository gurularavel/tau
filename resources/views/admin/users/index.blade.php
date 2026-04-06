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

                <x-admin.crud.index.card>

                    <x-admin.crud.index.card-header :title="$title" :routeName="'users'" />

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'" />


                        {{-- <x-admin.crud.index.search-box :placeholder="'Search for ticket details or something...'"/> --}}

                        {{-- <x-admin.crud.index.status-option/> --}}

                        <x-admin.crud.index.item-list>
                            <x-admin.crud.index.item-table-card>

                                <x-admin.crud.index.item-table>
                                    <x-admin.crud.index.table-thead>


                                        <x-admin.crud.index.check-box-all />
                                        @foreach ($headerAttributes as $attribute)
                                            <th>{{ $attributes[$attribute] }}</th>
                                        @endforeach

                                    </x-admin.crud.index.table-thead>
                                    @php
                                        $count = $models->firstItem();
                                    @endphp
                                    <x-admin.crud.index.table-tbody>
                                        @forelse($models as $model)
                                            <tr>
                                                <x-admin.crud.index.check-box />
                                                <x-admin.crud.index.id :count="$count" />
                                                <x-admin.crud.index.image :columnName="$model->image" :folderName="'users'" />
                                                <x-admin.crud.index.title :columnName="$model->name" />
                                                <x-admin.crud.index.title :columnName="$model->email" />
                                                <x-admin.crud.index.title :columnName="implode(', ', $model->getRoleNames()->toArray())" />
                                                <x-admin.crud.index.actions :model="$model" :routeName="'users'" :delete="true" />
                                                @php $count++ @endphp

                                            </tr>
                                        @empty
                                            <x-admin.crud.index.not-found />
                                        @endforelse




                                    </x-admin.crud.index.table-tbody>
                                </x-admin.crud.index.item-table>

                                <x-admin.crud.index.no-result />

                            </x-admin.crud.index.item-table-card>

                            {{-- <x-admin.crud.index.pagination/> --}}


                        </x-admin.crud.index.item-list>

                    </x-admin.crud.index.card-body>

                </x-admin.crud.index.card>

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
