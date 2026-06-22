<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <section class="map container-fluid">

        @php
            $mapUrl = $contactPage->location_url;
            $safeMapUrl = ($mapUrl && preg_match('#^https://((www\.)?google\.com/maps|maps\.google\.com)#i', $mapUrl)) ? $mapUrl : null;
        @endphp
        @if($safeMapUrl)
        <iframe src="{{ $safeMapUrl }}" width="100%" height="800" style="border:0;" allowfullscreen
            loading="lazy">
        </iframe>
        @endif
        <div class="container">
            <div class="pin-container">
                <div class="layer-3">
                    <div class="layer-2">
                        <div class="pin"></div>
                    </div>
                </div>
            </div>

            <div class="contact-info">
                <h3>{{ __('translate.Contact info') }}</h3>
                <ul>
                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/front/icons/location-white.svg') }}" alt="White Location Icon" />
                        </div>
                        {{ $contactPage->address ?? '' }}
                    </li>
                       @php
                                    $phone = preg_replace('/\s+/', '', $contactPage->phone);
                                @endphp

                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/front/icons/phone-white.svg') }}" alt="White Phone Icon" />
                        </div>
                        <a href="tel:{{ $phone }}" style="color: inherit; text-decoration: none;">
                            {{ $contactPage->phone }}
                        </a>
                    </li>

                    <li>
                        <div class="icon">
                            <img src="{{ asset('assets/front/icons/email-white.svg') }}" alt="White Email Icon" />
                        </div>
                        <a href="mailto:{{ $contactPage->email }}" style="color: inherit; text-decoration: none;">
                            {{ $contactPage->email }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact container-fluid">
        <div class="contact-breadcrumb">
            <img class="wave1" src="{{ asset('assets/front/images/contact/wave1.svg') }}" alt="Wave 1" />
            <h1>{{ $contactPage->title ?? '' }}</h1>
            <p>
                {{ $contactPage->description ?? '' }}

            </p>
            <img class="wave2" src="{{ asset('assets/front/images/contact/wave2.svg') }}" alt="Wave 2" />
        </div>

        <div class="contact-form container">
            @if (session('message'))
                <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px;">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 15px;">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('front.messages.send') }}" method="POST">
                @csrf
                {{-- Anti-bot honeypot: gizli saxlanılır, real istifadəçilər doldurmur --}}
                <div style="position:absolute;left:-9999px;top:-9999px;" aria-hidden="true">
                    <label for="website">Website</label>
                    <input type="text" name="website" id="website" tabindex="-1" autocomplete="off" />
                </div>
                <div class="form-header">
                    <div class="form-item">
                        <label for="name">{{ __('translate.Fullname') }}</label>
                        <input type="text" name="name" />
                    </div>

                    <div class="form-item">
                        <label for="email">{{ __('translate.Email Address') }}</label>
                        <input type="email" name="email" />
                    </div>

                    <div class="form-item">
                        <label for="phone-number">{{ __('translate.Phone') }}</label>
                        <input type="text" name="phone" />
                    </div>

                    {{-- <div class="form-item">
                        <label for="company-name">Company Name</label>
                        <input type="text" name="company-name" />
                    </div> --}}
                </div>

                <div class="form-item">
                    <label for="message">{{ __('translate.Message') }}</label>
                    <textarea name="text"></textarea>
                </div>

                <div class="submit-form">
                    {{-- <div class="terms">
                        <input type="checkbox" name="terms" />
                        <p>Accept <a href="#">terms & conditions</a></p>
                    </div> --}}

                    <button type="submit">{{ __('translate.Send') }}</button>
                </div>
            </form>
        </div>
    </section>

</x-front.layout>
