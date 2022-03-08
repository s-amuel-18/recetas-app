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
        return $this->belongsTo(Categoria_receta::class, "categoria_id");
    }
    public function autor()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
