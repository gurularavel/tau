<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'internship_programs'" :image="$internshipProgram->image">


</style>
    {{-- Breadcrumb --}}
    <section class="breadcrumb container-fluid">
        <img src="{{getImage('internship_programs', $internshipProgram->image)}}" alt="{{$internshipProgram->title ?? ''}}" />
    </section>
    <section class="research container">
        <h2>{{$internshipProgram->title ?? ''}}</h2>
        <p>
            {!! $internshipProgram->description ?? '' !!}
        </p>




    </section>
</x-front.layout>
