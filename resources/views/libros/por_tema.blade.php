<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Libros de ') }} {{ $tema }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 lg:p-8">
                <form method="GET" action="{{ route('libros.por_tema', ['tema' => $tema]) }}" class="mb-6">
                    <input type="text" name="search" placeholder="Buscar por título, autor o código" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2" value="{{ request('search') }}">
                    <button type="submit" class="mt-2 bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Buscar</button>
                </form>

                @foreach($libros as $libro)
                    <div class="mb-4">
                        <h3 class="text-xl font-bold">{{ $libro->titulo }}</h3>
                        <p>Autor: {{ $libro->autor }}</p>
                        <p>Código dewey:    {{ $libro->codigo }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
