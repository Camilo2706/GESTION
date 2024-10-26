<?php


namespace App\Http\Controllers;

use App\Models\Pqrs;
use Illuminate\Http\Request;

class PqrsController extends Controller
{
    public function index()
    {
        $pqrs = Pqrs::all();
        return view('pqrs.index', compact('pqrs'));
    }

    public function create()
    {
        return view('pqrs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_usuario' => 'required|exists:users,id_usuario',
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_creacion' => 'nullable|date',
            'estado' => 'required|string'
        ]);

        Pqrs::create($request->all());
        return redirect()->route('pqrs.index');
    }

    public function show(Pqrs $pqr)
    {
        return view('pqrs.show', compact('pqr'));
    }

    public function edit(Pqrs $pqr)
    {
        return view('pqrs.edit', compact('pqr'));
    }

    public function update(Request $request, Pqrs $pqr)
    {
        $request->validate([
            'tipo' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_creacion' => 'nullable|date',
            'estado' => 'required|string'
        ]);

        $pqr->update($request->all());
        return redirect()->route('pqrs.index');
    }

    public function destroy(Pqrs $pqr)
    {
        $pqr->delete();
        return redirect()->route('pqrs.index');
    }
}

