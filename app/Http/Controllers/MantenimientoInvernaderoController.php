<?php

namespace App\Http\Controllers;

use App\Models\MantenimientoInvernadero;
use App\Models\Invernadero;
use Illuminate\Http\Request;

class MantenimientoInvernaderoController extends Controller
{
    public function index()
    {
        $mantenimientos = MantenimientoInvernadero::with('invernadero')
            ->orderBy('fechaMantenimiento', 'desc')
            ->get();

        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        $invernaderos = Invernadero::all();
        return view('mantenimientos.create', compact('invernaderos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'invernadero_id'    => 'required',
            'fechaMantenimiento'=> 'required|date',
            'costoMantenimiento'=> 'required|numeric',
            'descripcion'      => 'nullable|string',
        ]);

        MantenimientoInvernadero::create($validated);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento registrado correctamente.');
    }

    public function show(MantenimientoInvernadero $mantenimiento)
    {
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit(MantenimientoInvernadero $mantenimiento)
    {
        $invernaderos = Invernadero::all();
        return view('mantenimientos.edit', compact('mantenimiento', 'invernaderos'));
    }

    public function update(Request $request, MantenimientoInvernadero $mantenimiento)
    {
        $validated = $request->validate([
            'invernadero_id'    => 'required|exists:invernaderos,id',
            'fechaMantenimiento'=> 'required|date',
            'costoMantenimiento'=> 'required|numeric',
            'descripcion'      => 'nullable|string',
        ]);

        $mantenimiento->update($validated);

        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento actualizado correctamente.');
    }

    public function destroy(MantenimientoInvernadero $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index')->with('success', 'Mantenimiento eliminado correctamente.');
    }
}