<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords">

    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/media/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="academic-calendar container">
        <h3>{{ __('translate.Academic calendar') }}</h3>

        @if($calendar?->content)
            <div class="academic-calendar-content">
                {!! clean_html($calendar->content) !!}
            </div>
        @else
            <p>{{ __('translate.No information found') }}</p>
        @endif
    </section>

</x-front.layout>
