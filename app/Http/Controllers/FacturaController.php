<?php

// app/Http/Controllers/FacturaController.php
namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        return view('facturas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cedula_cliente' => 'required|string',
            'nombre_cliente' => 'required|string',
            'telefono_cliente' => 'required|string',
            'direccion_cliente' => 'required|string',
            'email_cliente' => 'required|email',
            'detalle' => 'required|string',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        Factura::create($request->all());
        return redirect()->route('facturas.index');
    }

    public function show(Factura $factura)
    {
        return view('facturas.show', compact('factura'));
    }

    public function edit(Factura $factura)
    {
        return view('facturas.edit', compact('factura'));
    }

    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cedula_cliente' => 'required|string',
            'nombre_cliente' => 'required|string',
            'telefono_cliente' => 'required|string',
            'direccion_cliente' => 'required|string',
            'email_cliente' => 'required|email',
            'detalle' => 'required|string',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric'
        ]);

        $factura->update($request->all());
        return redirect()->route('facturas.index');
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index');
    }
}
