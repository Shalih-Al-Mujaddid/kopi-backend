<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Banners - {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm border-b">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-brown-700">Kopi Backend</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('welcome') }}" class="text-brown-600 hover:text-brown-800">Home</a>
                        <a href="{{ route('banners') }}" class="text-brown-700 font-semibold">Banners</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
            <div id="banner-list-container" class="px-4 py-6 sm:px-0">
                <!-- BannerList component will be mounted here -->
            </div>
        </main>
    </div>

    <!-- React and BannerList component -->
    <script type="module">
        import React from 'react';
        import { createRoot } from 'react-dom/client';
        import BannerList from '/src/components/BannerList.tsx';

        const container = document.getElementById('banner-list-container');
        const root = createRoot(container);

        root.render(React.createElement(BannerList));
    </script>
</body>
</html>
