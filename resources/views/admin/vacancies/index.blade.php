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
                    <x-admin.crud.index.card-header :title="$title" :routeName="'vacancies'" />

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'" />

                        @if ($models->count() > 0)
                        <div class="d-flex justify-content-end mt-2">
                            <div class="pagination-wrap hstack gap-2">
                                @if ($models->onFirstPage())
                                    <span class="page-item pagination-prev disabled">{{__("translate.Previous")}}</span>
                                @else
                                    <a class="page-item pagination-prev" href="{{ $models->previousPageUrl() }}">{{__("translate.Previous")}}</a>
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
                                    <a class="page-item pagination-next" href="{{ $models->nextPageUrl() }}">{{__("translate.Next")}}</a>
                                @else
                                    <span class="page-item pagination-next disabled">{{__("translate.Next")}}</span>
                                @endif
                            </div>
                        </div>
                        @endif

                        <x-admin.crud.index.item-list>
                            <x-admin.crud.index.item-table-card>
                                <x-admin.crud.index.item-table>
                                    <x-admin.crud.index.table-thead>
                                        <x-admin.crud.index.check-box-all />

                                        {{-- Dinamik başlıqlar --}}
                                        <th>#</th>
                                        <th>{{ __('translate.Title') }}</th>
                                        <th>{{ __('translate.View count') }}</th>
                                        <th>{{ __('translate.Deadline') }}</th>
                                        <th>{{ __('translate.Published') }}</th>
                                        <th>{{ __('translate.Status') }}</th>
                                        <th>{{ __('translate.Actions') }}</th>

                                    </x-admin.crud.index.table-thead>

                                    <x-admin.crud.index.table-tbody>
                                        @php
                                            $count = $models->firstItem();
                                        @endphp
                                        @forelse($models as $model)
                                            <tr>
                                                <x-admin.crud.index.check-box />
                                                <x-admin.crud.index.id :count="$count" />

                                                {{-- Başlıq --}}
                                                <x-admin.crud.index.title :columnName="$model->title" />

                                                {{-- Baxış sayı --}}
                                                <td>
                                                    <span class="badge badge-soft-info">{{ $model->view_counts ?? 0 }}</span>
                                                </td>

                                                {{-- Son müraciət tarixi --}}
                                                <td>
                                                    <span class="text-danger">
                                                        {{ $model->deadline ? $model->deadline->format('d.m.Y') : '---' }}
                                                    </span>
                                                </td>

                                                {{-- Dərc olunma tarixi --}}
                                                <x-admin.crud.index.title :columnName="$model->published_at ? $model->published_at->format('d.m.Y') : '---'" />

                                                {{-- Aktiv/Deaktiv statusu --}}
                                                <x-admin.crud.index.status :model="$model" :name="'is_active'" />

                                                {{-- Əməliyyatlar (Edit/Delete) --}}
                                                <x-admin.crud.index.actions :model="$model" :routeName="'vacancies'"/>

                                                @php $count++ @endphp
                                            </tr>
                                        @empty
                                            <x-admin.crud.index.not-found />
                                        @endforelse
                                    </x-admin.crud.index.table-tbody>
                                </x-admin.crud.index.item-table>

                                <x-admin.crud.index.no-result />
                            </x-admin.crud.index.item-table-card>

                            {{-- Alt Paginasiya --}}
                                                @if ($models->count() > 0)

                        <div class="d-flex justify-content-end mt-2">
                            <div class="pagination-wrap hstack gap-2">
                                <!-- Previous Page Link -->
                                @if ($models->onFirstPage())
                                    <span class="page-item pagination-prev disabled">{{__("translate.Previous")}}</span>
                                @else
                                    <a class="page-item pagination-prev" href="{{ $models->previousPageUrl() }}">{{__("translate.Previous")}}</a>
                                @endif

                                <!-- Pagination Links -->
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

                                <!-- Next Page Link -->
                                @if ($models->hasMorePages())
                                    <a class="page-item pagination-next" href="{{ $models->nextPageUrl() }}">{{__("translate.Next")}}</a>
                                @else
                                    <span class="page-item pagination-next disabled">{{__("translate.Next")}}</span>
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

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>
