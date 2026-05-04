@foreach ($rows as $rowIndex => $dynamicsInRow)
<style>
    /* Mobil üçün düzəlişlər (768px-dən kiçik ekranlar) */
@media (max-width: 768px) {
    /* Sətirlərin flex istiqamətini sütun formasına salırıq */
    .single-program-content div[style*="display: flex"] {
        flex-direction: column !important;
        gap: 15px !important; /* Mobildə daha sıx boşluq */
        margin-bottom: 20px !important;
    }

    /* Bütün blokları tam genişliyə gətiririk */
    .why-this-program {
        flex: 0 0 100% !important;
        width: 100% !important;
        max-width: 100% !important;
    }

    /* Şəkillərin kənara çıxmaması üçün */
    .why-this-program img {
        height: auto;
        border-radius: 8px; /* Vizual olaraq daha qəşəng görünür */
    }

    /* Akademik heyət (müəllimlər) bölməsinin mobildəki görünüşü */
    .teacher {
        flex-direction: column !important;
        text-align: center;
    }

    .teacher-image {
        margin: 0 auto 15px auto;
    }

    .teacher-contact ul {
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Elanlar (Announcements) bölməsi */
    .announcement-header-top {
        flex-direction: column;
        align-items: flex-start !important;
        gap: 10px;
    }

    .announcement-short-info .dates {
        flex-direction: column;
        gap: 5px;
    }
}
</style>
<div class="program-row" style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 40px; width: 100%; box-sizing: border-box;">
            @foreach ($dynamicsInRow as $dynamic)
            @php
                $width = $dynamic->layout_width === 'full' ? '100%' : 'calc(50% - 10px)';
            @endphp

            <div class="why-this-program"
                style="flex: 0 0 {{ $width }}; width: {{ $width }}; max-width: {{ $width }}; box-sizing: border-box; min-width: 0;">

                @if ($dynamic->type == 1)
                    <h2>{{ $dynamic->title ?? '' }}</h2>
                @elseif ($dynamic->type == 2)
                    <p>{!! $dynamic->description ?? '' !!}</p>
                @endif

                @if ($dynamic->image)
                    <img src="{{ getImage('program_dynamics', $dynamic->image) }}" alt="" style="width: 100%;" />
                @endif

                @if ($dynamic->type == \App\Models\ProgramDynamic::TYPE_DYNAMIC_ITEMS && $dynamic->items->isNotEmpty())
                    @php
                        $type1Items = $dynamic->items->where('type', 1);
                        $type2Items = $dynamic->items->where('type', 2);
                        $type6Items = $dynamic->items->where('type', 6);
                        $type5Items = $dynamic->items->where('type', 5);
                        $type9Items = $dynamic->items->where('type', 9);

                    @endphp

                    @if ($type1Items->isNotEmpty())
                        <div class="reasons">
                            @foreach ($type1Items as $item)
                                <div class="reason">
                                    @if ($item->image)
                                        <div class="reason-icon">
                                            <img src="{{ getImage('program_dynamic_items', $item->image) }}"
                                                alt="{{ $item->title ?? '' }}" />
                                        </div>
                                    @endif

                                    <div class="reason-content">
                                        <h3>{{ $item->title ?? '' }}</h3>
                                        <p>{!! $item->description ?? '' !!}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($type2Items->isNotEmpty())
                        <div class="about-program">
                            <div class="future-careers">
                                <div class="careers">
                                    @foreach ($type2Items as $item)
                                        <div class="career">
                                            <p>{!! $item->description ?? '' !!}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($type5Items->isNotEmpty())
                        <div class="labs">
                            @foreach ($type5Items as $item)
                                <div class="lab">
                                    <div class="lab-image">
                                        @if ($item->image)
                                            <a href="/{{ $item->url }}">

                                                <img src="{{ getImage('program_dynamic_items', $item->image) }}"
                                                    alt="{{ $item->title ?? '' }}" />
                                            </a>
                                        @endif
                                    </div>

                                    <div class="lab-content">
                                        <h3>{{ $item->title ?? '' }}</h3>

                                        {!! $item->description !!}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    @if ($type6Items->isNotEmpty())
                        <div class="our-academic">
                            <div class="teachers">
                                @foreach ($type6Items as $item)
                                    <div class="teacher">
                                        <div class="teacher-image">
                                            @if ($item->image)
                                                <img src="{{ getImage('program_dynamic_items', $item->image) }}"
                                                    alt="{{ $item->title ?? '' }}" />
                                            @endif
                                        </div>
                                        <div class="teacher-info">
                                            <div class="teacher-content">
                                                <h4>{{ $item->name ?? '' }}</h4>
                                                <span>{{ $item->profession ?? '' }}</span>
                                                <p>
                                                    {!! $item->description ?? '' !!}
                                                </p>
                                            </div>

                                            <div class="teacher-contact">
                                                <ul>
                                                    <li>
                                                        <img src="{{ asset('assets/front/icons/email-gray.svg') }}"
                                                            alt="Gray Email Icon" />
                                                        {{ $item->email ?? '' }}
                                                    </li>

                                                    <li>
                                                        <img src="{{ asset('assets/front/icons/phone-gray.svg') }}"
                                                            alt="Gray Phone Icon" />
                                                        {{ $item->phone ?? '' }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    @if ($type9Items->isNotEmpty())
                        <div class="announcements">
                            @foreach ($type9Items as $item)
                                <div class="announcement">
                                    <div class="announcement-header">
                                        <div class="announcement-header-top">
                                            <div class="icon">
                                                <img src="{{ asset('assets/front/icons/briefcase-white.svg') }}"
                                                    alt="Briefcase Icon" />
                                            </div>

                                            <div class="header-top-content">
                                                <h2>{{ $item->title ?? '' }}</h2>
                                            </div>
                                        </div>
                                        <div class="announcement-short-info">
                                            <div class="dates">
                                                <div class="created-at">
                                                    <img src="{{ asset('assets/front/icons/calendar-white.svg') }}"
                                                        alt="Calendar Icon" />
                                                    {{__('translate.Announcement date')}}: {{ $item->created_at ?? '' }}
                                                </div>

                                                <div class="deadline">
                                                    <img src="{{ asset('assets/front/icons/calendar-white.svg') }}"
                                                        alt="Calendar Icon" />
                                                    {{__('translate.Application deadline')}}: {{ $item->deadline ?? '' }}
                                                </div>
                                            </div>

                                            <p>
                                                {{ $item->subtitle ?? '' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="announcement-main-content">
                                            {!! $item->description ?? '' !!}


                                        <a class="apply-btn" href="{{ $item->url ?? '' }}">
                                            {{ __('translate.Apply') }} </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                @endif

            </div>
        @endforeach
    </div>
@endforeach
