<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'student_clubs'" :image="$studentClub->image">
  <style>
    .club-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
    <section class="breadcrumb container-fluid">
        <img src="{{getImage('student_clubs',$studentClub->image)}}" alt="Breadcrumb" />
    </section>

    <section class="student-club container">
        <h2>{{ $studentClub->title ?? '' }}</h2>
        <p>
            {!! $studentClub->description ?? '' !!}
        </p>

        <div class="club-gallery">
            @foreach ($studentClub->images as $image)
                <img src="{{ getImage('student_club_images', $image->image) }}" alt="{{ $studentClub->title ?? '' }}" class="zoom-item"/>
            @endforeach

        </div>
    </section>

</x-front.layout>
<script>
    const lightbox = GLightbox({
        selector: '.zoom-item'
    });
</script>
