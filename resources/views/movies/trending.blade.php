<x-app-layout>
    <x-slot name="header">
        <div class="flex my-2 justify-space-between" style="justify-content:space-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight my-3">
                {{ __('What is the trend today') }}
            </h2>
            <button type="button" id="resetTests" class="justify-end px-6 text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">Reset tests</button>
        </div>
        <div class="mb-6">
            <input type="text" id="searchMovie" placeholder="Search movies..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
        </div>
        <div id="movieList" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-movies.trending-list :movies="$movies" />
            </div>
        </div>
    </div>
</x-app-layout>
