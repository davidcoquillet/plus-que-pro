<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body class="bg-gray-100 text-gray-800">
        <div class="container mx-auto p-6">
            <h1 class="text-5xl font-extrabold text-center mb-10 text-gray-900">Movies List</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach ($movies as $movie)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <h2 class="text-2xl font-bold mb-3 text-indigo-600">{{ $movie['title'] }}</h2>
                        <p class="text-gray-700 mb-2"><span class="font-semibold">Director:</span> {{ $movie['director'] }}</p>
                        <p class="text-gray-700"><span class="font-semibold">Year:</span> {{ $movie['year'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
</html>
