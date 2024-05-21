<div class="container mx-auto p-6">
    <h1 class="font-semibold text-center">{{ $movie['original_title'] }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl">
            <p class="text-gray-700 mb-2"><span class="font-semibold">Overview:</span> {{ $movie['overview'] }}</p>
            <p class="text-gray-700"><span class="font-semibold">Year:</span> {{ $movie['release_date'] }}</p>
            <p class="text-gray-700"><span class="font-semibold">Popularity:</span> {{ $movie['popularity'] }}</p>
            <p class="text-gray-700"><span class="font-semibold">Note:</span> {{ $movie['vote_average'] }}</p>
            <p class="text-gray-700"><span class="font-semibold">id:</span> {{ $movie['moviedb_id'] }}</p>
            <p class="text-gray-700"><span class="font-semibold">id2:</span> {{ $movie['id'] }}</p>
            <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}"/>
            <div class="flex justify-end">
                <button type="button" id="editMovie" data-movie-id="{{ $movie['id'] }}" class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Edit</button>
            </div>
            <div class="flex justify-end">
                <button type="button" id="deleteMovie" data-movie-id="{{ $movie['id'] }}" class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Delete</button>
            </div>
    </div>
</div>