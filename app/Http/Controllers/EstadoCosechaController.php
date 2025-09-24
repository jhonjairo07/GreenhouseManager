<?php

namespace App\Http\Controllers;

use App\Models\EstadoCosecha;
use Illuminate\Http\Request;

class EstadoCosechaController extends Controller
{
    /**
     * Listado de estados.
     */
    public function index()
    {
        $estados = EstadoCosecha::all();
        return view('estados.index', compact('estados'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('estados.create');
    }

    /**
     * Guardar un nuevo estado.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        EstadoCosecha::create($request->all());

        return redirect()->route('estados.index')->with('success', 'Estado de cosecha creado correctamente');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(EstadoCosecha $estado)
    {
        return view('estados.edit', compact('estado'));
    }

    /**
     * Actualizar un estado.
     */
    public function update(Request $request, EstadoCosecha $estado)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
        ]);

        $estado->update($request->all());

        return redirect()->route('estados.index')->with('success', 'Estado de cosecha actualizado correctamente');
    }

    /**
     * Eliminar un estado.
     */
    public function destroy(EstadoCosecha $estado)
    {
        $estado->delete();
        return redirect()->route('estados.index')->with('success', 'Estado de cosecha eliminado correctamente');
    }
}