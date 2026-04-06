<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'student_clubs'" :image="$studentClub->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="student-club container">
        <h2>{{ $studentClub->title ?? '' }}</h2>
        <p>
            {!! $studentClub->description ?? '' !!}
        </p>

        <div class="club-gallery">
            @foreach ($studentClub->images as $image)
                <img src="{{ getImage('student_club_images', $image->image) }}" alt="{{ $studentClub->title ?? '' }}" />
            @endforeach

        </div>
    </section>

</x-front.layout>
