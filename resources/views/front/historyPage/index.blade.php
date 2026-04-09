<x-front.layout
    :title="$metaTitle"
    :metaDescription="$metaDescription"
    :metaKeywords="$metaKeywords"
    :folder="'history_page'"
    :image="$historyPage?->breadcrumb"
>

    <section class="breadcrumb container-fluid">
        @if ($historyPage?->breadcrumb)
            <img src="{{ asset('uploads/history_page/' . $historyPage->breadcrumb) }}" alt="Breadcrumb" />
        @endif
    </section>

    <section class="about container">

        {{-- About header --}}
        @if ($historyPage?->title || $historyPage?->description)
            <div class="about-header">
                @if ($historyPage->title)
                    <h2>{{ $historyPage->title }}</h2>
                @endif
                @if ($historyPage->description)
                    <p>{{ $historyPage->description }}</p>
                @endif
            </div>
        @endif

        {{-- About container (red box) --}}
        <div class="about-container">
            <div class="about-container-content">
                @if ($historyPage?->subtitle)
                    <h3>{{ $historyPage->subtitle }}</h3>
                @endif
                @if ($historyPage?->content)
                    <p>{{ $historyPage->content }}</p>
                @endif

                @php
                    $stats = [
                        ['value' => $historyPage?->stat1_value, 'label' => $historyPage?->stat1_label],
                        ['value' => $historyPage?->stat2_value, 'label' => $historyPage?->stat2_label],
                        ['value' => $historyPage?->stat3_value, 'label' => $historyPage?->stat3_label],
                        ['value' => $historyPage?->stat4_value, 'label' => $historyPage?->stat4_label],
                    ];
                    $stats = array_filter($stats, fn($s) => $s['value'] || $s['label']);
                @endphp

                @if (!empty($stats))
                    <div class="about-performance">
                        <ul>
                            @foreach ($stats as $stat)
                                <li>
                                    <h4>{{ $stat['value'] }}</h4>
                                    <p>{{ $stat['label'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            @php
                $images = array_filter([
                    $historyPage?->image1,
                    $historyPage?->image2,
                    $historyPage?->image3,
                    $historyPage?->image4,
                ]);
            @endphp

            @if (!empty($images))
                <div class="about-images">
                    @foreach ($images as $img)
                        <img src="{{ asset('uploads/history_page/' . $img) }}" alt="About" />
                    @endforeach
                </div>
            @endif
        </div>

    </section>

    @if ($infos->isNotEmpty())
        <section class="infos container">
            @foreach ($infos as $info)
                <div class="info">
                    @if ($info->icon)
                        <img src="{{ asset('uploads/history_page_infos/' . $info->icon) }}" alt="{{ $info->title }}" />
                    @endif
                    <h3>{{ $info->title }}</h3>
                    <p>{{ $info->description }}</p>
                </div>
            @endforeach
        </section>
    @endif

</x-front.layout>
