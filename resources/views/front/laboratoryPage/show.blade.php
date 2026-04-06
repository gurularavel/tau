<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'laboratories'" :image="$laboratory->image">
   <style>
    .club-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('laboratories', $laboratory->image) }}" alt="{{$laboratory->title ?? '' }}" />
    </section>

    <section class="student-club container">
        <h2>{{ $laboratory->title ?? '' }}</h2>
        <p>
            {!! $laboratory->description ?? '' !!}
        </p>

        <div class="club-gallery">
            @foreach ($laboratory->images as $image)
                <img src="{{ getImage('laboratory_images', $image->image) }}" alt="{{ $laboratory->title ?? '' }}" class="zoom-item"/>
            @endforeach

        </div>
    </section>

</x-front.layout>
<script>
    const lightbox = GLightbox({
        selector: '.zoom-item'
    });
</script>
