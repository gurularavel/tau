<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'student_projects'" :image="$studentProject->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="student-club container">
        <h2>{{ $studentProject->title ?? '' }}</h2>
        <p>
            {!! $studentProject->description  ?? '' !!}
        </p>

        <div class="club-gallery">
            @foreach ($studentProject->images as $image)
                            <img src="{{getImage('student_project_images', $image->image)}}" alt="{{ $studentProject->title ?? '' }}" />

            @endforeach

        </div>
    </section>

</x-front.layout>
