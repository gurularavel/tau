@php
   $locales = getLocales();
@endphp
<header id="page-topbar">
    <div class="layout-width">
        <div class="navbar-header">
            <div class="d-flex">
                <!-- LOGO -->
                <div class="navbar-brand-box horizontal-logo">
                    <a href="{{route('admin.index')}}" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="{{asset("/assets/admin/images/kvadrat-logo-sm.png")}}" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset("/assets/admin/images/kvadrat-logo.png")}}" alt="" height="50">
                        </span>
                    </a>

                    <a href="{{route('admin.index')}}" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="{{asset("/assets/admin/images/kvadrat-logo-sm.png")}}" alt="" height="50">
                        </span>
                        <span class="logo-lg">
                            <img src="{{asset("/assets/admin/images/kvadrat-logo.png")}}" alt="" height="50">
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger material-shadow-none" id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </button>
  <a target="__blank"
   href="{{ route('front.homePage.index') }}"
   style="margin-top:20%; display:inline-block; color:#2563eb;"
   onmouseover="this.style.color='#2563eb'; this.querySelector('svg').style.transform='scale(1.15)'"
   onmouseout="this.style.color='#2563eb'; this.querySelector('svg').style.transform='scale(1)'">

    <svg xmlns="http://www.w3.org/2000/svg"
         width="24" height="24"
         viewBox="0 0 24 24"
         fill="none" stroke="currentColor"
         stroke-width="2"
         stroke-linecap="round"
         stroke-linejoin="round"
         style="transition: all .2s ease;">
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8S1 12 1 12z"/>
        <circle cx="12" cy="12" r="3"/>
    </svg>

</a>


            </div>

            <div class="d-flex align-items-center">

                <div class="dropdown d-md-none topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-search fs-22"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                        <form class="p-3">
                            <div class="form-group m-0">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                    <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="dropdown ms-1 topbar-head-dropdown header-item">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img id="header-lang-img" src="{{ asset('/assets/admin/images/flags/' . LaravelLocalization::getCurrentLocale() . '.png') }}" alt="Header Language" height="20" class="rounded">
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @foreach (LaravelLocalization::getSupportedLocales() as $locale => $details)

                            @if ($locale !== LaravelLocalization::getCurrentLocale() && in_array($locale, $locales))
                                <a class="dropdown-item notify-item language py-2" href="{{ LaravelLocalization::getLocalizedURL($locale) }}" title="{{ $details['native'] }}">
                                    <img src="{{ asset('/assets/admin/images/flags/' . $locale . '.png') }}" alt="user-image" class="me-2 rounded" height="18">
                                    <span class="align-middle">{{ $details['native'] }}</span>
                                </a>
                            @endif
                        @endforeach
                    </div>
                </div>


                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                        <i class='bx bx-fullscreen fs-22'></i>
                    </button>
                </div>

                <div class="ms-1 header-item d-none d-sm-flex">
                    <button type="button" class="btn btn-icon btn-topbar material-shadow-none btn-ghost-secondary rounded-circle light-dark-mode">
                        <i class='bx bx-moon fs-22'></i>
                    </button>
                </div>
                <div class="dropdown ms-sm-3 header-item topbar-user">
                    <button type="button" class="btn material-shadow-none" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="d-flex align-items-center">
                            <img class="rounded-circle header-profile-user" src="{{asset(profileImage('users', auth()->user()->image))}}" alt="Header Avatar">
                            <span class="text-start ms-xl-2">
                                <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{auth()->user()->name ?? ''}}</span>
                                {{-- <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ auth()->user()->rolesLabel }}</span> --}}
                            </span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <h6 class="dropdown-header">{{__("translate.Welcome")}} {{auth()->user()->name}}</h6>
                        <a class="dropdown-item" href="{{route('admin.profile.show')}}"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">{{__("translate.Profile")}}</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:"  onclick="event.preventDefault(); document.getElementById('logout').submit();"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">{{__('translate.Log Out')}}</span></a>
                        <form action="{{ route('admin.logout') }}" method="POST" id="logout">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
