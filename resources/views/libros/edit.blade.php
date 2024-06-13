<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('libros.update', $libro->id_libro) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-5">
                                <x-label for="titulo" value="{{ __('Título') }}" />
                                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" value="{{ old('titulo', $libro->titulo) }}" required autofocus />
                            </div>

                            <div class="mb-5">
                                <x-label for="autor" value="{{ __('Autor') }}" />
                                <x-input id="autor" class="block mt-1 w-full" type="text" name="autor" value="{{ old('autor', $libro->autor) }}" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="codigo" value="{{ __('Código Dewey') }}" />
                                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" value="{{ old('codigo', $libro->codigo) }}" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="ejemplares" value="{{ __('Cantidad de Ejemplares') }}" />
                                <x-input id="ejemplares" class="block mt-1 w-full" type="number" name="ejemplares" value="{{ old('ejemplares', $libro->ejemplares) }}" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="tema" value="{{ __('Tema') }}" />
                                <select id="tema" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tema" required>
                                    <option value="">Selecciona un tema</option>
                                    <option value="Filosofía psicología" {{ old('tema', $libro->tema) == 'Filosofía psicología' ? 'selected' : '' }}>Filosofía psicología</option>
                                    <option value="Religión" {{ old('tema', $libro->tema) == 'Religión' ? 'selected' : '' }}>Religión</option>
                                    <option value="Sociología" {{ old('tema', $libro->tema) == 'Sociología' ? 'selected' : '' }}>Sociología</option>
                                    <option value="Política" {{ old('tema', $libro->tema) == 'Política' ? 'selected' : '' }}>Política</option>
                                    <option value="Derecho" {{ old('tema', $libro->tema) == 'Derecho' ? 'selected' : '' }}>Derecho</option>
                                    <option value="Comunicación" {{ old('tema', $libro->tema) == 'Comunicación' ? 'selected' : '' }}>Comunicación</option>
                                    <option value="Pedagogía dinámica y metodología" {{ old('tema', $libro->tema) == 'Pedagogía dinámica y metodología' ? 'selected' : '' }}>Pedagogía dinámica y metodología</option>
                                    <option value="Programas currículo y educación" {{ old('tema', $libro->tema) == 'Programas currículo y educación' ? 'selected' : '' }}>Programas currículo y educación</option>
                                    <option value="Didáctica del lenguaje cc.nn sociales y matemáticas" {{ old('tema', $libro->tema) == 'Didáctica del lenguaje cc.nn sociales y matemáticas' ? 'selected' : '' }}>Didáctica del lenguaje cc.nn sociales y matemáticas</option>
                                    <option value="Juegos infantiles expresión corporal salud y artes" {{ old('tema', $libro->tema) == 'Juegos infantiles expresión corporal salud y artes' ? 'selected' : '' }}>Juegos infantiles expresión corporal salud y artes</option>
                                    <option value="Filosofía psicología de la educación" {{ old('tema', $libro->tema) == 'Filosofía psicología de la educación' ? 'selected' : '' }}>Filosofía psicología de la educación</option>
                                    <option value="Sociología psicología de la educación" {{ old('tema', $libro->tema) == 'Sociología psicología de la educación' ? 'selected' : '' }}>Sociología psicología de la educación</option>
                                    <option value="Historia de la educación y situación actual" {{ old('tema', $libro->tema) == 'Historia de la educación y situación actual' ? 'selected' : '' }}>Historia de la educación y situación actual</option>
                                    <option value="Educación especial inicial secundaria de adultos a distancia" {{ old('tema', $libro->tema) == 'Educación especial inicial secundaria de adultos a distancia' ? 'selected' : '' }}>Educación especial inicial secundaria de adultos a distancia</option>
                                    <option value="Administración gestión e investigación escolar" {{ old('tema', $libro->tema) == 'Administración gestión e investigación escolar' ? 'selected' : '' }}>Administración gestión e investigación escolar</option>
                                    <option value="Educación popular rural e interculturalidad" {{ old('tema', $libro->tema) == 'Educación popular rural e interculturalidad' ? 'selected' : '' }}>Educación popular rural e interculturalidad</option>
                                    <option value="Lingüística y gramática" {{ old('tema', $libro->tema) == 'Lingüística y gramática' ? 'selected' : '' }}>Lingüística y gramática</option>
                                    <option value="Idioma" {{ old('tema', $libro->tema) == 'Idioma' ? 'selected' : '' }}>Idioma</option>
                                    <option value="Ciencias puras matemática" {{ old('tema', $libro->tema) == 'Ciencias puras matemática' ? 'selected' : '' }}>Ciencias puras matemática</option>
                                    <option value="Ciencias naturales" {{ old('tema', $libro->tema) == 'Ciencias naturales' ? 'selected' : '' }}>Ciencias naturales</option>
                                    <option value="Física" {{ old('tema', $libro->tema) == 'Física' ? 'selected' : '' }}>Física</option>
                                    <option value="Química" {{ old('tema', $libro->tema) == 'Química' ? 'selected' : '' }}>Química</option>
                                    <option value="Biología ecología" {{ old('tema', $libro->tema) == 'Biología ecología' ? 'selected' : '' }}>Biología ecología</option>
                                    <option value="Estadística" {{ old('tema', $libro->tema) == 'Estadística' ? 'selected' : '' }}>Estadística</option>
                                    <option value="Informática y civil" {{ old('tema', $libro->tema) == 'Informática y civil' ? 'selected' : '' }}>Informática y civil</option>
                                    <option value="Producción agropecuaria" {{ old('tema', $libro->tema) == 'Producción agropecuaria' ? 'selected' : '' }}>Producción agropecuaria</option>
                                    <option value="Higiene y profilaxis" {{ old('tema', $libro->tema) == 'Higiene y profilaxis' ? 'selected' : '' }}>Higiene y profilaxis</option>
                                    <option value="Arte recreación" {{ old('tema', $libro->tema) == 'Arte recreación' ? 'selected' : '' }}>Arte recreación</option>
                                    <option value="Literatura" {{ old('tema', $libro->tema) == 'Literatura' ? 'selected' : '' }}>Literatura</option>
                                    <option value="Geografía e historia" {{ old('tema', $libro->tema) == 'Geografía e historia' ? 'selected' : '' }}>Geografía e historia</option>
                                </select>
                            </div>

                            <div class="mb-5">
                                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                                <textarea id="descripcion" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="descripcion" required>{{ old('descripcion', $libro->descripcion) }}</textarea>
                            </div>
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <div class="mb-5 w-full">
                                <x-label value="{{ __('Editar Imagen') }}" />
                                <label class="flex flex-col items-center justify-center w-full h-80 border-4 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-bray-800 dark:bg-gray-700 hover:border-gray-500 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center w-full h-full overflow-hidden">
                                        @if($libro->imagen)
                                            <img id="preview-image" src="{{ asset($libro->imagen) }}" alt="Imagen de {{ $libro->titulo }}" class="object-cover w-full h-full">
                                        @else
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.59 5.59L20 12l-8-8-8 8z"></path></svg>
                                        @endif
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir</span> o arrastra y suelta</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 2MB)</p>
                                    </div>
                                    <input id="imagen" type="file" class="hidden" name="imagen" onchange="loadFile(event)">
                                </label>
                            </div>
                            <div class="flex space-x-4">
                                <x-button>
                                    {{ __('Guardar') }}
                                </x-button>
                                <a href="{{ route('libros.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                    {{ __('Cancelar') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    var loadFile = function(event) {
        var image = document.getElementById('preview-image');
        image.src = URL.createObjectURL(event.target.files[0]);
        image.onload = function() {
            URL.revokeObjectURL(image.src)
        }
    };
</script>