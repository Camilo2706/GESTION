<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dispositivo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_dispositivo';
    protected $fillable = ['id_usuario', 'tipo_dispositivo', 'marca', 'modelo', 'fecha_entrega', 'estado', 'licencias'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function licencias(): HasMany
    {
        return $this->hasMany(Licencia::class, 'dispositivo_id');
    }

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class, 'id_dispositivo');
    }

    public function mantenimientos(): HasMany
    {
        return $this->hasMany(Mantenimiento::class, 'id_dispositivo');
    }
}
