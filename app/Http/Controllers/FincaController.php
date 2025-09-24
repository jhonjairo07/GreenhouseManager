<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use Illuminate\Http\Request;

class FincaController extends Controller
{
    public function index()
    {
        $fincas = Finca::all();
        return view('fincas.index', compact('fincas'));
    }

    public function create()
    {
        return view('fincas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        Finca::create($validated);

        return redirect()->route('fincas.index');
    }

    public function show(Finca $finca)
    {
        return view('fincas.show', compact('finca'));
    }

    public function edit(Finca $finca)
    {
        return view('fincas.edit', compact('finca'));
    }

    public function update(Request $request, Finca $finca)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
        ]);

        $finca->update($validated);

        return redirect()->route('fincas.index');
    }

    public function destroy(Finca $finca)
    {
        $finca->delete();
        return redirect()->route('fincas.index');
    }
}
