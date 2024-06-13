<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{

    public function index()
    {
        $prestamos = Prestamo::all();
        return view('prestamos.index', compact('prestamos'));
    }

    public function create()
    {
        return view('prestamos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'id_estudiante' => 'nullable|exists:estudiantes,id',
            'id_libro' => 'required|exists:libros,id_libro',
            'dni' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'observacion' => 'nullable|string',
        ]);

        Prestamo::create($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado exitosamente');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        return view('prestamos.edit', compact('prestamo'));
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'id_estudiante' => 'nullable|exists:estudiantes,id',
            'id_libro' => 'required|exists:libros,id_libro',
            'dni' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date',
            'observacion' => 'nullable|string',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente');
    }

    public function destroy(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente');
    }
}
