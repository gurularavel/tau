<div class="status-toggle-wrapper" data-id="{{ $model->id }}" style="cursor: pointer;">
    @if ($model->is_active)
        <span class="badge bg-success-subtle text-success text-uppercase status-badge">
            {{ __('translate.active') }}
        </span>
    @else
        <span class="badge bg-danger-subtle text-danger text-uppercase status-badge">
            {{ __('translate.inactive') }}
        </span>
    @endif
</div>
