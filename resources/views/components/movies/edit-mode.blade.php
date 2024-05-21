<div class="container mx-auto p-6">
    <h1 class="font-semibold text-center">{{ $movie['original_title'] }}</h1>
    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl">
        <form action="/movie/edit/{{ $movie['id'] }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="original_title" class="block text-gray-700 font-semibold mb-2">Original Title</label>
                <input type="text" name="original_title" id="original_title" value="{{ $movie['original_title'] }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            </div>
            <div class="mb-4">
                <label for="overview" class="block text-gray-700 font-semibold mb-2">Overview</label>
                <textarea name="overview" id="overview" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ $movie['overview'] }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Poster</label>
                <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}" alt="{{ $movie['original_title'] }}" class="mb-4">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Update Movie</button>
            </div>
        </form>
    </div>
</div>