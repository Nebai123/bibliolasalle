<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Lista de Libros') }}
            </h2>
            <form method="GET" action="{{ route('libros.index') }}" class="flex items-center">
                <input type="text" name="search" placeholder="Buscar..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2" value="{{ request('search') }}">
                <button type="submit" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Buscar</button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    <a href="{{ route('libros.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear</a>
                </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Código</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Título</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Autor</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Ejemplares</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Descripción</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Imagen</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Tema</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($libros as $libro)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->id_libro }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->codigo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->titulo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->autor }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->ejemplares }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->descripcion }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                @if($libro->imagen)
                                <img src="{{ asset($libro->imagen) }}" alt="Imagen de {{ $libro->titulo }}" class="w-16 h-16 object-cover">
                                @else
                                No hay imagen
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $libro->tema }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center">
                                    <a href="{{ route('libros.edit', $libro->id_libro) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                    <a href="{{ route('prestamos.create', ['id_libro' => $libro->id_libro]) }}" class="bg-green-500 dark:bg-green-700 hover:bg-green-600 dark:hover:bg-green-800 text-white font-bold py-2 px-4 rounded mr-2">Préstamo</a>
                                    <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $libro->id_libro }}')">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $libros->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function confirmDelete(id) {
        alertify.confirm("¿Confirmar para eliminar el registro?",
        function(){
            let form = document.createElement('form');
            form.method = 'POST';
            form.action = '/libros/' + id;
            form.innerHTML = '@csrf @method("DELETE")';
            document.body.appendChild(form);
            form.submit();
            alertify.success('Registro eliminado');
        },
        function(){
            alertify.error('Cancelado');
        });
    }
</script>