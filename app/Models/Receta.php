<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        "titulo",
        "categoria_id",
        "ingredientes",
        "preparacion",
        "imagen",
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria_receta::class);
    }
}
