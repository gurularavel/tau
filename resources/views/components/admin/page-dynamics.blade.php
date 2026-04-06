
@props(['dynamics'])

@if($dynamics && count($dynamics) > 0)
    <div class="page-dynamics-section">
        @php
            // Group by row
            $dynamicsByRow = collect($dynamics)
                ->where('is_active', 1)
                ->sortBy('layout_row')
                ->groupBy('layout_row');
        @endphp

        @foreach($dynamicsByRow as $rowNumber => $rowDynamics)
            <div class="dynamics-row mb-4" data-row="{{ $rowNumber }}">
                <div class="row g-4">
                    @foreach($rowDynamics->sortBy('layout_column') as $dynamic)
                        <div class="col-lg-{{ $dynamic->layout_width === 'half' ? '6' : '12' }}"
                             data-aos="fade-up"
                             data-aos-delay="{{ $loop->index * 100 }}">

                            @switch($dynamic->type)
                                @case(1) {{-- Title --}}
                                    <div class="dynamic-title">
                                        <h2>{{ $dynamic->title }}</h2>
                                    </div>
                                    @break

                                @case(2) {{-- Description --}}
                                    <div class="dynamic-description">
                                        <div class="content">
                                            {!! $dynamic->description !!}
                                        </div>
                                    </div>
                                    @break

                                @case(3) {{-- Single Image --}}
                                    @if($dynamic->image)
                                        <div class="dynamic-image">
                                            <img src="/uploads/dynamics/{{ $dynamic->image }}"
                                                 alt="{{ $dynamic->title ?? 'Dynamic Image' }}"
                                                 class="img-fluid rounded shadow">
                                        </div>
                                    @endif
                                    @break

                                @case(4) {{-- Video --}}
                                    @if($dynamic->video)
                                        <div class="dynamic-video">
                                            <div class="ratio ratio-16x9">
                                                <iframe src="{{ $dynamic->getVideoEmbedUrl() }}"
                                                        allowfullscreen
                                                        class="rounded shadow"></iframe>
                                            </div>
                                        </div>
                                    @endif
                                    @break

                                @case(5) {{-- Multiple Images --}}
                                    @if($dynamic->images && count($dynamic->images) > 0)
                                        <div class="dynamic-images">
                                            <div class="row g-3">
                                                @foreach($dynamic->images->sortBy('order') as $img)
                                                    <div class="col-md-{{ count($dynamic->images) > 2 ? '6' : '12' }}">
                                                        <img src="/uploads/dynamics/{{ $img->image }}"
                                                             alt="Gallery Image {{ $loop->iteration }}"
                                                             class="img-fluid rounded shadow">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @break

                                @case(6) {{-- Dynamic Items --}}
                                    @if($dynamic->items && count($dynamic->items) > 0)
                                        <div class="dynamic-items">
                                            <div class="row g-4">
                                                @foreach($dynamic->items->where('is_active', 1)->sortBy('order') as $item)
                                                    <div class="col-md-{{ count($dynamic->items) > 2 ? '6' : '12' }}">
                                                        <div class="item-card h-100">
                                                            @if($item->image)
                                                                <div class="item-image mb-3">
                                                                    <img src="/uploads/dynamic_items/{{ $item->image }}"
                                                                         alt="{{ $item->title }}"
                                                                         class="img-fluid rounded">
                                                                </div>
                                                            @endif
                                                            <h4 class="item-title">{{ $item->title }}</h4>
                                                            @if($item->description)
                                                                <p class="item-description">{{ $item->description }}</p>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    @break
                            @endswitch

                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <style>
        .page-dynamics-section {
            padding: 60px 0;
        }

        .dynamics-row {
            position: relative;
        }

        .dynamic-title h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .dynamic-description .content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }

        .dynamic-image img,
        .dynamic-images img {
            transition: transform 0.3s ease;
        }

        .dynamic-image img:hover,
        .dynamic-images img:hover {
            transform: scale(1.02);
        }

        .item-card {
            background: #fff;
            border: 1px solid #e9ecef;
            border-radius: 12px;
            padding: 20px;
            transition: all 0.3s ease;
        }

        .item-card:hover {
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            transform: translateY(-5px);
        }

        .item-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .item-description {
            color: #666;
            line-height: 1.6;
        }

        .dynamic-video {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
    </style>
@endif
