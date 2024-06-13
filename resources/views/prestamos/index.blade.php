<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Lista de Préstamos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <a href="{{ route('prestamos.create') }}" class="bg-cyan-500 dark:bg-cyan-700 hover:bg-cyan-600 dark:hover:bg-cyan-800 text-white font-bold py-2 px-4 rounded">Crear</a>
                </div>

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID Libro</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DNI</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Fecha Préstamo</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Fecha Devolución</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Observación</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prestamos as $prestamo)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->id_prestamo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->id_libro }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->dni }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->fecha_prestamo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->fecha_devolucion }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $prestamo->observacion }}</td>
                            <td class="border px-4 py-2 text-center">
                                <div class="flex justify-center">
                                    <a href="{{ route('prestamos.edit', $prestamo->id_prestamo) }}" class="bg-violet-500 dark:bg-violet-700 hover:bg-violet-600 dark:hover:bg-violet-800 text-white font-bold py-2 px-4 rounded mr-2">Editar</a>
                                    <button type="button" class="bg-pink-400 dark:bg-pink-600 hover:bg-pink-500 dark:hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" onclick="confirmDelete('{{ $prestamo->id_prestamo }}')">Eliminar</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
            form.action = '/prestamos/' + id;
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
