<?php


namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function index()
    {
        $reportes = Reporte::all();
        return view('reportes.index', compact('reportes'));
    }

    public function create()
    {
        return view('reportes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_dispositivo' => 'required|exists:dispositivos,id_dispositivo',
            'descripcion' => 'required|string',
            'fecha_reporte' => 'nullable|date',
            'estado_reporte' => 'required|string'
        ]);

        Reporte::create($request->all());
        return redirect()->route('reportes.index');
    }

    public function show(Reporte $reporte)
    {
        return view('reportes.show', compact('reporte'));
    }

    public function edit(Reporte $reporte)
    {
        return view('reportes.edit', compact('reporte'));
    }

    public function update(Request $request, Reporte $reporte)
    {
        $request->validate([
            'descripcion' => 'required|string',
            'fecha_reporte' => 'nullable|date',
            'estado_reporte' => 'required|string'
        ]);

        $reporte->update($request->all());
        return redirect()->route('reportes.index');
    }

    public function destroy(Reporte $reporte)
    {
        $reporte->delete();
        return redirect()->route('reportes.index');
    }
}

