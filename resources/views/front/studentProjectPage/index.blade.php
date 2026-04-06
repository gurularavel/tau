<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'studentProjectPage'" :image="$studentProjectPage->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('studentProjectPage', $studentProjectPage->image) }}" alt="Breadcrumb" />
    </section>

    <section class="student-projects container">
        <h2>{{ $studentProjectPage->title ?? '' }}</h2>
        <p>{{ $studentProjectPage->description ?? '' }}</p>

        <div class="projects">
            @foreach ($studentProjects as $studentProject)
                <div class="project">
                    <div class="project-header">
                        <img src="{{ getImage('student_projects', $studentProject->image) }}" alt="Project" />
                        <div class="status">{{ __('translate.Ongoing') }}</div>
                        <div class="timer">
                            <img src="{{ asset('assets/front/icons/clock.svg') }}" alt="Clock Icon" />
                        </div>
                    </div>

                    <div class="project-content">
                        <a style="text-decoration: none; color: inherit;" href="{{ route('front.student_projects.show', $studentProject->slug) }}">
                            <h3>{{ $studentProject->title ?? '' }}</h3>
                        </a>
                        <p>
                            {!! $studentProject->description ?? '' !!}
                        </p>


                    </div>
                </div>
            @endforeach


        </div>
        @if ($studentProjects instanceof \Illuminate\Pagination\LengthAwarePaginator && $studentProjects->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($studentProjects->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $studentProjects->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($studentProjects->getUrlRange(1, $studentProjects->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $studentProjects->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($studentProjects->hasMorePages())
                    <a href="{{ $studentProjects->nextPageUrl() }}" class="btn-next">
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
