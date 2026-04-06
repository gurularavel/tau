<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'studentClubPage'" :image="$studentClubPage->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('studentClubPage', $studentClubPage->image) }}" alt="Breadcrumb" />
    </section>

    <section class="student-clubs container">
        <h2>{{ $studentClubPage->title ?? '' }}</h2>
        <p>{{ $studentClubPage->description ?? '' }}</p>

        <div class="clubs">
            @foreach ($studentClubs as $studentClub)
                <div class="club">
                    <img src="{{ getImage('student_clubs', $studentClub->image) }}" alt="Project" />

                    <div class="club-content">

                        <div class="club-info">
                            <h3><a style="text-decoration: none; color: inherit;" href="{{ route('front.student_clubs.show', $studentClub->slug) }}">
                                    {{ $studentClub->title ?? '' }}
                                </a>
                            </h3>
                            <p>
                                {!! $studentClub->description ?? '' !!}
                            </p>


                        </div>
                        <a href="{{ route('front.student_clubs.show', $studentClub->slug) }}">{{ __('translate.More') }}
                            <img src="{{ asset('assets/front/icons/white-right-arrow.svg') }}"
                                alt="White Right Arrow Icon" /></a>
                    </div>
                </div>
            @endforeach


        </div>
        @if ($studentClubs instanceof \Illuminate\Pagination\LengthAwarePaginator && $studentClubs->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($studentClubs->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $studentClubs->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($studentClubs->getUrlRange(1, $studentClubs->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $studentClubs->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($studentClubs->hasMorePages())
                    <a href="{{ $studentClubs->nextPageUrl() }}" class="btn-next">
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
