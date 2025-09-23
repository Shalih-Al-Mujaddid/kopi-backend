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
            <div class="px-4 py-6 sm:px-0">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-brown-700 mb-2">Our Banners</h2>
                    <p class="text-brown-600">Discover our featured content with beautiful brown-themed styling</p>
                </div>

                <!-- Sample Banner with Brown Text -->
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img
                            src="https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=800&h=400&fit=crop"
                            alt="Coffee Banner"
                            class="w-full h-64 md:h-80 object-cover"
                        />
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <div class="text-center p-6" style="color: #8B4513;">
                                <h1 class="text-3xl md:text-5xl font-bold mb-2">
                                    Kopi Hitam
                                </h1>
                                <h2 class="text-xl md:text-3xl font-semibold mb-2 opacity-90">
                                    Nikmati Kopi Terbaik
                                </h2>
                                <p class="text-lg md:text-xl opacity-80">
                                    Rasakan kehangatan dan kekuatan kopi hitam pilihan
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img
                            src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=800&h=400&fit=crop"
                            alt="Coffee Beans"
                            class="w-full h-64 md:h-80 object-cover"
                        />
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <div class="text-center p-6" style="color: #B87333;">
                                <h1 class="text-3xl md:text-5xl font-bold mb-2">
                                    Biji Kopi Premium
                                </h1>
                                <h2 class="text-xl md:text-3xl font-semibold mb-2 opacity-90">
                                    Kualitas Terjamin
                                </h2>
                                <p class="text-lg md:text-xl opacity-80">
                                    Dipilih dari petani terbaik di Indonesia
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="relative overflow-hidden rounded-lg shadow-lg">
                        <img
                            src="https://images.unsplash.com/photo-1501339847302-ac426a4a7cbb?w=800&h=400&fit=crop"
                            alt="Coffee Cup"
                            class="w-full h-64 md:h-80 object-cover"
                        />
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                            <div class="text-center p-6" style="color: #4B230D;">
                                <h1 class="text-3xl md:text-5xl font-bold mb-2">
                                    Espresso Kuat
                                </h1>
                                <h2 class="text-xl md:text-3xl font-semibold mb-2 opacity-90">
                                    Energi Pagi Hari
                                </h2>
                                <p class="text-lg md:text-xl opacity-80">
                                    Bangkitkan semangat dengan espresso terbaik
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Color Palette Demo -->
                <div class="mt-12">
                    <h3 class="text-2xl font-bold text-brown-700 mb-6 text-center">Brown Color Palette</h3>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                        <div class="text-center">
                            <div class="w-full h-16 bg-brown-50 rounded mb-2"></div>
                            <p class="text-sm text-brown-600">Brown 50</p>
                        </div>
                        <div class="text-center">
                            <div class="w-full h-16 bg-brown-200 rounded mb-2"></div>
                            <p class="text-sm text-brown-600">Brown 200</p>
                        </div>
                        <div class="text-center">
                            <div class="w-full h-16 bg-brown-500 rounded mb-2"></div>
                            <p class="text-sm text-brown-600">Brown 500</p>
                        </div>
                        <div class="text-center">
                            <div class="w-full h-16 bg-brown-700 rounded mb-2"></div>
                            <p class="text-sm text-brown-600">Brown 700</p>
                        </div>
                        <div class="text-center">
                            <div class="w-full h-16 bg-brown-900 rounded mb-2"></div>
                            <p class="text-sm text-brown-600">Brown 900</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
