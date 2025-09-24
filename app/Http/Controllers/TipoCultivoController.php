<?php

namespace App\Http\Controllers;

use App\Models\TipoCultivo;
use Illuminate\Http\Request;

class TipoCultivoController extends Controller
{
    /**
     * Mostrar listado de tipos de cultivo.
     */
    public function index()
    {
        $tiposcultivo = TipoCultivo::all();
        return view('tiposcultivo.index', compact('tiposcultivo'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('tiposcultivo.create');
    }

    /**
     * Guardar un nuevo tipo de cultivo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'ciclo_dias' => 'required|integer|min:1',
        ]);

        TipoCultivo::create($request->all());

        return redirect()->route('tiposcultivo.index')->with('success', 'Tipo de cultivo creado correctamente');
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(TipoCultivo $tiposcultivo)
    {
        return view('tiposcultivo.edit', compact('tiposcultivo'));
    }

    /**
     * Actualizar un tipo de cultivo.
     */
    public function update(Request $request, TipoCultivo $tiposcultivo)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'ciclo_dias' => 'required|integer|min:1',
        ]);

        $tiposcultivo->update($request->all());

        return redirect()->route('tiposcultivo.index')->with('success', 'Tipo de cultivo actualizado correctamente');
    }

    /**
     * Eliminar un tipo de cultivo.
     */
    public function destroy(TipoCultivo $tiposcultivo)
    {
        $tiposcultivo->delete();
        return redirect()->route('tiposcultivo.index')->with('success', 'Tipo de cultivo eliminado correctamente');
    }
}