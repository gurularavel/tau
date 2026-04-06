<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'announcement'" :image="$announcement->image">

       <section class="breadcrumb container-fluid">
        <img src="{{getImage('announcements', $announcement->image)}}" alt="Breadcrumb" />
    </section>



    <section class="single-media container">
      <h2 class="title">{{$announcement->title ?? ''}}</h2>

      <div class="content">

        <p>
         {!! $announcement->content ?? '' !!}
        </p>
      </div>




      <div class="single-media-footer">
        <div class="media-counts">
          <div class="view-count">
            <p><span>{{__('translate.View count')}}:</span> {{$announcement->view_counts ?? 0}}</p>
          </div>


        </div>
<div class="media-social-links">
    {{-- Facebook Paylaş --}}
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
       class="link" target="_blank">
        <img src="{{asset('assets/front/icons/facebook.svg')}}" alt="Facebook Icon" />
    </a>

    {{-- Linkedin Paylaş --}}
    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}"
       class="link" target="_blank">
        <img src="{{asset('assets/front/icons/linkedin.svg')}}" alt="Linkedin Icon" />
    </a>

    {{-- Whatsapp Paylaş --}}
    <a href="https://api.whatsapp.com/send?text={{ urlencode($announcement->title . ' - ' . url()->current()) }}"
       class="link" target="_blank">
        <img src="{{asset('assets/front/icons/Whatsapp.svg')}}" alt="whatsapp Icon" />
    </a>
</div>
      </div>
    </section>

    <section class="other-medias container">
      <div class="other-medias-header">
        <h2>{{__('translate.Other announcements')}}</h2>

        <div class="carousel-arrows">
          <button>
            <img src="{{ asset('assets/front/icons/arrow-left.svg') }}" alt="Left Arrow Icon" />
          </button>

          <button>
            <img src="{{ asset('assets/front/icons/arrow-right.svg') }}" alt="Right Arrow Icon" />
          </button>
        </div>
      </div>

      <div class="medias">
        @foreach ($recentAnnouncement as $recentAnnouncementItem)

        <div class="media-element">
          <div class="media-image">
            <img src="{{ getImage('announcements', $recentAnnouncementItem->image) }}" alt="Media 1" />
          </div>
          <div class="media-element-content">
            <h3>
              <a href="{{route('front.announcements.show', $recentAnnouncementItem->slug)}}"
                >{{$recentAnnouncementItem->title ?? ''}}</a
              >
            </h3>
            <p>
              {!! $recentAnnouncementItem->content ?? '' !!}
            </p>
          </div>
        </div>

        @endforeach

      </div>
    </section>



</x-front.layout>
