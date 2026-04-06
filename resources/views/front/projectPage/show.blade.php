<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'projects'" :image="$project->image">
<style>
    .research-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>
    <section class="research container">
        <h2>{{$project->title ?? ''}}</h2>
        <p>
            {!! $project->description ?? '' !!}
        </p>

        <div class="research-gallery">
            @foreach ($project->images as $image)
                <img src="{{getImage('project_images', $image->image)}}" alt="{{ $project->title ?? '' }}"  class="zoom-item"/>
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
