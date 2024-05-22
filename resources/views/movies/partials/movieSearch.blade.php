@foreach ($movies as $movie)
    <a href="{{ route('movie', ['movie' => $movie['id']]) }}">
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
            <h2 class="text-2xl font-bold mb-3 text-indigo-600">{{ $movie['original_title'] }}</h2>
        </div>
    </a>
@endforeach