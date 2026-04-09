@props(['title', 'icon'])
<li class="nav-item menu-section-header">
    <span class="menu-section-text">
        <i class="{{ $icon }}"></i>
        <span>{{ __('translate.' . $title) }}</span>
    </span>
</li>
