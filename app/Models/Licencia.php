<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Licencia extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_licencia';
    protected $fillable = ['nombre_licencia', 'fecha_vencimiento', 'dispositivo_id'];

    public function dispositivo(): BelongsTo
    {
        return $this->belongsTo(Dispositivo::class, 'dispositivo_id');
    }
}
