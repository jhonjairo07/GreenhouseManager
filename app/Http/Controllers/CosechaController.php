<?php

namespace App\Http\Controllers;

use App\Models\Cosecha;
use App\Models\Invernadero;
use App\Models\TipoCultivo;
use App\Models\EstadoCosecha;
use Illuminate\Http\Request;

class CosechaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cosechas = Cosecha::with(['invernadero','tipoCultivo','estadoCosecha'])->get();
        return view('cosechas.index', compact('cosechas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $invernaderos = Invernadero::all();
        $cultivos = TipoCultivo::all();
        $estados = EstadoCosecha::all();

        return view('cosechas.create', compact('invernaderos', 'cultivos', 'estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'invernadero_id' => 'required|exists:invernaderos,id',
            'cultivo_id' => 'required|exists:tipos_cultivo,id',
            'fecha_creacion' => 'required|date',
            'fecha_siembra' => 'required|date',
            'fecha_cosecha_estimada' => 'nullable|date',
            'fecha_cosecha_real' => 'nullable|date',
            'cantidad_sembrada' => 'required|numeric',
            'total_gastos' => 'nullable|numeric',
            'total_ingresos' => 'nullable|numeric',
            'utilidad' => 'nullable|numeric',
            'id_estado' => 'required|exists:estados_cosecha,id',
            'notas' => 'nullable|string',
        ]);

        Cosecha::create($validated);

        return redirect()->route('cosechas.index')->with('success', 'Cosecha creada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cosecha $cosecha)
    {
        return view('cosechas.show', compact('cosecha'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cosecha $cosecha)
    {
        $invernaderos = Invernadero::all();
        $cultivos = TipoCultivo::all();
        $estados = EstadoCosecha::all();

        return view('cosechas.edit', compact('cosecha', 'invernaderos', 'cultivos', 'estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cosecha $cosecha)
    {
        $validated = $request->validate([
            'invernadero_id' => 'required|exists:invernaderos,id',
            'cultivo_id' => 'required|exists:tipos_cultivo,id',
            'fecha_creacion' => 'required|date',
            'fecha_siembra' => 'required|date',
            'fecha_cosecha_estimada' => 'nullable|date',
            'fecha_cosecha_real' => 'nullable|date',
            'cantidad_sembrada' => 'required|numeric',
            'total_gastos' => 'nullable|numeric',
            'total_ingresos' => 'nullable|numeric',
            'utilidad' => 'nullable|numeric',
            'id_estado' => 'required|exists:estados_cosecha,id',
            'notas' => 'nullable|string',
        ]);

        $cosecha->update($validated);

        return redirect()->route('cosechas.index')->with('success', 'Cosecha actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cosecha $cosecha)
    {
        $cosecha->delete();
        return redirect()->route('cosechas.index')->with('success', 'Cosecha eliminada correctamente');
    }
}