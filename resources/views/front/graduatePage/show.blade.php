<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'graduates'" :image="$graduate->image">
    <section class="breadcrumb container-fluid">
        <img src="{{ asset('assets/front/images/academic-council/breadcrumb.jpg') }}" alt="Breadcrumb" />
    </section>

    <section class="student container" style="gap:76px;">
      <div class="student-content">
        <h2>{{ $graduate->title ?? '' }}</h2>
        <p>
         {!! $graduate->description ?? '' !!}
        </p>
      </div>

      <div class="student-image">
        <img src="{{ getImage('graduates', $graduate->image) }}" alt="{{$graduate->title ?? ''}}" />
      </div>
    </section>

</x-front.layout>
