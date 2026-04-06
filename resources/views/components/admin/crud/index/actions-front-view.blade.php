@props(['routeName', 'model'])

<a href="{{ route($routeName.'.show', $model) }}"
   target="_blank"
   class="dropdown-item d-flex align-items-center gap-2 hover-effect">
    <i class="ri-external-link-line icon"></i>
    <span>{{ __("translate.Show on site") }}</span>
</a>
