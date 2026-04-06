<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'laboratoryPage'" :image="$laboratoryPage->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('laboratoryPage', $laboratoryPage->image) }}" alt="Breadcrumb" />
    </section>

    <section class="laboratory-container container">
        <h2>{{ $laboratoryPage->title ?? '' }}</h2>
        <p>{{ $laboratoryPage->description ?? '' }}</p>

        <div class="labs">
            @foreach ($laboratories as $laboratory)
                <div class="lab">
                    <div class="lab-image">
                        <img src="{{ getImage('laboratories', $laboratory->image) }}" alt="laboratory" />
                    </div>

                    <div class="lab-content">
                        <h3><a href="{{ route('front.laboratories.show', $laboratory->slug) }}" style="text-decoration: none; color: inherit;">
                                {{ $laboratory->title ?? '' }}
                            </a>
                        </h3>
                        <p>
                            {!! $laboratory->description ?? '' !!}

                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($laboratories instanceof \Illuminate\Pagination\LengthAwarePaginator && $laboratories->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($laboratories->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $laboratories->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($laboratories->getUrlRange(1, $laboratories->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $laboratories->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($laboratories->hasMorePages())
                    <a href="{{ $laboratories->nextPageUrl() }}" class="btn-next">
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
