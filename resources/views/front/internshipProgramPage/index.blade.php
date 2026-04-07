<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'internshipProgramPage'" :image="$internshipProgramPage->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('internshipProgramPage', $internshipProgramPage->image) }}" alt="Breadcrumb" />
    </section>

    <section class="internships-container container">
        <h2>{{ $internshipProgramPage->title ?? '' }}</h2>
        <p>{{ $internshipProgramPage->description ?? '' }}</p>


        <div class="internships">
            @foreach ($internshipPrograms as $internshipProgram)
                <div class="internship">
                    <div class="internship-header">
                        <img src="{{ getImage('internship_programs', $internshipProgram->image) }}"
                            alt="internship program" />
                        <div class="status">{{ __('translate.Active') }}</div>
                    </div>

                    <div class="internship-details">
                        <div class="internship-content">
                            <h3>  <a style="text-decoration: none; color: black;" href="{{ route('front.internship_programs.show',$internshipProgram->slug  ) }}">{{ $internshipProgram->title ?? '' }}</a></h3>
                            <p>{!! $internshipProgram->description ?? '' !!}</p>
                        </div>


                        @if ($internshipProgram->items->isNotEmpty())
                            <div class="info requirements">
                                <h4>{{ __('translate.Requirements') }}</h4>
                                <ul>
                                    @foreach ($internshipProgram->items as $item)
                                        <li>
                                            <img src="{{ asset('assets/front/icons/circle-checkbox.svg') }}"
                                                alt="Checkbox Icon" />
                                            {{ $item->title ?? '' }}
                                        </li>
                                    @endforeach



                                </ul>
                            </div>
                        @endif

                        <div class="info internship-info">
                            <ul>
                                <li>
                                    <img src="{{ asset('assets/front/icons/calendar-black.svg') }}" alt="Duration" />
                                    {{ $internshipProgram->duration ?? '' }}
                                </li>

                                <li>
                                    <img src="{{ asset('assets/front/icons/people-black.svg') }}" alt="Place count" />
                                    {{ $internshipProgram->place_count ?? '' }} {{ __('translate.space available') }}
                                </li>

                                <li class="deadline">
                                    <img src="{{ asset('assets/front/icons/calendar-red.svg') }}"
                                        alt="Application deadline" />
                                    {{ __('translate.Application deadline') }}:
                                    {{ $internshipProgram->created_at?->format('d.m.Y') }}
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>

        @if ($internshipPrograms instanceof \Illuminate\Pagination\LengthAwarePaginator && $internshipPrograms->hasPages())
            <div class="pagination">

                {{-- PREV --}}
                @if ($internshipPrograms->onFirstPage())
                    <button class="btn-prev" disabled>
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </button>
                @else
                    <a href="{{ $internshipPrograms->previousPageUrl() }}" class="btn-prev">
                        <img src="{{ asset('icons/chevron-left.svg') }}" />
                        <span>{{ __('translate.prev') }}</span>
                    </a>
                @endif

                {{-- PAGE NUMBERS --}}
                <div class="page-numbers">
                    @foreach ($internshipPrograms->getUrlRange(1, $internshipPrograms->lastPage()) as $page => $url)
                        <a href="{{ $url }}"
                            class="page {{ $page == $internshipPrograms->currentPage() ? 'active' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                {{-- NEXT --}}
                @if ($internshipPrograms->hasMorePages())
                    <a href="{{ $internshipPrograms->nextPageUrl() }}" class="btn-next">
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


    <section class="application-process container">
        <h2>{{ __('translate.Application process') }}</h2>

        <div class="processes">
            @foreach ($internshipProgramPage->items as $index => $item)
                <div class="process">
                    <div class="number">{{ $index + 1 }}</div>

                    <h5>{{ $item->title ?? '' }}</h5>
                    <p>{{ $item->description ?? '' }}</p>
                </div>
            @endforeach



        </div>
    </section>

    <section class="partner-companies container-fluid">
        <h2 class="container">{{ __('translate.Partner companies') }}</h2>
        <div class="partners-container container-fluid">
            <div class="partners container">
                @foreach ($partners as $partner)
                    <div class="partner-company">
                        <div class="partner-company-header">
                            <div class="partner-image">
                                <img src="{{ getImage('partners', $partner->image) }}" alt="Company" />
                            </div>
                            <div class="partner-company-content">
                                <h4>{{$partner->title ?? ''}}</h4>
                                <div class="category">{{$partner->title2 ?? ''}}</div>
                            </div>
                        </div>

                        <h5 class="partner-company-field">{{$partner->description ?? ''}}</h5>

                        <div class="partner-company-info">
                            <ul>
                                <li>
                                    <img src="{{ asset('assets/front/icons/location-black.svg') }}" alt="Black Location Icon" />
                                    {{$partner->address ?? ''}}
                                </li>

                                <li>
                                    <img src="{{asset('assets/front/icons/briefcase.svg')}}" alt="Briefcase Icon" />
                                    {{$partner->intership_location ?? ''}}
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>
</x-front.layout>
