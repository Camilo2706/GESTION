<?php

// app/Http/Controllers/LicenciaController.php
namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;

class LicenciaController extends Controller
{
    public function index()
    {
        $licencias = Licencia::all();
        return view('licencias.index', compact('licencias'));
    }

    public function create()
    {
        return view('licencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_licencia' => 'required|string',
            'fecha_vencimiento' => 'nullable|date',
            'dispositivo_id' => 'required|exists:dispositivos,id_dispositivo'
        ]);

        Licencia::create($request->all());
        return redirect()->route('licencias.index');
    }

    public function show(Licencia $licencia)
    {
        return view('licencias.show', compact('licencia'));
    }

    public function edit(Licencia $licencia)
    {
        return view('licencias.edit', compact('licencia'));
    }

    public function update(Request $request, Licencia $licencia)
    {
        $request->validate([
            'nombre_licencia' => 'required|string',
            'fecha_vencimiento' => 'nullable|date'
        ]);

        $licencia->update($request->all());
        return redirect()->route('licencias.index');
    }

    public function destroy(Licencia $licencia)
    {
        $licencia->delete();
        return redirect()->route('licencias.index');
    }
}
