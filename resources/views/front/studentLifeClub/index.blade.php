<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'studentLifeClub'" :image="$studentLifeClub->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('studentLifeClub', $studentLifeClub->image) }}" alt="Breadcrumb" />
    </section>

    <section class="student-clubs container">
        <h2>{{ $studentLifeClub->title ?? '' }}</h2>
        <p>{!! $studentLifeClub->description ?? '' !!}</p>
    </section>
</x-front.layout>
