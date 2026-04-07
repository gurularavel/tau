<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'news'" :image="$news->image">
<style>
    .research-gallery .zoom-item {
    cursor: zoom-in;
}

</style>
       <section class="breadcrumb container-fluid">
        <img src="{{getImage('news', $news->image)}}" alt="Breadcrumb" />
    </section>



    <section class="single-media container">
      <h2 class="title">{{$news->title ?? ''}}</h2>

      <div class="content">

        <p>
         {!! $news->content ?? '' !!}
        </p>
      </div>


        <div class="research-gallery">
            @foreach ($news->images as $image)
                <img src="{{getImage('news_images', $image->image)}}" alt="{{ $news->title ?? '' }}"  class="zoom-item"/>
            @endforeach


        </div>

      <div class="single-media-footer">
        <div class="media-counts">
          <div class="view-count">
            <p><span>{{__('translate.View count')}}:</span> {{$news->view_counts ?? 0}}</p>
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
    <a href="https://api.whatsapp.com/send?text={{ urlencode($news->title . ' - ' . url()->current()) }}"
       class="link" target="_blank">
        <img src="{{asset('assets/front/icons/whatsapp.svg')}}" alt="whatsapp Icon" />
    </a>
</div>
      </div>
    </section>

    <section class="other-medias container">
      <div class="other-medias-header">
        <h2>{{__('translate.Other news')}}</h2>

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
        @foreach ($recentNews as $recentNewsItem)

        <div class="media-element">
          <div class="media-image">
            <img src="{{ getImage('news', $recentNewsItem->image) }}" alt="Media 1" />
          </div>
          <div class="media-element-content">
            <h3>
              <a href="{{route('front.news.show', $recentNewsItem->slug)}}"
                >{{$recentNewsItem->title ?? ''}}</a
              >
            </h3>
            <p>
              {!! $recentNewsItem->content ?? '' !!}
            </p>
          </div>
        </div>

        @endforeach

      </div>
    </section>



</x-front.layout>
<script>
    const lightbox = GLightbox({
        selector: '.zoom-item'
    });
</script>
