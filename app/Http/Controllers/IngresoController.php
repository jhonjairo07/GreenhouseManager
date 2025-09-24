<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use App\Models\Cosecha;
use Illuminate\Http\Request;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::with('cosecha')->get();
        return view('ingresos.index', compact('ingresos'));
    }

    public function create()
    {
        $cosechas = Cosecha::all();
        return view('ingresos.create', compact('cosechas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cosechas_id' => 'required',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'cantidad_vendida' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
        ]);

        Ingreso::create($validated);

        return redirect()->route('ingresos.index');
    }

    public function show(Ingreso $ingreso)
    {
        return view('ingresos.show', compact('ingreso'));
    }

    public function edit(Ingreso $ingreso)
    {
        $cosechas = Cosecha::all();
        return view('ingresos.edit', compact('ingreso','cosechas'));
    }

    public function update(Request $request, Ingreso $ingreso)
    {
        $validated = $request->validate([
            'cosechas_id' => 'required',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'cantidad_vendida' => 'required|numeric',
            'precio_unitario' => 'required|numeric',
        ]);

        $ingreso->update($validated);

        return redirect()->route('ingresos.index');
    }

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index');
    }
}
