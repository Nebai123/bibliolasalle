<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'apellidos' => 'nullable|string|min:5|max:255',
            'dni' => 'required|string|min:5',
            'celular' => 'nullable|string|min:5|max:20',
            'direccion' => 'nullable|string|min:5|max:255',
            'pe' => 'nullable|string|min:5|max:255',
        ]);
        //echo "antes de guardar: ";
            // Crear un nuevo estudiante usando el método `create` del modelo
        Estudiante::create($request->all());
        //echo "despues de guardar: ";
        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiantes.edit', compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:5|max:255',
            'dni' => 'required|string|min:5',
            'celular' => 'required|string|min:5|max:20',
            'direccion' => 'required|string|min:5|max:255',
            'pe' => 'required|string|min:5|max:255',
        ]);

        // Buscar el estudiante por su ID
        $estudiante = Estudiante::findOrFail($id);

        // Actualizar los datos del estudiante
        $estudiante->update($request->all());

        // Redireccionar a la vista de listado de estudiantes
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $estudiante->delete();

        return redirect()->route('estudiantes.index');
    }
}
