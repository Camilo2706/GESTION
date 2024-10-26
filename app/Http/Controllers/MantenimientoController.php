<?php

// app/Http/Controllers/MantenimientoController.php
namespace App\Http\Controllers;

use App\Models\Mantenimiento; // Asegúrate de que este modelo esté definido
use App\Models\Dispositivo; // Asegúrate de incluir el modelo Dispositivo
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    public function index()
    {
        $mantenimientos = Mantenimiento::all();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    public function create()
    {
        // Obtener todos los dispositivos
        $dispositivos = Dispositivo::all(); 
        return view('mantenimientos.create', compact('dispositivos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
            'dispositivo_id' => 'required|exists:dispositivos,id', // Asegúrate de que el dispositivo existe
        ]);

        Mantenimiento::create($request->all());
        return redirect()->route('mantenimientos.index');
    }

    public function show(Mantenimiento $mantenimiento)
    {
        return view('mantenimientos.show', compact('mantenimiento'));
    }

    public function edit(Mantenimiento $mantenimiento)
    {
        // Obtener todos los dispositivos
        $dispositivos = Dispositivo::all(); 
        return view('mantenimientos.edit', compact('mantenimiento', 'dispositivos'));
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            'fecha' => 'required|date',
            'descripcion' => 'required|string',
            'dispositivo_id' => 'required|exists:dispositivos,id', // Asegúrate de que el dispositivo existe
        ]);

        $mantenimiento->update($request->all());
        return redirect()->route('mantenimientos.index');
    }

    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();
        return redirect()->route('mantenimientos.index');
    }
}
