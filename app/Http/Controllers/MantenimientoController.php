<?php


namespace App\Http\Controllers;

use App\Models\Mantenimiento;
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
        return view('mantenimientos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dispositivo' => 'required|exists:dispositivos,id_dispositivo',
            'descripcion_mantenimiento' => 'required|string',
            'fecha_mantenimiento' => 'nullable|date',
            'estado_mantenimiento' => 'required|string'
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
        return view('mantenimientos.edit', compact('mantenimiento'));
    }

    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            'descripcion_mantenimiento' => 'required|string',
            'fecha_mantenimiento' => 'nullable|date',
            'estado_mantenimiento' => 'required|string'
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

