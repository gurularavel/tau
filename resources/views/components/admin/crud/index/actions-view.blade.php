@props(['routeName', 'model'])
<a href="{{ route('admin.'.$routeName.'.show', $model) }}" class="dropdown-item d-flex align-items-center gap-2 hover-effect">
    <i class="ri-eye-line icon"></i>
    <span>{{ __("translate.View") }}</span>
</a>
