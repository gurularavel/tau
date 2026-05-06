<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/media/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="academic-calendar container">
        <h3>{{ __('translate.Academic calendar') }}</h3>

        @forelse($calendars as $item)
            @php $locale = app()->getLocale(); @endphp

            <div class="academic-calendar-item">
                @if($item->translate($locale)?->content)
                    <div class="academic-calendar-content">
                        {!! $item->translate($locale)->content !!}
                    </div>
                @endif
            </div>
        @empty
            <p>{{ __('translate.No information found') }}</p>
        @endforelse
    </section>

</x-front.layout>
