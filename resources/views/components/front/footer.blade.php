    @props(['contactPage', 'footers'])

    <footer class="container-fluid">
        <div class="container">
            <div class="footer-main-contents">
                <div class="footer-main-contents-top">
                    <div class="footer-logo">
                        <a href="{{ route('front.homePage.index') }}">
                            <img src="{{ getImage('settings', setting('header_logo_path')) }}" alt="Footer Logo" />
                        </a>
                    </div>

                    <div class="footer-links">

                        @foreach ($footers as $footer)
                            <div class="footer-link">
                                <h4>{{ $footer->title ?? '' }}</h4>
                                <ul>
                                    @foreach ($footer->items as $item)
                                        <li>
                                            <a href="/{{ $item->slug ?? '#' }}">{{ $item->title ?? '' }}</a>
                                        </li>
                                    @endforeach



                                </ul>
                            </div>
                        @endforeach




                        <div class="footer-link">
                            <h4>{{ __('translate.Contact') }}</h4>
                            <ul>
                                @php
                                    $phone = preg_replace('/\s+/', '', $contactPage->phone);
                                @endphp
                                <li>
                                    <p>
                                        <img src="{{ asset('assets/front/icons/phone-white.svg') }}"
                                            alt="White Phone Icon" />
                                        <a href="tel:{{ $phone }}"
                                            style="color: inherit; text-decoration: none;">
                                            {{ $contactPage->phone }}
                                        </a>
                                    </p>
                                </li>

                                <li>
                                    <p>
                                        <img src="{{ asset('assets/front/icons/email-white.svg') }}"
                                            alt="White Phone Icon" />
                                        <a href="mailto:{{ $contactPage->email }}"
                                            style="color: inherit; text-decoration: none;">
                                            {{ $contactPage->email }}
                                        </a>
                                    </p>
                                </li>

                                <li>
                                    <p>
                                        <img src="{{ asset('assets/front/icons/location-white.svg') }}"
                                            alt="White Phone Icon" />
                                        {{ $contactPage->address ?? '' }}
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <a class="footer-apply" href="{{ route('front.contact.index') }}"> {{ __('translate.Appeal') }} </a>
            </div>
            <div class="footer-copyright">
                <span></span>
                <p>{{ $contactPage->footer ?? '' }}</p>
            </div>
        </div>
    </footer>
