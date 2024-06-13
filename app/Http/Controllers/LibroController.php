<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index(Request $request)
    {
        $query = Libro::query();
    
        if ($request->has('search')) {
            $search = strtolower($request->input('search'));
            $query->whereRaw('LOWER(codigo) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(titulo) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(autor) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(descripcion) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(tema) like ?', ["%$search%"]);
        }
    
        $libros = $query->paginate(10); // Paginación con 10 resultados por página
    
        return view('libros.index', compact('libros'));
    }

    public function home()
    {
        $temas = [
            "Filosofía psicología", "Religión", "Sociología", "Política",
            "Derecho", "Comunicación", "Pedagogía dinámica y metodología",
            "Programas currículo y educación", "Didáctica del lenguaje cc.nn sociales y matemáticas",
            "Juegos infantiles expresión corporal salud y artes", "Filosofía psicología de la educación",
            "Sociología psicología de la educación", "Historia de la educación y situación actual",
            "Educación especial inicial secundaria de adultos a distancia", "Administración gestión e investigación escolar",
            "Educación popular rural e interculturalidad", "Lingüística y gramática", "Idioma",
            "Ciencias puras matemática", "Ciencias naturales", "Física", "Química",
            "Biología ecología", "Estadística", "Informática y civil", "Producción agropecuaria",
            "Higiene y profilaxis", "Arte recreación", "Literatura", "Geografía e historia"
        ];

        return view('home', compact('temas'));
    }

    public function librosPorTema(Request $request, $tema)
    {
        $query = Libro::where('tema', $tema);

        if ($request->has('search')) {
            $search = strtolower($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->whereRaw('LOWER(titulo) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(autor) like ?', ["%$search%"])
                  ->orWhereRaw('LOWER(codigo) like ?', ["%$search%"]);
            });
        }

        $libros = $query->get();

        return view('libros.por_tema', compact('libros', 'tema'));
    }

    public function create()
    {
        return view('libros.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo' => 'required|string|unique:libros,codigo|max:255',
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ejemplares' => 'nullable|integer',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Máximo 10 MB
            'tema' => 'required|string|max:255',
        ]);
    
        $libro = new Libro($request->except('imagen'));
    
        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $libro->imagen = 'images/' . $filename;
        }
    
        $libro->save();
    
        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente');
    }

    public function show(string $id)
    {
        // Implementación para mostrar detalles de un libro si es necesario
    }

    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);
        return view('libros.edit', compact('libro'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo' => 'required|string|max:255|unique:libros,codigo,' . $id . ',id_libro',
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'ejemplares' => 'nullable|integer',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tema' => 'required|string|max:255',
        ]);

        $libro = Libro::findOrFail($id);
        $libro->fill($request->except('imagen'));

        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($libro->imagen && file_exists(public_path($libro->imagen))) {
                unlink(public_path($libro->imagen));
            }

            $file = $request->file('imagen');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $libro->imagen = 'images/' . $filename;
        }

        $libro->save();

        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($libro->imagen && file_exists(public_path($libro->imagen))) {
            unlink(public_path($libro->imagen));
        }

        $libro->delete();

        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente');
    }
}
