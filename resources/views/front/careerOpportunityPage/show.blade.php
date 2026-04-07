<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'career_opportunities'" :image="$career_opportunity->image">
<style>
    .research-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{getImage('career_opportunities', $career_opportunity->image)}}" alt="{{$career_opportunity->title ?? ''}}" />
    </section>
    <section class="research container">
        <h2>{{$career_opportunity->title ?? ''}}</h2>
        <p>
            {!! $career_opportunity->description ?? '' !!}
        </p>




    </section>
</x-front.layout>
<script>
    const lightbox = GLightbox({
        selector: '.zoom-item'
    });
</script>
