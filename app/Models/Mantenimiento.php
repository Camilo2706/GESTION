<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mantenimiento extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mantenimiento';
    protected $fillable = ['id_dispositivo', 'descripcion_mantenimiento', 'fecha_mantenimiento', 'estado_mantenimiento'];

    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class, 'id_dispositivo');
    }
}

