<?php

// app/Http/Controllers/LicenciaController.php
namespace App\Http\Controllers;

use App\Models\Licencia; // Asegúrate de que este modelo esté definido
use App\Models\Dispositivo; // Asegúrate de incluir el modelo Dispositivo
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
        // Obtener todos los dispositivos
        $dispositivos = Dispositivo::all(); 
        return view('licencias.create', compact('dispositivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'fecha_expiracion' => 'required|date',
            'dispositivo_id' => 'required|exists:dispositivos,id', // Asegúrate de que el dispositivo existe
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
        // Obtener todos los dispositivos
        $dispositivos = Dispositivo::all(); 
        return view('licencias.edit', compact('licencia', 'dispositivos'));
    }

    public function update(Request $request, Licencia $licencia)
    {
        $request->validate([
            'nombre' => 'required|string',
            'codigo' => 'required|string',
            'fecha_expiracion' => 'required|date',
            'dispositivo_id' => 'required|exists:dispositivos,id', // Asegúrate de que el dispositivo existe
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
