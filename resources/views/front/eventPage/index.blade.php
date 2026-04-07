<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'eventPage'" :image="$eventPage->image">

    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('eventPage', $eventPage->image) }}" alt="Breadcrumb" />
    </section>
    <section class="events-container container">
        <h2>{{ $eventPage->title ?? '' }}</h2>
        <p>{{ $eventPage->description ?? '' }}</p>

        <div class="events-full-container container">
            <div class="events">
                @foreach ($events as $event)

                    <div class="event">
                        <div class="event-content">
                            <div class="event-header">
                                <img src="{{ getImage('events', $event->image) }}" alt="Event" />

                                <div class="date">
                                    <div class="date-content">
                                        <h2>{{ $event->created_at->translatedFormat('d') }}</h2>
                                        <p>{{ strtoupper(\Carbon\Carbon::parse($event->created_at)->translatedFormat('M')) }}
                                        </p>
                                    </div>
                                    <div class="save">
                                        <img src="{{ asset('assets/front/icons/save.svg') }}" alt="Save Icon" />
                                    </div>
                                </div>
                            </div>

                            <div class="event-text">
                                <h3>
                                    <a href="{{ route('front.events.show', $event->slug) }}">
                                        {{ $event->title }}
                                    </a>
                                    <p>{!! $event->description !!}</p>

                                </h3>

                            </div>

                            <a href="{{ route('front.events.show', $event->slug) }}"
                                class="learn-more">{{ __('translate.More') }}</a>
                        </div>
                    </div>

                @endforeach

            </div>

            <div class="events-category">
                <h3>{{ __('translate.Events') }}</h3>

                <div class="categories">
                    <ul>

                        {{-- ALL --}}
                        <li class="{{ !isset($event_category) ? 'category-active' : '' }}">
                            <a href="{{ route('front.events.index') }}">
                                {{ __('translate.All') }}
                                <span class="count">{{ $events->total() }}</span>
                            </a>
                        </li>

                        {{-- CATEGORIES --}}
                        @foreach ($pCategories as $category)
                            <li
                                class="{{ isset($event_category) && $event_category->id == $category->id ? 'category-active' : '' }}">

                                <a href="{{ route('front.event_categories.show', $category->slug) }}">
                                    {{ $category->title }}

                                    <span class="count">
                                        {{ $category->events->count() ?? '' }}
                                    </span>
                                </a>

                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        @if ($events instanceof \Illuminate\Pagination\LengthAwarePaginator && $events->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($events->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $events->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($events->getUrlRange(1, $events->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $events->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($events->hasMorePages())
                    <a href="{{ $events->nextPageUrl() }}" class="btn-next">
                        <span>{{ __('translate.next') }}</span>
                        <img src="{{ asset('icons/chevron-right.svg') }}" />
                    </a>
                @else
                    <button class="btn-next" disabled>
                        <span>{{ __('translate.next') }}</span>
                        <img src="{{ asset('icons/chevron-right.svg') }}" />
                    </button>
                @endif

            </div>
        @endif
    </section>

</x-front.layout>
