@props(['model'])

<a class="dropdown-item d-flex align-items-center gap-2 hover-effect"
   style="cursor: pointer;"
   data-bs-toggle="modal"
   data-bs-target="#deleteModal-{{ $model->id }}"
   data-model-id="{{ $model->id }}"
   data-model-title="{{ $model->title }}">
    <i class="ri-delete-bin-fill icon"></i>
    <span>{{ __("translate.Delete") }}</span>
</a>
