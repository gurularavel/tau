<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'graduatePage'" :image="$graduatePage->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('graduatePage', $graduatePage->image) }}" alt="Breadcrumb" />
    </section>

    <section class="alumni container">
        <h2>{{ $graduatePage->title ?? '' }}</h2>
        <p>{{ $graduatePage->description ?? '' }}</p>

        <div class="students">

            @foreach ($graduates as $graduate)
                <div class="student">
                    <div class="student-image">
                        <img src="{{ getImage('graduates', $graduate->image) }}" alt="{{ $graduate->title ?? '' }}" />
                    </div>

                    <div class="student-content">
                        <h3>
                            <a
                                href="{{ route('front.graduates.show', $graduate->slug) }}">{{ $graduate->title ?? '' }}</a>
                        </h3>
                        <p>{{ $graduate->profession ?? '' }}</p>
                    </div>
                </div>
            @endforeach




        </div>

        @if ($graduates instanceof \Illuminate\Pagination\LengthAwarePaginator && $graduates->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($graduates->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $graduates->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($graduates->getUrlRange(1, $graduates->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $graduates->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($graduates->hasMorePages())
                    <a href="{{ $graduates->nextPageUrl() }}" class="btn-next">
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
