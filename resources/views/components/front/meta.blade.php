@props(['title' => null, 'metaDescription' => null, 'metaKeywords' => null, 'folder' => null, 'image' => null])

@php
    $siteName = config('app.name', 'Laravel');
    $displayTitle = $title;

    $defaultDescription = 'Ofis mebeli seçərkən rahatlıq və keyfiyyət önəmlidir. Ofis mebeli tərz və funksionallığı birləşdirməli, ofis masaları isə iş mühitini təşkil etmək üçün uyğun olmalıdır.';
    $defaultKeywords = 'sayt, veb sayt, xidmətlər, məhsullar, ən son yeniliklər';
@endphp

<title>{{ $displayTitle }}</title>
<meta name="title" content="{{ $displayTitle }}">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="{{ $metaDescription ?: $defaultDescription }}">
<meta name="keywords" content="{{ $metaKeywords ?: $defaultKeywords }}">
<meta name="author" content="{{ config('company.name', 'Kvadrat MMC') }}">
<link rel="canonical" href="{{ url()->current() }}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $displayTitle }}" />
<meta property="og:description" content="{{ $metaDescription ?: $defaultDescription}}" />
<meta property="og:image" content="{{ $image ? url(asset(getImage($folder, $image ))) : url(asset('assets/front/icons/x-logo.png'))}}" />
<meta property="og:locale" content="az_AZ" />
<meta property="og:locale:alternate" content="ru_RU" />
<meta property="og:locale:alternate" content="en_GB" />
