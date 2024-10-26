<?php


namespace App\Http\Controllers;
use App\Models\Envio;
use Illuminate\Http\Request;

class EnvioController extends Controller
{
    public function index()
    {
        $envios = Envio::all();
        return view('envios.index', compact('envios'));
    }

    public function create()
    {
        return view('envios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'direccion_destino' => 'required|string',
            'fecha_envio' => 'required|date',
            'estado_envio' => 'required|string',
            'tipo_envio' => 'required|string',
            'usuario_id' => 'required|exists:users,id_usuario',
            'factura_id' => 'required|exists:facturas,id_factura'
        ]);

        Envio::create($request->all());
        return redirect()->route('envios.index');
    }

    public function show(Envio $envio)
    {
        return view('envios.show', compact('envio'));
    }

    public function edit(Envio $envio)
    {
        return view('envios.edit', compact('envio'));
    }

    public function update(Request $request, Envio $envio)
    {
        $request->validate([
            'direccion_destino' => 'required|string',
            'fecha_envio' => 'required|date',
            'estado_envio' => 'required|string',
            'tipo_envio' => 'required|string'
        ]);

        $envio->update($request->all());
        return redirect()->route('envios.index');
    }

    public function destroy(Envio $envio)
    {
        $envio->delete();
        return redirect()->route('envios.index');
    }
}