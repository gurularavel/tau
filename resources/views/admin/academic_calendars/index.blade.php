<x-admin.layout>

    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>

                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.index.card>

                    <x-admin.crud.index.card-header :title="$title" :routeName="'academic_calendars'" />

                    <x-admin.crud.index.card-body>

                        <x-admin.crud.index.item-list>
                            <x-admin.crud.index.item-table-card>

                                <x-admin.crud.index.item-table>

                                    <x-admin.crud.index.table-thead>
                                        <x-admin.crud.index.check-box-all />
                                        @foreach ($headerAttributes as $attribute)
                                            <th>{{ $attributes[$attribute] }}</th>
                                        @endforeach
                                    </x-admin.crud.index.table-thead>
                                    <x-admin.crud.index.table-tbody>
                                        <x-admin.crud.success-message :delay="'5000'" />

                                        @php

                                            $count = $models->firstItem();
                                        @endphp

                                        @forelse($models as $model)
                                            <tr>
                                                <x-admin.crud.index.check-box />

                                                <td>{{ $count }}</td>

                                                <!-- SUBJECT -->
                                                <td>
                                                    {{ $model->subject ?? '-' }}
                                                </td>

                                                <!-- YEAR -->
                                                <td>{{ $model->academic_year }}</td>

                                                <!-- DATE -->
                                                <td>{{ $model->event_date }}</td>

                                                <!-- REMAINING -->
                                                <td>
                                                        {{ $model->remaining_days }} {{ __('translate.day') }}

                                                </td>

                                                <!-- STATUS -->
                                                <x-admin.crud.index.status :model="$model" :name="'is_active'" />

                                                <!-- ACTIONS -->
                                                <x-admin.crud.index.actions :model="$model" :routeName="'academic_calendars'"  :view="false" :delete2="true"/>

                                                @php $count++ @endphp
                                            </tr>
                                        @empty
                                            <x-admin.crud.index.not-found />
                                        @endforelse

                                    </x-admin.crud.index.table-tbody>

                                </x-admin.crud.index.item-table>

                            </x-admin.crud.index.item-table-card>

                            <!-- PAGINATION -->
                            @if ($models->count())
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $models->links() }}
                                </div>
                            @endif

                        </x-admin.crud.index.item-list>

                    </x-admin.crud.index.card-body>

                </x-admin.crud.index.card>

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>

    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>
