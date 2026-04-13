@props(['title' => null, 'metaDescription' => null, 'metaKeywords' => null, 'folder' => null, 'image' => null])

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <x-front.meta :title="$title" :metaDescription="$metaDescription" :metaKeywords="$metaKeywords" :folder="$folder" :image="$image" />
    <x-front.favicon />

    <x-front.css-scripts />

</head>
@php
    $menus = App\Models\Menu::with([
        'children' => fn($q) => $q->where('is_active', 1)->orderBy('order'),
        'children.translations',
        'translations',
    ])
        ->whereNull('parent_id')
        ->active()
        ->get();

    $contactPage = cache()->remember('contact_page', 10, function () {
        return App\Models\ContactPage::with('translations')->first();
    });
    $languages = cache()->remember('languages', 10, function () {
        return App\Models\Language::active()->get();
    });


        $footers = cache()->remember('footers', 10, function () {
        return App\Models\Footer::orderBy('order', 'asc')->active()->get();
    });

    $currentLocale = LaravelLocalization::getCurrentLocale();

@endphp

<body class="container-fluid">
    <x-front.header :menus="$menus" :contactPage="$contactPage" :languages="$languages" :currentLocale="$currentLocale" />

    {{ $slot }}

    <x-front.footer :contactPage="$contactPage" :footers="$footers"/>
    <x-front.js-scripts />


</body>

</html>
