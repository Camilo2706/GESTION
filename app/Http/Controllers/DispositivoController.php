<?php

// app/Http/Controllers/DispositivoController.php
namespace App\Http\Controllers;

use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    public function index()
    {
        $dispositivos = Dispositivo::all();
        return view('dispositivos.index', compact('dispositivos'));
    }

    public function create()
    {
        return view('dispositivos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id_usuario',
            'tipo_dispositivo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'fecha_entrega' => 'nullable|date',
            'estado' => 'required|string',
            'licencias' => 'nullable|integer'
        ]);

        Dispositivo::create($request->all());
        return redirect()->route('dispositivos.index');
    }

    public function show(Dispositivo $dispositivo)
    {
        return view('dispositivos.show', compact('dispositivo'));
    }

    public function edit(Dispositivo $dispositivo)
    {
        return view('dispositivos.edit', compact('dispositivo'));
    }

    public function update(Request $request, Dispositivo $dispositivo)
    {
        $request->validate([
            'tipo_dispositivo' => 'required|string',
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'fecha_entrega' => 'nullable|date',
            'estado' => 'required|string',
            'licencias' => 'nullable|integer'
        ]);

        $dispositivo->update($request->all());
        return redirect()->route('dispositivos.index');
    }

    public function destroy(Dispositivo $dispositivo)
    {
        $dispositivo->delete();
        return redirect()->route('dispositivos.index');
    }
}

