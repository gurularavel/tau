<x-front.layout :title="$metaTitle" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="'mediaGuidePage'" :image="$mediaGuidePage->image">
    <style>
        .logo {
            position: relative;
            display: inline-block;
        }

        .logo img {
            display: block;
        }

        .download-btn {
            position: absolute;
            bottom: 12px;
            left: 50%;
            transform: translate(-50%, 10px);

            padding: 8px 14px;
            font-size: 13px;
            font-weight: 500;

            color: #fff;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(6px);

            border-radius: 8px;
            text-decoration: none;

            display: flex;
            align-items: center;
            gap: 6px;

            opacity: 0;
            transition: all 0.3s ease;
        }

        /* hover effekti */
        .logo:hover .download-btn {
            opacity: 1;
            transform: translate(-50%, 0);
        }
    </style>
    <section class="breadcrumb container-fluid">
        <img src="{{ getImage('mediaGuidePage', $mediaGuidePage->image3) }}" alt="Breadcrumb" />
    </section>

    <section class="logotip container">
        <h2>{{ $mediaGuidePage->title ?? '' }}</h2>
        <p>
            {!! $mediaGuidePage->description ?? '' !!}
        </p>
    </section>

    <section class="media-guide-logo container-fluid">
        <img src="{{ getImage('mediaGuidePage', $mediaGuidePage->image2) }}" alt="Logo" />
    </section>

    <section class="potential-logos container">
        @if ($mediaGuidePage->images->isNotEmpty())
            <h2>{{ __('translate.Available logos') }}</h2>

            <div class="logos">

                @foreach ($mediaGuidePage->images as $image)
                    <div class="logo">
                        <img src="{{ getImage('media_guide_page_images', $image->image) }}" alt="Logo" />

                        <a href="{{ getImage('media_guide_page_images', $image->image) }}" download
                            class="download-btn">
                            {{ __('translate.Download') }}
                        </a>
                    </div>
                @endforeach


            </div>
        @endif


        <div class="upload">

            <a style="text-decoration: none;" href="{{ getImage('mediaGuidePage', $mediaGuidePage->image) }}" download>
                <button class="upload-png">{{ __('translate.Download Logo') }}</button>
            </a>

            <a style="text-decoration: none;" href="{{ getImage('mediaGuidePage', $mediaGuidePage->image2) }}" download>
                <button class="upload-vector">{{ __('translate.Download Vector') }}</button>
            </a>
        </div>
    </section>




</x-front.layout>
