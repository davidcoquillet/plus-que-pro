<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach ($movies as $movie)
        <a href="{{ route('movie', ['movie' => $movie['id']]) }}">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <h2 class="text-2xl font-bold mb-3 text-indigo-600">{{ $movie['original_title'] }}</h2>
                <p class="text-gray-700 mb-2"><span class="font-semibold">Overview:</span> {{ $movie['overview'] }}</p>
                <p class="text-gray-700"><span class="font-semibold">Year:</span> {{ $movie['release_date'] }}</p>
                <p class="text-gray-700"><span class="font-semibold">Popularity:</span> {{ $movie['popularity'] }}</p>
                <p class="text-gray-700"><span class="font-semibold">Note:</span> {{ $movie['vote_average'] }}</p>
                <p class="text-gray-700"><span class="font-semibold">id:</span> {{ $movie['moviedb_id'] }}</p>
                <p class="text-gray-700"><span class="font-semibold">id2:</span> {{ $movie['id'] }}</p>
                <img src="https://image.tmdb.org/t/p/w200/{{ $movie['backdrop_path'] }}"/>
            </div>
        </a>
    @endforeach
</div>