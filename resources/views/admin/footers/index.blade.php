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
                    <x-admin.crud.index.card-header :title="$title" :routeName="'footers'" />

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'" />

                        <x-admin.crud.index.item-list>
                            <x-admin.crud.index.item-table-card>
                                <x-admin.crud.index.item-table>
                                    <x-admin.crud.index.table-thead>
                                        <tr>
                                            <x-admin.crud.index.check-box-all />
                                            @foreach ($headerAttributes as $attribute)
                                                <th>{{ $attributes[$attribute] ?? $attribute }}</th>
                                            @endforeach
                                        </tr>
                                    </x-admin.crud.index.table-thead>

                                    <tbody id="sortable-footer">
                                        @foreach ($models as $model)
                                            <tr data-id="{{ $model->id }}" class="sortable-item">
                                                <td class="handle" style="cursor: move; text-align: center; width: 50px;">
                                                    <i class="ri-drag-move-fill fs-18 text-primary"></i>
                                                </td>

                                                <x-admin.crud.index.id :count="$loop->iteration" />
                                                <x-admin.crud.index.title :columnName="$model->title" />
                                                <x-admin.crud.index.status :model="$model" :name="'is_active'" />

                                                <x-admin.crud.index.actions :model="$model" :routeName="'footers'"
                                                    :view="false" :delete="true" />
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </x-admin.crud.index.item-table>

                                <x-admin.crud.index.no-result />
                            </x-admin.crud.index.item-table-card>
                        </x-admin.crud.index.item-list>
                    </x-admin.crud.index.card-body>
                </x-admin.crud.index.card>
            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />
</x-admin.layout>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(() => {
            const el = document.getElementById('sortable-footer');

            if (el) {
                new Sortable(el, {
                    handle: '.handle',
                    animation: 200,
                    ghostClass: 'bg-soft-primary', // Sürüşdürərkən görünən rəng
                    chosenClass: 'sortable-chosen',

                    onEnd: function() {
                        let order = [];
                        // Yalnız bu cədvəlin daxilindəki sətirləri götürürük
                        el.querySelectorAll('tr').forEach((row, index) => {
                            let id = row.getAttribute('data-id');
                            if (id) {
                                order.push({
                                    id: id,
                                    order: index + 1
                                });
                            }
                        });

                        // API-yə göndərmə
                        fetch("{{ route('admin.footers.order') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "Accept": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({
                                    order: order
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success || data.status === 'success') {
                                    showNotify('success',
                                        "{{ __('translate.Status changed!') }}");

                                }
                            })
                            .catch(error => {
                                showNotify('success',
                                    "{{ __('translate.Error during sorting:') }} " +
                                    error);
                            });
                    }
                });
            } else {
                console.error(
                    "Xəta: 'sortable-footer' ID-li tbody tapılmadı. Zəhmət olmasa HTML strukturunu yoxlayın."
                    );
            }
        }, 300);
    });
</script>
