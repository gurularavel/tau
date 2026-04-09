<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'homePage'" :image="$homePage->image">




    @if($heroSlides->count() > 0)
    <section class="hero-slider container-fluid p-0">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                @foreach($heroSlides as $slide)
                <div class="swiper-slide hero-slide"
                     style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.65) 100%), url('{{ asset('uploads/hero_slides/'.$slide->image) }}') center/cover no-repeat;">
                    <div class="container hero-slide-content">
                        @if($slide->title)
                            <h1>{{ $slide->title }}</h1>
                        @endif
                        @if($slide->description)
                            <p>{{ $slide->description }}</p>
                        @endif
                        @if($slide->button_text && $slide->button_url)
                            <a href="{{ $slide->button_url }}" class="hero-slide-btn">{{ $slide->button_text }}</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @if($heroSlides->count() > 1)
            <div class="swiper-pagination hero-pagination"></div>
            <div class="swiper-button-prev hero-prev"></div>
            <div class="swiper-button-next hero-next"></div>
            @endif
        </div>
    </section>
    @else
    <section class="hero container-fluid"
        style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, #000000 100%), url('{{ getImage('homePage', $homePage->image) }}') center/cover no-repeat;">
        <div class="container">
            <h1>{{ $homePage->title ?? '' }}</h1>
        </div>
    </section>
    @endif

    <style>
        .hero-slider { position: relative; }
        .hero-swiper { width: 100%; }
        .hero-slide {
            min-height: 600px;
            display: flex;
            align-items: flex-end;
        }
        .hero-slide-content {
            padding-bottom: 80px;
            color: #fff;
        }
        .hero-slide-content h1 { font-size: clamp(1.8rem, 4vw, 3rem); font-weight: 700; margin-bottom: 12px; }
        .hero-slide-content p  { font-size: 1.1rem; margin-bottom: 24px; opacity: .9; max-width: 600px; }
        .hero-slide-btn {
            display: inline-block;
            padding: 12px 32px;
            background: #fff;
            color: #000;
            border-radius: 4px;
            font-weight: 600;
            text-decoration: none;
            transition: background .2s, color .2s;
        }
        .hero-slide-btn:hover { background: #e2e2e2; color: #000; }
        .hero-pagination { bottom: 20px !important; }
        .hero-pagination .swiper-pagination-bullet-active { background: #fff; }
        .hero-prev, .hero-next { color: #fff; }
        .hero-prev::after, .hero-next::after { font-size: 20px; }
        @media(max-width:768px) { .hero-slide { min-height: 350px; } .hero-slide-content { padding-bottom: 50px; } }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper('.hero-swiper', {
                loop: true,
                autoplay: { delay: 5000, disableOnInteraction: false },
                speed: 800,
                pagination: { el: '.hero-pagination', clickable: true },
                navigation: { nextEl: '.hero-next', prevEl: '.hero-prev' },
            });
        });
    </script>

    <section class="media container">
        <div class="media-header">
            <div class="media-header-badge">
                <img src="{{ asset('assets/front/images/homepage/media.svg') }}" alt="Media Badge" />
            </div>

            <div class="media-header-content">
                <h2>{{ $homePage->title2 ?? '' }}</h2>
                <p>
                    {{ $homePage->description ?? '' }}
                </p>
            </div>
        </div>

        <div class="media-datas">
            <div class="media-news">
                <div class="news-list">
                    @foreach ($news as $newsItem)
                        <div class="news">
                            <div class="news-image">
                                <img src="{{ getImage('news', $newsItem->image) }}"
                                    alt="{{ $newsItem->title ?? '' }}" />
                            </div>

                            <div class="news-content">
                                <a
                                    href="{{ route('front.news.show', $newsItem->slug) }}">{{ truncateText($newsItem->title, 50) }}</a>
                                <p>
                                    {{ truncateText($newsItem->description, 100) }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="media-news-controllers">
                    <button>
                        <img src="{{ asset('assets/front/icons/left-arrow.svg') }}" alt="Left Arrow Icon" />
                    </button>

                    <a href="{{ route('front.news.index') }}">{{ __('translate.All news') }}</a>

                    <button>
                        <img src="{{ asset('assets/front/icons/arrow-right.svg') }}" alt="Right Arrow Icon" />
                    </button>
                </div>
            </div>

            <div class="media-announcements">
                <div class="announcement-list">
                    @foreach ($announcements as $announcement)
                        <div class="announcement">
                            <div class="announcement-image">
                                <img src="{{ getImage('announcements', $announcement->image) }}"
                                    alt="{{ $announcement->title ?? '' }}" />
                            </div>

                            <div class="announcement-content">
                                <a
                                    href="{{ route('front.announcements.show', $announcement->slug) }}">{{ truncateText($announcement->title, 50) }}</a>
                                <p>
                                    {{ truncateText($newsItem->description, 100) }}

                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="media-announcements-controllers">
                    <button>
                        <img src="{{ asset('assets/front/icons/left-arrow.svg') }}" alt="Left Arrow Icon" />
                    </button>

                    <a href="{{ route('front.announcements.index') }}">{{ __('translate.All announcements') }}</a>

                    <button>
                        <img src="{{ asset('assets/front/icons/arrow-right.svg') }}" alt="Right Arrow Icon" />
                    </button>
                </div>
            </div>
        </div>
    </section>

    <section class="about container">
        <div class="about-header">
            <div class="about-header-badge">
                <img src="{{ asset('assets/front/images/homepage/about.svg') }}" alt="About" />
            </div>

            <div class="about-header-content">
                <h2>{{ $homePage->title3 ?? '' }}</h2>
                <p>
                    {{ $homePage->description2 ?? '' }}
                </p>
            </div>
        </div>

        <div class="about-content">
            <div class="about-main-image">
                <img src="{{ getImage('homePage', $homePage->image2 ?? '') }}" alt="Main About Image" />
            </div>

            <div class="about-main-content">
                <img src="{{ getImage('homePage', $homePage->image3 ?? '') }}" alt="About Image" />
                <p>
                    {{ $homePage->description3 ?? '' }}
                </p>

                <a href="/pages/tarixce">{{ __('translate.More') }}</a>
            </div>

            <div class="about-performance">
                <ul>
                    <li>
                        <h4>{{ $homePage->course ?? '' }}+</h4>
                        <p>{{ __('translate.Course') }}</p>
                    </li>

                    <li>
                        <h4>{{ $homePage->startup ?? '' }}+</h4>
                        <p>{{ __('translate.Startup') }}</p>
                    </li>

                    <li>
                        <h4>{{ $homePage->language ?? '' }}+</h4>
                        <p>{{ __('translate.Language') }}</p>
                    </li>

                    <li>
                        <h4>{{ $homePage->teacher ?? '' }}+</h4>
                        <p>{{ __('translate.Teacher') }}</p>
                    </li>
                </ul>
            </div>

            <div class="mobile-about-content">
                <p>
                    {{ $homePage->description4 ?? '' }}
                </p>

                <a href="/pages/tarixce">{{ __('translate.More') }}</a>
            </div>

            <div class="about-center-info">
                <h4>{{ $homePage->teacher ?? '' }}+</h4>
                <p>{{ __('translate.Student') }}</p>
                <div class="students">
                    <img src="{{ asset('assets/front/images/homepage/student1.jpg') }}" alt="Student 1" />
                    <img src="{{ asset('assets/front/images/homepage/student2.jpg') }}" alt="Student 2" />
                    <img src="{{ asset('assets/front/images/homepage/student3.jpg') }}" alt="Student 3" />
                </div>
            </div>
        </div>
    </section>

    <section class="programs container">
        <div class="programs-header">
            <div class="programs-header-badge">
                <img src="{{ asset('assets/front/images/homepage/programs.svg') }}" alt="Programs Badge" />
            </div>

            <div class="programs-header-content">
                <h2>{{ $homePage->title4 ?? '' }}</h2>
                <p>
                    {{ $homePage->description4 ?? '' }}
                </p>
            </div>
        </div>

        <div class="programs-list">

            @foreach ($programs as $program )

            <div class="program">
                <div>
                    <a href="{{ route('front.programs.show', $program->slug) }}">
                        <img src="{{ getImage('programs', $program->image) }}" alt="{{$program->title ?? ''}}" />
                        <div class="program-content red">
                            <h3>{{$program->title ?? ''}}</h3>
                            <p>
                                {!! $program->content ?? '' !!}
                            </p>

                            <a class="learn-more" href="{{ route('front.programs.show', $program->slug) }}">{{__('translate.More')}}</a>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </section>

    <section class="academic container">
        <div class="academic-header">
            <div class="academic-header-badge">
                <img src="{{ asset('assets/front/images/homepage/academic-calendar.svg') }}"
                    alt="Academic Calendar Badge" />
            </div>

            <div class="academic-header-content">
                <h2>{{ $homePage->title5 ?? '' }}</h2>
                <p>
                    {{ $homePage->description5 ?? '' }}
                </p>
            </div>
        </div>

        <div class="calendar table-responsive" style="overflow: scroll;">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('translate.Subject') }}</th>
                        <th>{{ __('translate.Academic Year') }}</th>
                        <th>{{ __('translate.Semester') }}</th>
                        <th>{{ __('translate.Education Level') }}</th>
                        <th>{{ __('translate.Faculty') }}</th>
                        <th>{{ __('translate.Education Type') }}</th>
                        <th>{{ __('translate.Event Type') }}</th>
                        <th>{{ __('translate.Event Date') }}</th>
                        <th>{{ __('translate.Remaining days') }}</th>
                    </tr>
                </thead>
                <tbody id="calendar-table-body">
                    @include('front.academicCalendar.partials.table')
                </tbody>
            </table>
        </div>

        <a href="{{ route('front.academic_calendar.index') }}">{{__('translate.More')}}</a>
    </section>



</x-front.layout>
