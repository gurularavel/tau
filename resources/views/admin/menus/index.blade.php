<x-admin.layout>

    <style>
        /* Ümumi konteyner */
        .draggable-item {
            cursor: grab;
            user-select: none;
            margin-bottom: 8px;
        }

        /* 1. ANA MENYU STİLİ (Yalnız block-list-in birbaşa övladları) */
        #block-list>.draggable-item>.main-card {
            padding: 14px 16px !important;
            min-height: 70px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e9ecef;
            transition: all .2s ease;
        }

        #block-list>.draggable-item>.main-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, .08);
            transform: translateY(-1px);
        }


        /* Kəsik xətt və sürüşdürmə (İyerarxiya xətti) */
        .nested-sortable {
            border-left: 2px dashed #cbd5e0 !important;
            margin-left: 45px !important;
            padding-left: 15px !important;
            margin-top: 5px;
            margin-bottom: 15px;
            min-height: 5px;
        }

        /* Kölgə effekti (Sürüklənəndə) */
        .bg-light-blue {
            background-color: #f0f7ff !important;
            border: 1px solid #3f80ea !important;
            opacity: 0.6;
        }

        .edit-btn-static {
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 6px;
            background: #edf2f7;
            text-decoration: none;
            color: #4a5568;
            transition: background .2s;
        }

        .edit-btn-static:hover {
            background: #e2e8f0;
        }

        /* Alt menyuların konteyneri üçün Grid ayarı */
        .nested-sortable.row {
            margin-left: 35px !important;
            /* Kəsik xətt üçün yer */
            padding-left: 10px !important;
            border-left: 2px dashed #cbd5e0;
        }

        /* Draggable item daxilindəki sub-item */
        .sub-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 12px !important;
            background: #f8f9fa !important;
            border: 1px solid #e2e8f0 !important;
            border-radius: 8px;
            transition: background .2s;
        }

        /* Small blocks yan-yana gələndə margin-bottom-u Bootstrap 'g-2' idarə edir */
        .draggable-item {
            margin-bottom: 0px !important;
            /* Row daxilində gap istifadə edirik */
            padding: 5px !important;
            /* Elementlər arası məsafə */
        }

        /* Sürüşdürülən elementin (hayalət) ölçüsü pozulmasın */
        .bg-light-blue {
            min-height: 50px;
        }

        /* Accordion toggle */
        .toggle-children {
            background: none;
            border: none;
            padding: 4px 8px;
            border-radius: 6px;
            cursor: pointer;
            color: #6c757d;
            transition: background .2s, transform .25s ease;
            line-height: 1;
        }
        .toggle-children:hover { background: #f1f3f5; color: #343a40; }
        .toggle-children .ri { font-size: 18px; transition: transform .25s ease; }
        .toggle-children.open .ri { transform: rotate(90deg); }

        .nested-sortable {
            overflow: hidden;
            transition: max-height .3s ease, opacity .3s ease;
        }
        .nested-sortable.collapsed {
            max-height: 0 !important;
            opacity: 0;
            pointer-events: none;
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }

        .children-count {
            font-size: 11px;
            color: #6c757d;
            margin-left: 6px;
        }
    </style>

    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />

        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                <x-admin.crud.index.card>
                    <x-admin.crud.index.card-header :title="$title" :routeName="'menus'" />

                    <x-admin.crud.index.card-body>
                        <x-admin.crud.success-message :delay="'5000'" />

                        <div class="product-content mt-3" id="block-list">
                            @foreach ($models->whereNull('parent_id')->sortBy('order') as $parent)
                                <div class="draggable-item" data-id="{{ $parent->id }}">

                                    {{-- ANA MENYU KARTI --}}
                                    <div class="main-card">
                                        <div class="d-flex align-items-center">
                                            @if($parent->children->count() > 0)
                                                <button type="button"
                                                        class="toggle-children me-2"
                                                        data-target="children-{{ $parent->id }}"
                                                        title="Expand/Collapse">
                                                    <i class="ri ri-arrow-right-s-line"></i>
                                                </button>
                                            @else
                                                <span style="width:32px; display:inline-block;"></span>
                                            @endif
                                            <i class="ri-drag-move-2-line me-2 text-muted"></i>
                                            <strong style="font-size: 15px;">{{ $parent->title }}</strong>
                                            <span class="badge bg-primary-subtle text-primary ms-2">{{ __('translate.Main Menu') }}</span>
                                            @if($parent->children->count() > 0)
                                                <span class="children-count">({{ $parent->children->count() }})</span>
                                            @endif
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            @include('components.admin.crud.status-badge', ['model' => $parent])
                                            <a href="{{ route('admin.menus.edit', $parent) }}" class="edit-btn-static">
                                                {{ __('translate.edit') }}
                                            </a>
                                            @can('delete', $parent)
                                            <button type="button" class="btn btn-danger btn-sm"
                                                    style="cursor:pointer; font-size:12px; padding:4px 8px;"
                                                    onclick="deleteMenu({{ $parent->id }}, this, 'parent')">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                            @endcan
                                        </div>
                                    </div>

                                    {{-- ALT MENYULAR --}}
                                    <div class="nested-sortable row g-2 collapsed" id="children-{{ $parent->id }}" data-parent-id="{{ $parent->id }}">
                                        @foreach ($parent->children->sortBy('order') as $child)
                                            {{-- Əgər tip small_blocks-dursa col-md-6 (2*2 üçün), deyilsə tam en (col-12) --}}
                                            <div class="draggable-item {{ $child->type == 'small_block' ? 'col-md-6' : 'col-12' }}"
                                                data-id="{{ $child->id }}">
                                                <div class="sub-item h-100"> {{-- h-100 hündürlükləri bərabərləşdirir --}}
                                                    <div class="d-flex align-items-center overflow-hidden">
                                                        <i
                                                            class="ri-arrow-right-line me-2 text-muted flex-shrink-0"></i>
                                                        <div class="text-truncate">
                                                            <span style="font-size: 14px; display: block;"
                                                                class="text-truncate">{{ $child->title }}</span>
                                                            {{-- <small class="text-muted"
                                                                style="font-size: 11px;">({{ $child->type }})</small> --}}
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-center gap-2 flex-shrink-0">
                                                        @include('components.admin.crud.status-badge', [
                                                            'model' => $child,
                                                        ])
                                                        <a href="{{ route('admin.menus.edit', $child) }}"
                                                            class="edit-btn-static" style="font-size: 11px;">
                                                            {{ __('translate.edit') }}
                                                        </a>
                                                        @can('delete', $child)
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                                style="cursor:pointer; font-size:11px; padding:3px 7px;"
                                                                onclick="deleteMenu({{ $child->id }}, this, 'child')">
                                                            <i class="ri-delete-bin-line"></i>
                                                        </button>
                                                        @endcan
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </x-admin.crud.index.card-body>
                </x-admin.crud.index.card>
            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>

    <x-admin.back-to-up />
    <x-admin.preloader />

</x-admin.layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const blockList = document.getElementById('block-list');
        if (!blockList) return;

        // --- Accordion ---
        const STORAGE_KEY = 'menu_accordion_state';
        let openIds = JSON.parse(localStorage.getItem(STORAGE_KEY) || '[]');

        function setHeight(panel) {
            if (!panel.classList.contains('collapsed')) {
                panel.style.maxHeight = panel.scrollHeight + 'px';
            }
        }

        function openPanel(btn, panel) {
            panel.classList.remove('collapsed');
            panel.style.maxHeight = panel.scrollHeight + 'px';
            panel.style.opacity  = '1';
            btn.classList.add('open');
        }

        function closePanel(btn, panel) {
            panel.style.maxHeight = '0';
            panel.style.opacity   = '0';
            panel.classList.add('collapsed');
            btn.classList.remove('open');
        }

        document.querySelectorAll('.toggle-children').forEach(btn => {
            const targetId = btn.dataset.target;
            const panel    = document.getElementById(targetId);
            if (!panel) return;

            // Restore saved state
            if (openIds.includes(targetId)) {
                openPanel(btn, panel);
            }

            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isOpen = !panel.classList.contains('collapsed');
                if (isOpen) {
                    closePanel(btn, panel);
                    openIds = openIds.filter(id => id !== targetId);
                } else {
                    openPanel(btn, panel);
                    if (!openIds.includes(targetId)) openIds.push(targetId);
                }
                localStorage.setItem(STORAGE_KEY, JSON.stringify(openIds));
            });
        });
        // --- /Accordion ---

        // Bütün konteynerləri aktivləşdir
        const setupSortable = (el) => {
            new Sortable(el, {
                group: 'nested',
                animation: 150,
                fallbackOnBody: true,
                swapThreshold: 0.65,
                ghostClass: 'bg-light-blue',
                onEnd: () => saveOrder()
            });
        };

        setupSortable(blockList);
        document.querySelectorAll('.nested-sortable').forEach(setupSortable);

        function saveOrder() {
            let orders = [];

            // 1. Ana menyuların sırası
            document.querySelectorAll('#block-list > .draggable-item').forEach((el, index) => {
                orders.push({
                    id: el.dataset.id,
                    order: index + 1
                });
            });

            // 2. Alt menyuların öz daxilindəki sırası
            document.querySelectorAll('.nested-sortable').forEach(container => {
                container.querySelectorAll(':scope > .draggable-item').forEach((el, index) => {
                    orders.push({
                        id: el.dataset.id,
                        order: index + 1
                    });
                });
            });

            fetch("{{ route($path . 'order') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        orders: orders
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        showNotify('success', "{{ __('translate.Sorting updated successfully.') }}");
                    }
                })
                .catch(() => showNotify('error', "{{ __('translate.An error occurred!') }}"));
        }


    });
</script>
<script>
    function deleteMenu(id, btn, type) {
        if (!confirm('{{ __('translate.Are you sure?') }}')) return;

        btn.disabled = true;

        const deleteUrl = '{{ route("admin.menus.destroy", "__ID__") }}'.replace('__ID__', id);
        fetch(deleteUrl, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            }
        })
        .then(r => r.json())
        .then(data => {
            if (data.success) {
                const draggableItem = btn.closest('.draggable-item');
                if (type === 'child') {
                    // Update parent's children count
                    const nestedSortable = draggableItem.closest('.nested-sortable');
                    if (nestedSortable) {
                        const parentId = nestedSortable.dataset.parentId;
                        const parentItem = document.querySelector('#block-list > .draggable-item[data-id="' + parentId + '"]');
                        draggableItem.remove();
                        const remaining = nestedSortable.querySelectorAll(':scope > .draggable-item').length;
                        if (parentItem) {
                            const countEl = parentItem.querySelector('.children-count');
                            if (countEl) {
                                if (remaining > 0) {
                                    countEl.textContent = '(' + remaining + ')';
                                } else {
                                    countEl.remove();
                                    // Hide toggle button if no children left
                                    const toggleBtn = parentItem.querySelector('.toggle-children');
                                    if (toggleBtn) {
                                        toggleBtn.style.display = 'none';
                                    }
                                }
                            }
                        }
                    }
                } else {
                    draggableItem.remove();
                }
                showNotify('success', '{{ __('translate.Successfully completed') }}');
            } else {
                btn.disabled = false;
                showNotify('error', '{{ __('translate.An error occurred!') }}');
            }
        })
        .catch(() => {
            btn.disabled = false;
            showNotify('error', '{{ __('translate.An error occurred!') }}');
        });
    }
</script>
<script>
    document.addEventListener('click', function(e) {
    // Status badge-i olan wrapper-i tapırıq
    const wrapper = e.target.closest('.status-toggle-wrapper');
    if (!wrapper) return;

    const id = wrapper.dataset.id;
    const badge = wrapper.querySelector('.status-badge');

    // Serverə sorğu göndəririk
    fetch("{{ route($path.'toggleStatus') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({ id: id })
    })
    .then(res => res.json())
    .then(data => {
        if (data.status === 'success') {
            // Vizual olaraq badge-i dəyişirik
            if (data.is_active) {
                badge.className = 'badge bg-success-subtle text-success text-uppercase status-badge';
                badge.innerText = "{{ __('translate.active') }}";
            } else {
                badge.className = 'badge bg-danger-subtle text-danger text-uppercase status-badge';
                badge.innerText = "{{ __('translate.inactive') }}";
            }

             showNotify('success',
                                        "{{ __('translate.Status changed!') }}");
        }
    })
    .catch(() => showNotify('error', "{{ __('translate.An error occurred!') }}"));

});
</script>


