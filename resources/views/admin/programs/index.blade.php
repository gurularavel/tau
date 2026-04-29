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

                <x-admin.crud.index.card>

                    <x-admin.crud.index.card-header :title="$title" :routeName="'programs'"/>

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'"/>

                        @if ($models->count() > 0)
                            <div class="d-flex justify-content-end mt-2">
                                <div class="pagination-wrap hstack gap-2">
                                    @if ($models->onFirstPage())
                                        <span class="page-item pagination-prev disabled">{{ __('translate.Previous') }}</span>
                                    @else
                                        <a class="page-item pagination-prev" href="{{ $models->previousPageUrl() }}">{{ __('translate.Previous') }}</a>
                                    @endif
                                    <ul class="pagination listjs-pagination mb-0">
                                        @foreach ($models->appends(request()->query())->links()->elements as $element)
                                            @if (is_array($element))
                                                @foreach ($element as $page => $url)
                                                    <li class="page-item{{ $models->currentPage() == $page ? ' active' : '' }}">
                                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($models->hasMorePages())
                                        <a class="page-item pagination-next" href="{{ $models->nextPageUrl() }}">{{ __('translate.Next') }}</a>
                                    @else
                                        <span class="page-item pagination-next disabled">{{ __('translate.Next') }}</span>
                                    @endif
                                </div>
                            </div>
                        @endif

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
                                                <x-admin.crud.index.title   :columnName="$model->title" />
                                                <x-admin.crud.index.title   :columnName="$model->slug" :hyperlink="true" :hyperlinkValue="route('front.programs.show', $model->slug)"/>
                                                <x-admin.crud.index.status :model="$model" :name="'is_active'"/>
                                                <x-admin.crud.index.actions :model="$model" :routeName="'programs'" :delete="true" :view="false"/>
                                                <td>
                                                    <form method="POST" action="{{ route('admin.programs.duplicate', $model) }}" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-outline-info" title="{{ __('translate.Duplicate') }}">
                                                            <i class="ri-file-copy-line"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                @php $count++ @endphp
                                            </tr>
                                        @empty
                                                <x-admin.crud.index.not-found />
                                        @endforelse




                                    </x-admin.crud.index.table-tbody>
                                </x-admin.crud.index.item-table>

                                <x-admin.crud.index.no-result/>

                            </x-admin.crud.index.item-table-card>

                            @if ($models->count() > 0)
                                <div class="d-flex justify-content-end mt-2">
                                    <div class="pagination-wrap hstack gap-2">
                                        @if ($models->onFirstPage())
                                            <span class="page-item pagination-prev disabled">{{ __('translate.Previous') }}</span>
                                        @else
                                            <a class="page-item pagination-prev" href="{{ $models->previousPageUrl() }}">{{ __('translate.Previous') }}</a>
                                        @endif
                                        <ul class="pagination listjs-pagination mb-0">
                                            @foreach ($models->appends(request()->query())->links()->elements as $element)
                                                @if (is_array($element))
                                                    @foreach ($element as $page => $url)
                                                        <li class="page-item{{ $models->currentPage() == $page ? ' active' : '' }}">
                                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                        </ul>
                                        @if ($models->hasMorePages())
                                            <a class="page-item pagination-next" href="{{ $models->nextPageUrl() }}">{{ __('translate.Next') }}</a>
                                        @else
                                            <span class="page-item pagination-next disabled">{{ __('translate.Next') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif

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
