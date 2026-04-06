<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'campusGalleryPage'" :image="$campusGalleryPage->image">
        <section class="breadcrumb container-fluid">
      <img src="{{getImage('campusGalleryPage', $campusGalleryPage->image)}}" alt="Breadcrumb" />
    </section>

    <section class="campus-gallery container-fluid">
      <h2 class="container">{{ $campusGalleryPage->title ?? '' }}</h2>

      <div class="gallery container-fluid">
        <div class="container">
          <h1>{{ $campusGalleryPage->title2 ?? '' }}</h1>

          <div class="gallery-grid container">
            <div class="grid two-columns-one-row">
              <img src="{{getImage('campusGalleryPage', $campusGalleryPage->image2)}}" alt="Grid 1" />
            </div>

            <div class="grid grid-content one-column-one-row">
             <p>
              {!! $campusGalleryPage->description ?? '' !!}  </p>
            </div>

            <div class="grid grid-content one-column-one-row">
              {!! $campusGalleryPage->description2 ?? '' !!}  </p>
            </div>
            <div class="grid two-rows-one-column">
              <img src="{{getImage('campusGalleryPage', $campusGalleryPage->image4)}}" alt="Grid 1" />
            </div>

            <div class="grid one-row-one-column">
              <img src="{{getImage('campusGalleryPage', $campusGalleryPage->image5)}}" alt="Grid 1" />
            </div>

            <div class="grid one-row-one-column">
              <img src="{{getImage('campusGalleryPage', $campusGalleryPage->image3)}}" alt="Grid 1" />
            </div>

            <div class="grid grid-content one-column-one-row">
              {!! $campusGalleryPage->description3 ?? '' !!}  </p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="image container">
      @php
    // əgər sadəcə standart YouTube link varsa
    preg_match("/v=([a-zA-Z0-9_-]+)/", $campusGalleryPage->video_url, $matches);
    $videoId = $matches[1] ?? '';
    $embedUrl = $videoId ? "https://www.youtube.com/embed/$videoId" : '';
@endphp

<iframe
    width="100%"
    height="500"
    src="{{ $embedUrl }}"
    title="YouTube video player"
    frameborder="0"
    allowfullscreen>
</iframe>
    </section>

</x-front.layout>
