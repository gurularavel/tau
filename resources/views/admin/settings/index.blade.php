@php
use App\Enums\SettingType;
@endphp
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

                <x-admin.crud.page-title :title="'Settings'"/>

                <x-admin.crud.index.card>

                    <x-admin.crud.index.card-header :title="'Settings'" :routeName="'settings'"/>

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'"/>


                        {{-- <x-admin.crud.index.search-box :placeholder="'Search for ticket details or something...'"/> --}}

                        {{-- <x-admin.crud.index.status-option/> --}}

                        <x-admin.crud.index.item-list>
                            <x-admin.crud.index.item-table-card>

                                <x-admin.crud.index.item-table>
                                    <x-admin.crud.index.table-thead>


                                            <x-admin.crud.index.check-box-all />
                                            @foreach($headerAttributes as $attribute)
                                                <th>{{ $attributes[$attribute] }}</th>
                                             @endforeach

                                    </x-admin.crud.index.table-thead>

                                    <x-admin.crud.index.table-tbody>
                                        @php
                                        $count = $models->firstItem();
                                        @endphp
                                        @forelse($models as $model)
                                            <tr>
                                                <x-admin.crud.index.check-box />
                                                <x-admin.crud.index.id     :count="$count" />
                                                <x-admin.crud.index.title  :columnName="trans('translate.' . $model->type)" />
                                                <x-admin.crud.index.title  :columnName="$model->keyword" />
                                                @if($model->type == SettingType::FILE?->value)
                                                    <td><a target="_blank" href="{{ asset("/uploads/settings/$model->value") }}">Bax</a></td>
                                                @else
                                                <x-admin.crud.index.title  :columnName="$model->value" />

                                                @endif

                                                <x-admin.crud.index.actions :model="$model" :routeName="'settings'" :view="false"/>
                                                @php $count++ @endphp

                                            </tr>
                                        @empty
                                                <x-admin.crud.index.not-found />
                                        @endforelse




                                    </x-admin.crud.index.table-tbody>
                                </x-admin.crud.index.item-table>

                                <x-admin.crud.index.no-result/>

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
    <x-admin.back-to-up/>

    <!--end back-to-top-->

    <!--preloader-->
    <x-admin.preloader/>


</x-admin.layout>
