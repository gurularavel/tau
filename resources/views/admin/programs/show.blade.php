<x-admin.layout>
    <style>
        #admin-notify-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .admin-notify {
            min-width: 250px;
            max-width: 350px;
            margin-bottom: 10px;
            padding: 12px 16px;
            border-radius: 6px;
            font-size: 14px;
            color: #fff;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .15);
            animation: slideIn .25s ease-out;
        }

        .admin-notify.success {
            background: #28a745;
        }

        .admin-notify.error {
            background: #dc3545;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(15px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
    </style>
    <div id="admin-notify-container"></div>
    <div id="layout-wrapper">
        <x-admin.header />
        <x-admin.remove-notification />
        <x-admin.app-menu />
        <div class="vertical-overlay"></div>

        <x-admin.crud.main-content>
            <x-admin.crud.page-content>
                <x-admin.crud.page-title :title="$title" />

                {{-- <div class="card">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-lg-12">
                                <div class="product-content mt-2">
                                    <div class="tab-pane">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    @foreach ($model->attributes() as $attribute => $title)
                                                        @if (in_array($attribute, $model->translatedAttributes))
                                                            @foreach ($locales as $locale)
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
                                                                        @case('is_active')
                                                                            {!! approveDecline($model->{$attribute}) !!}
                                                                            @break
                                                                        @case('actions')
                                                                            <x-admin.crud.index.actions :model="$model" :routeName="'pages'" :td="false" :view="false" :delete="true"/>
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
                    </div>
                </div> --}}

                {{-- Dynamics Section --}}
                @php
                    $dynamics = $model->dynamics();
                    $hasDynamics =
                        $dynamics instanceof \Illuminate\Support\Collection
                            ? $dynamics->isNotEmpty()
                            : is_array($dynamics) && count($dynamics) > 0;
                @endphp

                @if ($hasDynamics)
                    <div class="card mt-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">
                                <i class="ri-layout-grid-line"></i> Dynamic Content Layout
                            </h5>

                            <button type="button" class="btn btn-primary btn-sm" id="saveDynamicsLayout">
                                <i class="ri-save-line"></i> Save Layout
                            </button>
                            <a onclick="history.back();" class="btn btn-warning btn-sm">
                                <i class="ri-arrow-left-line"></i> {{ __('translate.Back') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-info">
                                <i class="ri-information-line"></i> Drag and drop dynamics to arrange them in rows and
                                columns
                            </div>

                            <div id="dynamics-grid-container">
                                @php
                                    // Collection-a çevir və qruplaşdır
                                    $dynamicsCollection = collect($dynamics);
                                    $dynamicsByRow = $dynamicsCollection->sortBy('layout_row')->groupBy('layout_row');
                                @endphp

                                @foreach ($dynamicsByRow as $rowNumber => $rowDynamics)
                                    <div class="dynamics-row" data-row="{{ $rowNumber }}">
                                        <div class="row-header">
                                            <span class="row-label">Row {{ $rowNumber }}</span>
                                            <button type="button" class="btn btn-sm btn-outline-danger remove-row">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>

                                        <div class="row g-3">
                                            @foreach ($rowDynamics->sortBy('layout_column') as $dynamic)
                                                <div class="col-lg-{{ $dynamic->layout_width === 'half' ? '6' : '12' }} dynamic-item"
                                                    data-id="{{ $dynamic->id }}" data-row="{{ $dynamic->layout_row }}"
                                                    data-column="{{ $dynamic->layout_column }}"
                                                    data-width="{{ $dynamic->layout_width }}">

                                                    <div class="dynamic-card">
                                                        <div class="dynamic-card-header">
                                                            <div class="drag-handle">
                                                                <i class="ri-draggable"></i>
                                                            </div>
                                                            <span class="dynamic-type-badge">
                                                                {{ $dynamic->getTypeName() }}
                                                            </span>
                                                            <div class="dynamic-actions">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-light toggle-width"
                                                                    title="Toggle Width">
                                                                    <i
                                                                        class="ri-layout-{{ $dynamic->layout_width === 'half' ? 'column' : 'row' }}-line"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <div class="dynamic-card-body">
                                                            @switch($dynamic->type)
                                                                @case(1)
                                                                    {{-- Title --}}
                                                                    <h5>{{ $dynamic->title }}</h5>
                                                                @break

                                                                @case(2)
                                                                    {{-- Description --}}
                                                                    <p class="text-muted">{!! $dynamic->description !!}</p>
                                                                @break

                                                                @case(3)
                                                                    {{-- Image --}}
                                                                    @if ($dynamic->image)
                                                                        <img src="/uploads/program_dynamics/{{ $dynamic->image }}"
                                                                            class="img-fluid rounded"
                                                                            style="max-height: 200px; object-fit: cover;">
                                                                    @endif
                                                                @break

                                                                @case(4)
                                                                    {{-- Video --}}
                                                                    @if ($dynamic->video)
                                                                        <div class="ratio ratio-16x9">
                                                                            <iframe src="{{ $dynamic->getVideoEmbedUrl() }}"
                                                                                allowfullscreen></iframe>
                                                                        </div>
                                                                    @endif
                                                                @break

                                                                @case(5)
                                                                    {{-- Multiple Images --}}
                                                                    @if ($dynamic->images && $dynamic->images->count() > 0)
                                                                        <div class="row g-2">
                                                                            @foreach ($dynamic->images->take(4) as $img)
                                                                                <div class="col-6">
                                                                                    <img src="/uploads/program_dynamics/{{ $img->image }}"
                                                                                        class="img-fluid rounded">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                @break

                                                                @case(6)
                                                                    {{-- Dynamic Items --}}
                                                                    @if ($dynamic->items && $dynamic->items->count() > 0)
                                                                        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
                                                                            @foreach ($dynamic->items->take(3) as $item)
                                                                                <div
                                                                                    style="flex: 0 0 calc(33.333% - 14px); min-width: 0; box-sizing: border-box;">
                                                                                    @switch($item->type)
                                                                                        @case(4)
                                                                                            <strong>{{ $item->title }}</strong>
                                                                                            <p>{!! $item->description !!}</p>
                                                                                        @break



                                                                                        @case(6)
                                                                                            {{-- Type 6: image, name, profession, email, phone --}}
                                                                                            @if ($item->image)
                                                                                                <img src="{{ getImage('program_dynamic_items', $item->image) }}"
                                                                                                    alt="{{ $item->name }}"
                                                                                                    style="width:30%; border-radius:8px; margin-bottom:8px;" />
                                                                                            @endif
                                                                                            <p><strong>{{ $item->name }}</strong></p>
                                                                                            <p>{{ $item->profession }}</p>
                                                                                            <p>{{ $item->email }}</p>
                                                                                            <p>{{ $item->phone }}</p>
                                                                                        @break

                                                                                        @default
                                                                                            {{-- Digər type-lar: image, title, description --}}
                                                                                            @if ($item->image)
                                                                                                <img src="{{ getImage('program_dynamic_items', $item->image) }}"
                                                                                                    alt="{{ $item->title }}"
                                                                                                    style="width:30%; border-radius:8px; margin-bottom:8px;" />
                                                                                            @endif
                                                                                            <strong>{{ $item->title }}</strong>
                                                                                            <p class="mb-0 small text-muted">
                                                                                                {!! $item->description !!}</p>
                                                                                    @endswitch
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                    @endif
                                                                @break
                                                            @endswitch
                                                        </div>

                                                        <div class="dynamic-card-footer">
                                                            <small class="text-muted">
                                                                Order: {{ $dynamic->order }} |
                                                                Row: {{ $dynamic->layout_row ?? 1 }} |
                                                                Col: {{ $dynamic->layout_column ?? 1 }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <button type="button" class="btn btn-success mt-3" id="addNewRow">
                                <i class="ri-add-line"></i> Add New Row
                            </button>
                        </div>
                    </div>
                @endif

            </x-admin.crud.page-content>
        </x-admin.crud.main-content>
    </div>


    <x-admin.back-to-up />
    <x-admin.preloader />

    <style>
        .img-fluid {
            max-width: 20%;
            height: auto;
            display: block;
        }

        .dynamics-row {
            background: #f8f9fa;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
            position: relative;
        }

        .row-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #dee2e6;
        }

        .row-label {
            font-weight: 600;
            font-size: 16px;
            color: #495057;
        }

        .dynamic-card {
            background: white;
            border: 2px solid #dee2e6;
            border-radius: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
        }

        .dynamic-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .dynamic-card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .drag-handle {
            cursor: move;
            font-size: 20px;
        }

        .dynamic-type-badge {
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .dynamic-card-body {
            padding: 15px;
            min-height: 150px;
        }

        .dynamic-card-footer {
            padding: 10px 15px;
            background: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }

        .dynamic-item {
            cursor: move;
        }

        .dynamic-item.dragging {
            opacity: 0.5;
        }

        .dynamic-item.drag-over {
            border: 2px dashed #667eea;
        }

        .sortable-ghost {
            opacity: 0.4;
            background: #e9ecef;
        }

        .sortable-chosen {
            cursor: grabbing;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Her row üçün Sortable initialize et
            const rows = document.querySelectorAll('.dynamics-row .row');

            rows.forEach(row => {
                new Sortable(row, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    draggable: '.dynamic-item',
                    group: 'shared',
                    onEnd: function(evt) {
                        updateDynamicPositions();
                    }
                });
            });

            // Toggle width functionality
            document.querySelectorAll('.toggle-width').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const item = this.closest('.dynamic-item');
                    const currentWidth = item.dataset.width;
                    const newWidth = currentWidth === 'half' ? 'full' : 'half';

                    item.dataset.width = newWidth;
                    item.classList.remove('col-lg-6', 'col-lg-12');
                    item.classList.add(newWidth === 'half' ? 'col-lg-6' : 'col-lg-12');

                    const icon = this.querySelector('i');
                    icon.className = newWidth === 'half' ? 'ri-layout-column-line' :
                        'ri-layout-row-line';

                    updateDynamicPositions();
                });
            });

            // Add new row
            document.getElementById('addNewRow')?.addEventListener('click', function() {
                const container = document.getElementById('dynamics-grid-container');
                const rows = container.querySelectorAll('.dynamics-row');
                const newRowNumber = rows.length + 1;

                const newRowHtml = `
                    <div class="dynamics-row" data-row="${newRowNumber}">
                        <div class="row-header">
                            <span class="row-label">Row ${newRowNumber}</span>
                            <button type="button" class="btn btn-sm btn-outline-danger remove-row">
                                <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                        <div class="row g-3">
                            <div class="col-12 text-center text-muted py-5">
                                Drag dynamics here
                            </div>
                        </div>
                    </div>
                `;

                container.insertAdjacentHTML('beforeend', newRowHtml);

                // Initialize Sortable for new row
                const newRow = container.querySelector('.dynamics-row:last-child .row');
                new Sortable(newRow, {
                    animation: 150,
                    handle: '.drag-handle',
                    ghostClass: 'sortable-ghost',
                    chosenClass: 'sortable-chosen',
                    draggable: '.dynamic-item',
                    group: 'shared',
                    onEnd: function(evt) {
                        updateDynamicPositions();
                    }
                });
            });

            // Remove row
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-row')) {
                    const row = e.target.closest('.dynamics-row');
                    if (confirm(
                            'Are you sure you want to remove this row? Dynamics will be moved to other rows.'
                            )) {
                        row.remove();
                        updateDynamicPositions();
                    }
                }
            });

            // Update positions
            function updateDynamicPositions() {
                const layoutData = [];

                document.querySelectorAll('.dynamics-row').forEach((row, rowIndex) => {
                    const rowNumber = rowIndex + 1;
                    row.dataset.row = rowNumber;
                    row.querySelector('.row-label').textContent = `Row ${rowNumber}`;

                    row.querySelectorAll('.dynamic-item').forEach((item, colIndex) => {
                        const dynamicId = item.dataset.id;
                        const width = item.dataset.width;
                        const column = colIndex + 1;

                        item.dataset.row = rowNumber;
                        item.dataset.column = column;

                        // Update footer info
                        const footer = item.querySelector('.dynamic-card-footer small');
                        if (footer) {
                            const orderMatch = footer.textContent.match(/Order: (\d+)/);
                            const order = orderMatch ? orderMatch[1] : 0;
                            footer.textContent =
                                `Order: ${order} | Row: ${rowNumber} | Col: ${column}`;
                        }

                        layoutData.push({
                            id: dynamicId,
                            layout_row: rowNumber,
                            layout_column: column,
                            layout_width: width
                        });
                    });
                });

                window.dynamicsLayoutData = layoutData;
            }

            // Save layout
            document.getElementById('saveDynamicsLayout')?.addEventListener('click', function() {
                if (!window.dynamicsLayoutData) {
                    updateDynamicPositions();
                }

                const btn = this;
                btn.disabled = true;
                btn.innerHTML =
                    '<i class="ri-loader-4-line spinner-border spinner-border-sm"></i> Saving...';

                fetch('{{ route('programs.update-dynamics-layout') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            layout: window.dynamicsLayoutData
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            showNotify('Layout saved successfully!', 'success');
                        } else {
                            showNotify(data.message || 'Unknown error', 'error');
                        }

                        btn.innerHTML = '<i class="ri-save-line"></i> Save Layout';
                        btn.disabled = false;
                    })
                    .catch(error => {
                        showNotify(error.message, 'error');

                        btn.innerHTML = '<i class="ri-save-line"></i> Save Layout';
                        btn.disabled = false;
                    });


            });
        });

        function showNotify(message, type = 'success') {
            const container = document.getElementById('admin-notify-container');

            const div = document.createElement('div');
            div.className = 'admin-notify ' + type;
            div.innerText = message;

            container.appendChild(div);

            setTimeout(() => {
                div.remove();
            }, 6000);
        }
    </script>

</x-admin.layout>
