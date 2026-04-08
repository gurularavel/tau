<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'campusGalleryPage'" :image="$campusGalleryPage->image">
    <style>
        /* Ümumi konteyner üçün */
.video-container {
    width: 100%;
    margin-top: 30px;    /* Desktop üçün yuxarı məsafə */
    margin-bottom: 30px; /* Desktop üçün aşağı məsafə */
    padding: 0 15px;     /* Kənarlardan sıxılmaması üçün */
}

/* Videonun 16:9 nisbətini qorumaq üçün wrapper */
.video-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 nisbəti */
    height: 0;
    overflow: hidden;
    border-radius: 12px;    /* Kənarların yuvarlaq olması */
    box-shadow: 0 4px 15px rgba(0,0,0,0.1); /* Yüngül kölgə */
}

.video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

/* Mobil cihazlar üçün xüsusi tənzimləmə */
@media (max-width: 768px) {
    .video-container {
        margin-top: 50px;    /* Mobildə yuxarıdan daha çox məsafə */
        margin-bottom: 50px; /* Mobildə aşağıdan daha çox məsafə */
        padding: 0 10px;     /* Mobil ekranlarda kənar boşluğu */
    }
}
        </style>
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

<section class="video-container">
        @php
            preg_match('/v=([a-zA-Z0-9_-]+)/', $campusGalleryPage->video_url, $matches);
            $videoId = $matches[1] ?? '';
            $embedUrl = $videoId ? "https://www.youtube.com/embed/$videoId" : '';
        @endphp

        <div class="video-wrapper">
            <iframe src="{{ $embedUrl }}"
                    title="YouTube video player"
                    frameborder="0"
                    allowfullscreen>
            </iframe>
        </div>
    </section>

</x-front.layout>
