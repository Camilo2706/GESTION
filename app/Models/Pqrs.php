<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pqrs extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pqrs';
    protected $fillable = ['id_usuario', 'tipo', 'descripcion', 'fecha_creacion', 'estado'];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }
}
