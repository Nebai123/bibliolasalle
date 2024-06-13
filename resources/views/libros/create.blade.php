<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Crear Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
                <form method="POST" action="{{ route('libros.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <div class="mb-5">
                                <x-label for="codigo" value="{{ __('Código') }}" />
                                <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="titulo" value="{{ __('Título') }}" />
                                <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="autor" value="{{ __('Autor') }}" />
                                <x-input id="autor" class="block mt-1 w-full" type="text" name="autor" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="ejemplares" value="{{ __('Ejemplares') }}" />
                                <x-input id="ejemplares" class="block mt-1 w-full" type="number" name="ejemplares" required />
                            </div>

                            <div class="mb-5">
                                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                                <textarea id="descripcion" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="descripcion" required></textarea>
                            </div>

                            <div class="mb-5">
                                <x-label for="tema" value="{{ __('Tema') }}" />
                                <select id="tema" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="tema" required>
                                    <option value="">Selecciona un tema</option>
                                    <option value="Filosofía psicología">Filosofía psicología</option>
                                    <option value="Religión">Religión</option>
                                    <option value="Sociología">Sociología</option>
                                    <option value="Política">Política</option>
                                    <option value="Derecho">Derecho</option>
                                    <option value="Comunicación">Comunicación</option>
                                    <option value="Pedagogía dinámica y metodología">Pedagogía dinámica y metodología</option>
                                    <option value="Programas currículo y educación">Programas currículo y educación</option>
                                    <option value="Didáctica del lenguaje cc.nn sociales y matemáticas">Didáctica del lenguaje cc.nn sociales y matemáticas</option>
                                    <option value="Juegos infantiles expresión corporal salud y artes">Juegos infantiles expresión corporal salud y artes</option>
                                    <option value="Filosofía psicología de la educación">Filosofía psicología de la educación</option>
                                    <option value="Sociología psicología de la educación">Sociología psicología de la educación</option>
                                    <option value="Historia de la educación y situación actual">Historia de la educación y situación actual</option>
                                    <option value="Educación especial inicial secundaria de adultos a distancia">Educación especial inicial secundaria de adultos a distancia</option>
                                    <option value="Administración gestión e investigación escolar">Administración gestión e investigación escolar</option>
                                    <option value="Educación popular rural e interculturalidad">Educación popular rural e interculturalidad</option>
                                    <option value="Lingüística y gramática">Lingüística y gramática</option>
                                    <option value="Idioma">Idioma</option>
                                    <option value="Ciencias puras matemática">Ciencias puras matemática</option>
                                    <option value="Ciencias naturales">Ciencias naturales</option>
                                    <option value="Física">Física</option>
                                    <option value="Química">Química</option>
                                    <option value="Biología ecología">Biología ecología</option>
                                    <option value="Estadística">Estadística</option>
                                    <option value="Informática y civil">Informática y civil</option>
                                    <option value="Producción agropecuaria">Producción agropecuaria</option>
                                    <option value="Higiene y profilaxis">Higiene y profilaxis</option>
                                    <option value="Arte recreación">Arte recreación</option>
                                    <option value="Literatura">Literatura</option>
                                    <option value="Geografía e historia">Geografía e historia</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col items-center justify-center">
                            <div class="mb-5 w-full">
                                <x-label value="{{ __('Agregar Imagen') }}" />
                                <label class="flex flex-col items-center justify-center w-full h-96 border-4 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-bray-800 dark:bg-gray-700 hover:border-gray-500 dark:border-gray-600 dark:hover:border-gray-500 dark:text-gray-400">
                                    <div class="flex flex-col items-center justify-center w-full h-full overflow-hidden">
                                        <img id="preview-image" class="object-cover w-full h-full">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.59 5.59L20 12l-8-8-8 8-8"></path></svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click para subir</span> o arrastra y suelta</p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 10MB)</p>
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
