@props([
    'model',
    'routeName',
    'edit' => true,
    'view' => true,
    'delete' => false,
    'td' => true,
    'frontRouteName' => null,
    'back' => false,
    'deleteFileName' => null,
    'privacy' => true,
    'delete2' => false,
])
@if ($td)
    <td>
@endif
@if ($view)
    {{-- @can('view', $model) --}}
        <x-admin.crud.index.actions-view :model="$model" :routeName="$routeName" />
    {{-- @endcan --}}
@endif
@if ($edit)
    {{-- @can('update', $model) --}}
        <x-admin.crud.index.actions-edit :model="$model" :routeName="$routeName" />
    {{-- @endcan --}}
@endif

@if ($delete)
    {{-- @can('delete', $model) --}}
        <x-admin.crud.index.actions-delete :model="$model" :routeName="$routeName" />
    {{-- @endcan --}}
    @elseif($delete2)
<button type="button" class="dropdown-item d-flex align-items-center gap-2 hover-effect"
   style="cursor: pointer;"
        onclick="deleteItem(this, '{{ route('admin.'.$routeName.'.destroy', $model) }}')"><i class="ri-delete-bin-fill icon"></i>
    {{ __('translate.Delete') }}
</button>
@endif


@if (!$privacy)
@if ($view)
        <x-admin.crud.index.actions-view :model="$model" :routeName="$routeName" />
@endif
@if ($edit)
        <x-admin.crud.index.actions-edit :model="$model" :routeName="$routeName" />
@endif

@if ($delete)
        <x-admin.crud.index.actions-delete :model="$model" :routeName="$routeName" />
@elseif($delete2)
<button type="button" class="dropdown-item d-flex align-items-center gap-2 hover-effect"
   style="cursor: pointer;"
        onclick="deleteItem(this, '{{ route('admin.'.$routeName.'.destroy', $model) }}')"><i class="ri-delete-bin-fill icon"></i>
    {{ __('translate.Delete') }}
</button>

@endif

@endif

<x-admin.crud.index.delete-modal :model="$model" :routeName="$routeName" :deleteFileName="$deleteFileName"/>
@if ($frontRouteName)
    <x-admin.crud.index.actions-front-view :model="$model" :routeName="$frontRouteName" />
@endif
@if ($back)
    <x-admin.crud.index.actions-back />
@endif



@if ($td)
    </td>
@endif
