<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'projectPage'" :image="$projectPage->image">

    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('projectPage', $projectPage->image) }}" alt="Breadcrumb" />
    </section>

    {{-- Projects --}}
    <section class="projects-container container">
        <h2>{{ $projectPage->title ?? '' }}</h2>
        <p>{{ $projectPage->description ?? '' }}</p>

        <div class="projects-full-container container">

            {{-- LEFT: PROJECT LIST --}}
            <div class="projects">

                @forelse ($projects as $project)
                    <div class="project">

                        {{-- IMAGE --}}
                        <div class="project-image">
                            <img src="{{ getImage('projects', $project->image) }}" alt="{{ $project->title }}" />
                        </div>

                        <div class="project-details">
                            <div class="main-info">

                                {{-- CATEGORY --}}
                                <div class="project-tag">
                                    {{ $project->category->title ?? '' }}
                                </div>

                                <div class="project-header">
                                    <h3>
                                        <a href="{{ route('front.projects.show', $project->slug) }}">
                                            {{ $project->title }}
                                        </a>
                                    </h3>

                                    <span class="professor-name">
                                        {{ $project->author ?? '' }}
                                    </span>

                                    <p>{{ $project->description }}</p>
                                </div>

                                {{-- SHORT INFOS --}}
                                <div class="short-infos">
                                    <div class="info">
                                        <p>{{ __('translate.Duration') }}</p>
                                        <span>{{ $project->duration ?? '-' }}</span>
                                    </div>

                                    <div class="info">
                                        <p>{{ __('translate.Team') }}</p>
                                        <span>
                                            {{ $project->participant_count ?? '-' }}
                                            {{ __('translate.participant') }}
                                        </span>
                                    </div>

                                    <div class="info">
                                        <p>{{ __('translate.Published') }}</p>
                                        <span>
                                            {{ $project->publisher_count ?? '-' }}
                                            {{ __('translate.article') }}
                                        </span>
                                    </div>
                                </div>

                            </div>

                            {{-- ACHIEVEMENTS --}}
                            @if ($project->Items && $project->Items->count())
                                <div class="achievements">
                                    <h4>{{ __('translate.Achievements') }}</h4>
                                    <ul>
                                        @foreach ($project->Items as $item)
                                            <li>
                                                <img src="{{ asset('assets/front/icons/circle-checkbox.svg') }}" />
                                                {{ $item->title ?? '' }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- PARTNERS --}}
                            @if (!empty($project->partners))
                                <div class="partners-container">
                                    <h4>{{ __('translate.Partners') }}</h4>

                                    <div class="partners">
                                        @foreach (explode(',', $project->partners) as $partner)
                                            <div class="partner">
                                                {{ trim($partner) }}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                @empty
                    <p>{{ __('translate.No projects found!') }}</p>
                @endforelse

            </div>

            {{-- RIGHT: CATEGORIES --}}
            <div class="projects-category">
                <h3>{{ __('translate.Projects') }}</h3>

                <div class="categories">
                    <ul>

                        {{-- ALL --}}
                        <li class="{{ !isset($project_category) ? 'category-active' : '' }}">
                            <a href="{{ route('front.projects.index') }}">
                                {{ __('translate.All') }}
                                <span class="count">{{ $projects->total() }}</span>
                            </a>
                        </li>

                        {{-- CATEGORIES --}}
                        @foreach ($pCategories as $category)
                            <li
                                class="{{ isset($project_category) && $project_category->id == $category->id ? 'category-active' : '' }}">

                                <a href="{{ route('front.project_categories.show', $category->slug) }}">
                                    {{ $category->title }}

                                    <span class="count">
                                        {{ $category->projects->count() ?? '' }}
                                    </span>
                                </a>

                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>

        @if ($projects instanceof \Illuminate\Pagination\LengthAwarePaginator && $projects->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($projects->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $projects->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($projects->getUrlRange(1, $projects->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $projects->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($projects->hasMorePages())
                    <a href="{{ $projects->nextPageUrl() }}" class="btn-next">
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
