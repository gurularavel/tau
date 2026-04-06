<x-front.layout :title="$page->meta_title" :metaDescription="$page->meta_description" :metaKeywords="$page->meta_keywords" :folder="'pages'" :image="$page->image">

    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('pages', $page->image) }}" alt="Breadcrumb" />
    </section>

    <section class="about container">
        @foreach ($rows as $rowIndex => $dynamicsInRow)
            <div
                style="display: flex; flex-wrap: wrap; gap: 20px; margin-bottom: 40px; width: 100%; box-sizing: border-box;">
                @foreach ($dynamicsInRow as $dynamic)
                    @php
                        $width = $dynamic->layout_width === 'full' ? '100%' : 'calc(50% - 10px)';
                    @endphp

                    <div class="about-header"
                        style="flex: 0 0 {{ $width }}; width: {{ $width }}; max-width: {{ $width }}; box-sizing: border-box; min-width: 0;">

                        @if ($dynamic->type == 1)
                            <h2>{{ $dynamic->title ?? '' }}</h2>
                        @elseif ($dynamic->type == 2)
                            <p>{!! $dynamic->description ?? '' !!}</p>
                        @endif

                        @if ($dynamic->image)
                            <img src="{{ getImage('dynamics', $dynamic->image) }}" style="width: 100%;" />
                        @endif

                        @if ($dynamic->images->isNotEmpty())
                            <section class="student-club container">
                                <div class="club-gallery">
                                    @foreach ($dynamic->images as $image)
                                        <img src="{{ getImage('dynamics', $image->image) }}" style="width: 100%;" />
                                    @endforeach
                                </div>
                            </section>
                        @endif

                        @if ($dynamic->type == \App\Models\Dynamic::TYPE_DYNAMIC_ITEMS && $dynamic->items->isNotEmpty())
                            @php
                                $type1Items = $dynamic->items->where('type', 1);
                                $type2Items = $dynamic->items->where('type', 2);
                                $type3Items = $dynamic->items->where('type', 3);
                                $type4Items = $dynamic->items->where('type', 4);
                                $type5Items = $dynamic->items->where('type', 5);
                                $type6Items = $dynamic->items->where('type', 6);
                                $type7Items = $dynamic->items->where('type', 7);
                                $type8Items = $dynamic->items->where('type', 8);

                            @endphp

                            @if ($type1Items->isNotEmpty())
                                <section class="infos container">
                                    @foreach ($type1Items as $item)
                                        <div class="info">
                                            @if ($item->image)
                                                <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                    alt="{{ $item->title ?? '' }}" />
                                            @endif
                                            <h3>{{ $item->title ?? '' }}</h3>
                                            <p>{!! $item->description ?? '' !!}</p>
                                        </div>
                                    @endforeach
                                </section>
                            @endif

                            @if ($type2Items->isNotEmpty())
                                <section class="our-mission container">
                                    @foreach ($type2Items as $item)
                                        <div class="official-order simple-paragraph">
                                            <h2>
                                                @if ($item->image)
                                                    <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                        alt="{{ $item->title ?? '' }}" />
                                                @endif
                                                {{ $item->title ?? '' }}
                                            </h2>
                                            <p>{!! $item->description ?? '' !!}</p>
                                        </div>
                                    @endforeach
                                </section>
                            @endif
                            @if ($type3Items->isNotEmpty())
                                <section class="our-mission container">
                                    <div class="our-mission-container container">
                                        <div class="our-missions">
                                            @foreach ($type3Items as $item)
                                                <div class="our-mission-element">
                                                    <div class="our-mission-element-contents">
                                                        <div class="left">
                                                            @if ($item->image)
                                                                <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                                    alt="{{ $item->title ?? '' }}" />
                                                            @endif
                                                        </div>

                                                        <div class="right">
                                                            <h3>{{ $item->title ?? '' }}</h3>
                                                            <p>
                                                                {!! $item->description ?? '' !!}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endif
                            @if ($type4Items->isNotEmpty())
                                <section class="sub-unis container">
                                    <div class="sub-unis-content">
                                        <h2>Çətir Universitetlər</h2>
                                        <div class="unis">
                                            @foreach ($type4Items as $item)
                                                <div class="uni">
                                                    <h3>{{ $item->title ?? '' }}</h3>
                                                    <p>
                                                        {!! $item->description ?? '' !!}
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </section>
                            @endif
                            @if ($type5Items->isNotEmpty())
                                <section class="board-of-trustees container">
                                    <div class="trustees">
                                        @foreach ($type5Items as $item)
                                            <div class="trustee">
                                                <div class="trustee-contents">
                                                    <p class="profession">
                                                        {{ $item->profession ?? '' }} </p>

                                                    <div class="info">
                                                        <div class="trustee-image">
                                                            @if ($item->image)
                                                                <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                                    alt="{{ $item->title ?? '' }}" />
                                                            @endif
                                                        </div>

                                                        <div class="professor-info">
                                                            <p>{{ $item->name ?? '' }}</p>
                                                            <p>{{ $item->email ?? '' }}</p>
                                                        </div>
                                                    </div>

                                                    <p class="description">
                                                        {!! $item->description ?? '' !!}
                                                    </p>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </section>
                            @endif
                            @if ($type6Items->isNotEmpty())
                                <section class="directory container">
                                    <div class="directors">
                                        @foreach ($type6Items as $item)
                                            <div class="director">
                                                <div class="director-card">
                                                    <div class="director-card-content">
                                                        <div class="director-card-header">
                                                            @if ($item->image)
                                                                <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                                    alt="{{ $item->name ?? '' }}" />
                                                            @endif
                                                            <div class="director-info">
                                                                <h4 class="director-name">{{ $item->name ?? '' }}</h4>
                                                                <p>{{ $item->profession ?? '' }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="director-card-contact">
                                                            <div class="director-email">
                                                                <img src="{{ asset('assets/front/icons/email-white.svg') }}"
                                                                    alt="White Email Icon" />
                                                                <p>{{ $item->email ?? '' }}</p>
                                                            </div>

                                                            <div class="director-phone">
                                                                <img src="{{ asset('assets/front/icons/phone-white.svg') }}"
                                                                    alt="White Phone Icon" />
                                                                <p>{{ $item->phone ?? '' }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="why-tau">
                                                    <h3>{{ $item->title ?? '' }}</h3>
                                                    <p>{!! $item->description ?? '' !!}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </section>
                            @endif
                            @if ($type7Items->isNotEmpty())
                                <section class="teachers-container container-fluid">
                                    <div class="teachers-inner container">
                                        <div class="teachers">
                                            @foreach ($type7Items as $item)
                                                <div class="teacher">
                                                    @if ($item->image)
                                                        <div class="teacher-image">
                                                            <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                                alt="{{ $item->name ?? '' }}" />
                                                        </div>
                                                    @endif

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
                                </section>
                            @endif

                            @if ($type8Items->isNotEmpty())
                                <section class="managers-container container">
                                    <div class="managers">
                                        @foreach ($type8Items as $item)
                                            <div class="manager">
                                                <div class="manager-card-content">
                                                    <div class="manager-header">
                                                        <img src="{{ getImage('dynamic_items', $item->image) }}"
                                                            alt="{{ $item->name ?? '' }}" />
                                                        <div class="manager-info">
                                                            <h4>{{ $item->name ?? '' }}</h4>

                                                            <p>{{ $item->profession ?? '' }}</p>
                                                        </div>
                                                    </div>

                                                    <div class="manager-card-contact">
                                                        <div class="manager-email">
                                                            <img src="{{ asset('assets/front/icons/email-white.svg') }}" alt="White Email Icon" />
                                                            <p>{{ $item->email ?? '' }}</p>
                                                        </div>

                                                        <div class="manager-phone">
                                                            <img src="{{ asset('assets/front/icons/phone-white.svg') }}" alt="White Phone Icon" />
                                                            <p>{{ $item->phone ?? '' }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </section>
                            @endif
                        @endif

                    </div>
                @endforeach
            </div>
        @endforeach
    </section>

</x-front.layout>
