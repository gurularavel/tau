
<x-admin.layout>
 <style>
        .draggable-block,
        .draggable-item {
            cursor: move;
        }
    </style>
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

                            <div class="col-lg-12">


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
                                                                        @case('is_active')
                                                                            {!! approveDecline($model->{$attribute}) !!}
                                                                            @break

                                                                            @case('actions')
                                                                                <x-admin.crud.index.actions :model="$model" :routeName="'menus'" :td="false" :view="false" :delete="true"/>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-lg-12">

                                {{-- Header --}}
                                <div class="card-header border-0">
                                    <div class="d-flex align-items-center">
                                        <h5 class="card-title mb-0 flex-grow-1">{{ __('translate.Blocks') }}</h5>
                                        <div class="flex-shrink-0">
                                            <button class="btn btn-danger add-btn"
                                                onclick="window.location.href='{{ route('admin.blocks.create', ['menu_id' => $model->id]) }}'">
                                                <i class="ri-add-line align-bottom me-1"></i>
                                                {{ __('translate.add') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                {{-- CONTENT --}}
                                <div class="product-content mt-3" id="block-list">
                                    @foreach ($model->blocks as $block)
                                        <div class="draggable-block mb-3" data-id="{{ $block->id }}">
                                            {{-- ===================== TYPE 1 ===================== --}}
                                            @if ($block->type == 1)
                                                <div class="p-3 mb-3 border rounded" data-block="{{ $block->id }}">
                                                    <h4 class="mb-2">{{ $block->title }}</h4>
                                                    <p class="mb-0">{!! $block->description !!}</p>
                                                    <a
                                                        style="margin-top:2%; margin-bottom: 2%;" href="{{ route('admin.blocks.edit', $block) }}">{{ __('translate.edit') }}</a>
                                                </div>
                                            @endif

                                            {{-- ===================== TYPE 2 ===================== --}}
                                            @if ($block->type == 2)
                                                <div class="p-3 mb-3 border rounded bg-light" data-block="{{ $block->id }}">
                                                    <p class="mb-0">{!! $block->description !!}</p>
                                                    <a
                                                        style="margin-top:2%; margin-bottom: 2%;" href="{{ route('admin.blocks.edit', $block) }}">{{ __('translate.edit') }}</a>

                                                </div>
                                            @endif

                                            {{-- ===================== TYPE 3 ===================== --}}
                                            @if ($block->type == 3)
                                                <div class="p-3 mb-3 border rounded">
                                                    <div class="row item-list" data-block="{{ $block->id }}">
                                                        <a
                                                            style="margin-top:2%; margin-bottom: 2%;" href="{{ route('admin.blocks.edit', $block) }}">{{ __('translate.edit') }}</a>
                                                        @foreach ($block->blockItems as $item)
                                                            <div class="col-md-4 mb-2 draggable-item"
                                                                data-id="{{ $item->id }}">
                                                                <div class="p-2 border rounded">
                                                                    {{ $item->title }} </br>
                                                                    <a
                                                                        href="{{ route('admin.block_items.edit', $item) }}">{{ __('translate.edit') }}</a>

                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- ===================== TYPE 4 ===================== --}}
                                            @if ($block->type == 4)
                                                <div class="p-3 mb-3 border rounded">
                                                    <h4 class="mb-3">{{ $block->title }}</h4>
                                                    <div class="row item-list" data-block="{{ $block->id }}">
                                                        <a
                                                            style="margin-top:2%; margin-bottom: 2%;" href="{{ route('admin.blocks.edit', $block) }}">{{ __('translate.edit') }}</a>
                                                        @foreach ($block->blockItems as $item)
                                                            <div class="col-md-4 mb-2 draggable-item"
                                                                data-id="{{ $item->id }}">
                                                                <div class="p-2 border rounded">
                                                                    {{ $item->title }}
                                                                    </br>
                                                                    <a
                                                                        href="{{ route('admin.block_items.edit', $item) }}">{{ __('translate.edit') }}</a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                            {{-- ===================== TYPE 5 ===================== --}}
                                            @if ($block->type == 5)
                                                <div class="p-3 mb-3 border rounded bg-light shadow-sm" data-block="{{ $block->id }}">
                                                    <a
                                                        style="margin-top:2%; margin-bottom: 2%;" href="{{ route('admin.blocks.edit', $block) }}">{{ __('translate.edit') }}</a>
                                                    <div class="item-list mt-2">
                                                        @foreach ($block->blockItems as $blockItem)
                                                            <div class="draggable-item p-3 mb-2 border rounded bg-white shadow-sm"
                                                                data-id="{{ $blockItem->id }}"
                                                                style="min-height: 80px;">
                                                                {{ $blockItem->title }}
                                                                <br>
                                                                 <a
                                                                href="{{ route('admin.block_items.edit', $blockItem) }}">{{ __('translate.edit') }}</a>
                                                            </div>

                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
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
<script>
    new Sortable(document.getElementById('block-list'), {
        animation: 150,
        ghostClass: 'bg-light',
        onEnd: function() {

            let order = [];
            document.querySelectorAll('.draggable-block').forEach((el) => {
                order.push(el.getAttribute('data-id'));
            });

            fetch("{{ route('admin.blocks.order') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        order: order
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: '{{ __('translate.Sorting updated!') }}',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });
        }
    });
</script>
<script>
    // === Block Items Drag & Drop ===
    document.querySelectorAll('.item-list').forEach(list => {
        new Sortable(list, {
            animation: 150,
            ghostClass: 'bg-light',
            onEnd: function() {

                let order = [];
                list.querySelectorAll('.draggable-item').forEach(el => {
                    order.push(el.getAttribute('data-id'));
                });

                fetch("{{ route('admin.block-items.order') }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        },
                        body: JSON.stringify({
                            order: order
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'success',
                                title: '{{ __('translate.Sorting updated!') }}',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    });

            }
        });
    });
</script>
