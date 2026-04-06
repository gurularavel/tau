<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'events'" :image="$event->image">
<style>
    .research-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{getImage('events', $event->image)}}" alt="{{$event->title ?? ''}}" />
    </section>
    <section class="research container">
        <h2>{{$event->title ?? ''}}</h2>
        <p>
            {!! $event->description ?? '' !!}
        </p>

        <div class="research-gallery">
            @foreach ($event->images as $image)
                <img src="{{getImage('event_images', $image->image)}}" alt="{{ $event->title ?? '' }}"  class="zoom-item"/>
            @endforeach


        </div>


        {{-- <a class="upload" href="#">PDF Yüklə</a> --}}
    </section>
</x-front.layout>
<script>
    const lightbox = GLightbox({
        selector: '.zoom-item'
    });
</script>
