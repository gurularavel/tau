@props(['title', 'routeName', 'iconName', 'items'])

<li class="nav-item">
    <a class="nav-link menu-link {{ menu($routeName) ? 'active' : '' }}" href="#{{ $routeName }}"
        data-bs-toggle="collapse" role="button" aria-expanded="{{ menu($routeName) ? 'true' : 'false' }}"
        aria-controls="{{ $routeName }}">
        <i class="{{ $iconName }}"></i>
        <span data-key="t-apps">{{ __('translate.' . $title) }}</span>
    </a>
    <div class="collapse menu-dropdown {{ menuCollapseOpen($routeName) ? 'show' : '' }}" id="{{ $routeName }}">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="{{ route('admin.' . $routeName . '.create') }}"
                    class="nav-link {{ menu($routeName, 'create') ? 'active' : '' }}" data-key="t-chat">
                    {{ __('translate.' . $title) }} {{ __('translate.add') }}
                </a>
            </li>
            @foreach ($items as $item)
                <li class="nav-item">
                    <a href="{{ route('admin.' . $routeName . '.edit', $item->id) }}"
                        class="nav-link {{ menuItemActive($routeName, 'edit', $item) ? 'active' : '' }}">
                        {{ $item->title ?? '' }}
                    </a>



                </li>
            @endforeach
        </ul>
    </div>

</li>
