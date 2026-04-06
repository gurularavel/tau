        @props(['title', 'titleShow' => true,  'title2' => null])
        <div class="breadcumb-wrapper " data-bg-src="{{ asset('assets/front/img/bg/breadcrumb-bg.webp') }}"
            data-overlay="smoke" data-opacity="7">
            <div class="container">
                <div class="breadcumb-content">
                    <h1 class="breadcumb-title" data-cue="slideInUp">{{ $title }}</h1>
                    <ul class="breadcumb-menu">
                        <li data-cue="slideInUp" data-delay="100"><a
                                href="{{ route('front.homePage.index') }}">{{ __('translate.Home page') }}</a></li>
                        @if ($titleShow)
                            <li data-cue="slideInUp" data-delay="100">{{ $title }}</li>
                        @endif
                        @if ($title2)
                            <li data-cue="slideInUp" data-delay="100">{{ $title2 }}</li>
                        @endif

                    </ul>
                </div>
            </div>
        </div>
