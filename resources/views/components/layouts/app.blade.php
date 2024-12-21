<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="overflow-x-clip">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="author" content="Ilya Andreev">

    <!-- Description -->
    <meta name="description"
        content="A short description of your Laravel app goes here. Keep it under 160 characters for SEO.">

    <!-- Keywords -->
    <meta name="keywords" content="Laravel, web development, PHP, your-app-keywords">

    <!-- Robots -->
    <meta name="robots" content="index, follow">

    <meta property="og:title" content="Your Laravel App Title">
    <meta property="og:description" content="A short description of your Laravel app goes here.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/social-share-image.jpg') }}">
    <meta property="og:site_name" content="Your Laravel App Name">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Your Laravel App Title">
    <meta name="twitter:description" content="A short description of your Laravel app goes here.">
    <meta name="twitter:image" content="{{ asset('images/social-share-image.jpg') }}">
    <meta name="twitter:site" content="@YourTwitterHandle">
    <meta name="twitter:creator" content="@YourTwitterHandle">

    <!-- Mobile-Specific -->
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Web development Byte Engine">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">

    <!-- Manifest file for Android users -->
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">


    <link rel="canonical" href="{{ url()->current() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-serif antialiased overflow-x-clip">
    <div class="max-w-screen-xl min-h-screen mx-auto">

        @include('partials.header.header')

        <main>
            {{ $slot }}
        </main>

        @include('partials.footer.footer')
    </div>
</body>

</html>
