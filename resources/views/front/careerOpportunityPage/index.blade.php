<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'careerOpportunityPage'" :image="$careerOpportunityPage->image">

    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('careerOpportunityPage', $careerOpportunityPage->image) }}" alt="Breadcrumb" />
    </section>
    <section class="exchanges-container container">
        <h2>{{ $careerOpportunityPage->title ?? '' }}</h2>
        <p>{{ $careerOpportunityPage->description ?? '' }}</p>

        <div class="exchanges-full-container container">
            <div class="exchanges">
                @foreach ($career_opportunities as $career_opportunity)
                    <div class="exchange">
                        <div class="exchange-image">
                            <img src="{{ getImage('career_opportunities', $career_opportunity->image) }}"
                                alt="{{ $career_opportunity->title ?? '' }}" />
                        </div>

                        <div class="exchange-details">
                            <div class="exchange-info">
                                <ul>
                                    <li>
                                        <img src="{{ asset('assets/front/icons/person-orange.svg') }}"
                                            alt="Orange Person Icon" />
                                        <p>By Admin</p>
                                    </li>

                                    <li>
                                        <img src="{{ asset('assets/front/icons/calendar-orange.svg') }}"
                                            alt="Orange Calendar Icon" />
                                        <p>
                                            {{ \Carbon\Carbon::parse($career_opportunity->created_at)->translatedFormat('d, F Y') }}
                                        </p>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="{{ route('front.career_opportunities.show', $career_opportunity->slug) }}">
                                        {{ $career_opportunity->title }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="exchanges-category">
                <h3>{{ __('translate.Partner countries') }}</h3>

                <div class="categories">
                    <ul>

                        {{-- ALL --}}
                        <li class="{{ !isset($career_opportunity_category) ? 'category-active' : '' }}">
                            <a href="{{ route('front.career_opportunities.index') }}">
                                {{ __('translate.All') }}
                                <span class="count">{{ $career_opportunities->total() }}</span>
                            </a>
                        </li>

                        {{-- CATEGORIES --}}
                        @foreach ($pCategories as $category)
                            <li
                                class="{{ isset($career_opportunity_category) && $career_opportunity_category->id == $category->id ? 'category-active' : '' }}">

                                <a href="{{ route('front.career_opportunity_categories.show', $category->slug) }}">
                                    {{ $category->title }}

                                    <span class="count">
                                        {{ $category->careerOpportunities->count() ?? '' }}
                                    </span>
                                </a>

                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>
        </div>

        @if ($career_opportunities instanceof \Illuminate\Pagination\LengthAwarePaginator && $career_opportunities->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($career_opportunities->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $career_opportunities->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($career_opportunities->getUrlRange(1, $career_opportunities->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $career_opportunities->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($career_opportunities->hasMorePages())
                    <a href="{{ $career_opportunities->nextPageUrl() }}" class="btn-next">
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
