<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'laboratories'" :image="$laboratory->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="student-club container">
        <h2>{{ $laboratory->title ?? '' }}</h2>
        <p>
            {!! $laboratory->description ?? '' !!}
        </p>

        <div class="club-gallery">
            @foreach ($laboratory->images as $image)
                <img src="{{ getImage('laboratory_images', $image->image) }}" alt="{{ $laboratory->title ?? '' }}" />
            @endforeach

        </div>
    </section>

</x-front.layout>
