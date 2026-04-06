@props([
    'model',
    'name',
    'trueName' => null,
    'falseName' => null
])

@php
    $value = (bool) data_get($model, $name);

    $trueLabel = $trueName
        ? __('translate.' . $trueName)
        : __('translate.active');

    $falseLabel = $falseName
        ? __('translate.' . $falseName)
        : __('translate.inactive');
@endphp

<td class="status">
    <span class="badge {{ $value ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} text-uppercase">
        {{ $value ? $trueLabel : $falseLabel }}
    </span>
</td>
