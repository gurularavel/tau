<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">

<head>

    <title>{{ (isset($title) ? $title : config('app.name', 'Laravel')) . ' | Admin Dashboard' }}</title>
    <x-admin.meta/>
    <x-admin.favicon/>
    <x-admin.css-scripts/>


</head>
<body>

    {{$slot}}

    <x-admin.js-scripts/>
</body>

</html>
