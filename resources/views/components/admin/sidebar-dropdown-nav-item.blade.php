@props(['title', 'routeName', 'iconName', 'items', 'uid'])

@php
    $collapseId = $routeName . '-' . $uid;

    // open state
    $isOpen = menu($routeName);
    foreach ($items as $it) {
        if (menu($it['routeName'])) {
            $isOpen = true;
            break;
        }
    }
@endphp

<li class="nav-item">
    <a class="nav-link menu-link {{ $isOpen ? 'active' : '' }}"
       href="#{{ $collapseId }}"
       data-bs-toggle="collapse"
       aria-expanded="{{ $isOpen ? 'true' : 'false' }}"
       aria-controls="{{ $collapseId }}">
        <i class="{{ $iconName }}"></i>
        <span>{{ __('translate.' . $title) }}</span>
    </a>

    <div class="collapse menu-dropdown {{ $isOpen ? 'show' : '' }}"
         id="{{ $collapseId }}">

        <ul class="nav nav-sm flex-column">
            @foreach ($items as $item)

                @php
                    $isActive = menu($item['routeName']);
                @endphp

                <li class="nav-item">
                    <a href="{{ route('admin.' . $item['routeName'] . '.index') }}"
                       class="nav-link {{ $isActive ? 'active' : '' }}">
                        {{ __('translate.' . $item['title']) }}
                    </a>
                </li>

            @endforeach
        </ul>

    </div>
</li>
