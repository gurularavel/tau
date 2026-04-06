@props(['model'])

<td class="status">
    <span class="badge bg-warning-subtle text-warning text-uppercase">
        {{ __('translate.' . $model->type?->value) }}
    </span>
</td>
