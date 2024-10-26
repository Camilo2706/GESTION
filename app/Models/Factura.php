<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_factura';
    protected $fillable = ['fecha', 'cedula_cliente', 'nombre_cliente', 'telefono_cliente', 'direccion_cliente', 'email_cliente', 'detalle', 'subtotal', 'total'];
}

