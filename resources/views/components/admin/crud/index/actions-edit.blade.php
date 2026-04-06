@props(['routeName', 'model'])

<a href="{{ route('admin.'.$routeName.'.edit', $model) }}"
   class="dropdown-item d-flex align-items-center gap-2 hover-effect">
    <i class="ri-pencil-fill icon"></i>
    <span>{{ __('translate.edit') }}</span>
</a>
