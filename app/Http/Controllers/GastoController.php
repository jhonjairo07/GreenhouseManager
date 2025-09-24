<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Cosecha;
use App\Models\CategoriaGasto;
use App\Models\Invernadero;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::all();
        $cosechas = Cosecha::all();
        $categorias = CategoriaGasto::all();
        $invernaderos = Invernadero::all();
        return view('gastos.index', compact('gastos','cosechas','categorias','invernaderos'));
    }

    public function create()
    {
        $cosechas = Cosecha::all();
        $categorias = CategoriaGasto::all();
        return view('gastos.create', compact('cosechas','categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cosechas_id' => 'required|exists:cosechas,id',
            'categorias_gastos_id' => 'required|exists:categorias_gastos,id',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'monto' => 'required|numeric',
        ]);

        Gasto::create($validated);

        return redirect()->route('gastos.index');
    }

    public function show(Gasto $gasto)
    {
        return view('gastos.show', compact('gasto'));
    }

    public function edit(Gasto $gasto)
    {
        $cosechas = Cosecha::all();
        $categorias = CategoriaGasto::all();
        return view('gastos.edit', compact('gasto','cosechas','categorias'));
    }

    public function update(Request $request, Gasto $gasto)
    {
        $validated = $request->validate([
            'cosechas_id' => 'required|exists:cosechas,id',
            'categorias_gastos_id' => 'required|exists:categorias_gastos,id',
            'fecha' => 'required|date',
            'descripcion' => 'nullable|string',
            'monto' => 'required|numeric',
        ]);

        $gasto->update($validated);

        return redirect()->route('gastos.index');
    }

    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gastos.index');
    }
}
