<?php


namespace App\Http\Controllers;

use App\Models\Politica;
use Illuminate\Http\Request;

class PoliticaController extends Controller
{
    public function index()
    {
        $politicas = Politica::all();
        return view('politicas.index', compact('politicas'));
    }

    public function create()
    {
        return view('politicas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_politica' => 'required|string',
            'descripcion_politica' => 'required|string'
        ]);

        Politica::create($request->all());
        return redirect()->route('politicas.index');
    }

    public function show(Politica $politica)
    {
        return view('politicas.show', compact('politica'));
    }

    public function edit(Politica $politica)
    {
        return view('politicas.edit', compact('politica'));
    }

    public function update(Request $request, Politica $politica)
    {
        $request->validate([
            'tipo_politica' => 'required|string',
            'descripcion_politica' => 'required|string'
        ]);

        $politica->update($request->all());
        return redirect()->route('politicas.index');
    }

    public function destroy(Politica $politica)
    {
        $politica->delete();
        return redirect()->route('politicas.index');
    }
}

