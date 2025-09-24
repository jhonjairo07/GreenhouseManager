<?php

namespace App\Http\Controllers;

use App\Models\Invernadero;
use App\Models\Finca;
use Illuminate\Http\Request;

class InvernaderoController extends Controller
{
    public function index()
    {
        $invernaderos = Invernadero::with('finca')->get();
        return view('invernaderos.index', compact('invernaderos'));
    }

    public function create()
    {
        $fincas = Finca::all();
        return view('invernaderos.create', compact('fincas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'tamano' => 'required|numeric',
            'finca_id' => 'required|exists:fincas,id',
            'costoConstruccion' => 'required|numeric',
            'rendimiento' => 'required|numeric',
        ]);

        Invernadero::create($request->all());

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero creado correctamente');
    }

    public function show(Invernadero $invernadero)
    {
        return view('invernaderos.show', compact('invernadero'));
    }

    public function edit(Invernadero $invernadero)
    {
        $fincas = Finca::all();
        return view('invernaderos.edit', compact('invernadero', 'fincas'));
    }

    public function update(Request $request, Invernadero $invernadero)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tamano' => 'required|numeric',
            'finca_id' => 'required|exists:fincas,id',
            'costoConstruccion' => 'required|numeric',
            'rendimiento' => 'required|numeric',
        ]);

        $invernadero->update($validated);

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero actualizado correctamente');
    }

    public function destroy(Invernadero $invernadero)
    {
        $invernadero->delete();

        return redirect()->route('invernaderos.index')
                         ->with('success', 'Invernadero eliminado correctamente');
    }
}
