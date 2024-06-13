<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Biblioteca por Temas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($temas as $tema)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <img src="{{ asset('images/temas/' . Str::slug($tema) . '.jpg') }}" alt="{{ $tema }}" class="w-16 h-16 object-cover mr-4">
                            <div class="text-lg leading-7 font-semibold">{{ $tema }}</div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('libros.por_tema', ['tema' => $tema]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ver Libros
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>

@php
use Illuminate\Support\Str;
@endphp
