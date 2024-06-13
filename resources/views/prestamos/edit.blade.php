<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Editar Préstamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                <form method="POST" action="{{ route('prestamos.update', $prestamo->id_prestamo) }}" class="max-w-sm mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="mb-5">
                        <label for="id_estudiante" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Estudiante</label>
                        <input type="text" name="id_estudiante" id="id_estudiante" value="{{ old('id_estudiante', $prestamo->id_estudiante) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-5">
                        <label for="id_libro" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Libro</label>
                        <input type="text" name="id_libro" id="id_libro" value="{{ old('id_libro', $prestamo->id_libro) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="dni" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">DNI</label>
                        <input type="text" name="dni" id="dni" value="{{ old('dni', $prestamo->dni) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="fecha_prestamo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Préstamo</label>
                        <input type="date" name="fecha_prestamo" id="fecha_prestamo" value="{{ old('fecha_prestamo', $prestamo->fecha_prestamo) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="fecha_devolucion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha Devolución</label>
                        <input type="date" name="fecha_devolucion" id="fecha_devolucion" value="{{ old('fecha_devolucion', $prestamo->fecha_devolucion) }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>

                    <div class="mb-5">
                        <label for="observacion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Observación</label>
                        <textarea name="observacion" id="observacion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('observacion', $prestamo->observacion) }}</textarea>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                    <a href="{{ route('prestamos.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
