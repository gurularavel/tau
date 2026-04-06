    @props(['menus', 'contactPage','languages', 'currentLocale'])

    <header class="container-fluid">
        <div class="header-top">
            <div class="container">
                <div class="header-top-left">
                    @php
                        $phone = preg_replace('/\s+/', '', $contactPage->phone);
                    @endphp
                    <p>
                        <img src="{{ asset('assets/front/icons/phone-white.svg') }}" />
                        <a href="tel:{{ $phone }}" style="color: inherit; text-decoration: none;">
                            {{ $contactPage->phone }}
                        </a>
                    </p>

                    <p>
                        <img src="{{ asset('assets/front/icons/email-white.svg') }}" />
                        <a href="mailto:{{ $contactPage->email }}" style="color: inherit; text-decoration: none;">
                            {{ $contactPage->email }}
                        </a>
                    </p>
                </div>

                <div class="header-top-right">
                    <ul>
                        <li>
                            <a target="__blank" href="{{ $contactPage->linkedin ?? '' }}"><img
                                    src="{{ asset('assets/front/icons/linkedin-white.svg') }}" alt="LinkedIn" /></a>
                        </li>
                        <li>
                            <a target="__blank" href="{{ $contactPage->instagram ?? '' }}"><img
                                    src="{{ asset('assets/front/icons/instagram-white.svg') }}" alt="Instagram" /></a>
                        </li>
                        <li>
                            <a target="__blank" href="{{ $contactPage->facebook ?? '' }}"><img
                                    src="{{ asset('assets/front/icons/facebook-white.svg') }}" alt="Facebook" /></a>
                        </li>
                        <li>
                            <a target="__blank" href="{{ $contactPage->youtube ?? '' }}"><img
                                    src="{{ asset('assets/front/icons/youtube-white.svg') }}" alt="YouTube" /></a>
                        </li>
                        <li>
                            <a target="__blank" href="{{ $contactPage->x_social_media ?? '' }}"><img
                                    src="{{ asset('assets/front/icons/x-white.png') }}" alt="YouTube" /></a>
                        </li>
                        <li>
                            <a href="#"><img src="{{ asset('assets/front/icons/person-white.svg') }}"
                                    alt="Profile" /></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="header-bottom">
            <div class="container">
                <div class="logo">
                    <a href="{{ route('front.homePage.index') }}">
                        <img src="{{ getImage('settings', setting('header_logo_path')) }}" alt="Navbar Logo" />
                    </a>
                </div>



                <nav id="mainNav">
                    <ul>
                        @foreach ($menus as $menu)
                            <li class="{{ $menu->children->count() ? 'has-dropdown' : '' }}">

                                {{-- Əgər child varsa → <p>, yoxdursa → <a> --}}
                                @if ($menu->children->count())
                                    <p>{{ $menu->title }}</p>
                                @else
                                    <a href="{{ url($menu->slug) }}">{{ $menu->title }}</a>
                                @endif

                                {{-- Dropdown --}}
                                @if ($menu->children->count())
                                    <div class="nav-element-dropdown">
                                        <ul>
                                            @foreach ($menu->children as $child)
                                                <li>
                                                    <a href="{{ url($child->slug) }}">
                                                        {{ $child->title }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </nav>

                <div class="lang-change">
<a href="#" class="lang-current">
    <span>{{ strtoupper($currentLocale) }}</span>
    <img src="{{ asset('assets/front/icons/globe-white.svg') }}" alt="Globe Icon" />
</a>

    <div class="lang-list">
        @foreach ($languages as $language)
            @if ($language->locale !== $currentLocale)
                <a href="{{ LaravelLocalization::getLocalizedURL($language->locale) }}" class="lang-link">
                    {{ strtoupper($language->locale) }}
                </a>
            @endif
        @endforeach
    </div>
</div>
        <button class="mobile-menu-btn" id="menuToggle">
                    <img src="{{ asset('assets/front/icons/menu.svg') }}" alt="Menu" />
                </button>
            </div>
        </div>
    </header>
