<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiencia extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa',
        'descricao',
        'trabalhando',
        'funcao',
        'candidato_id',
    ];

    public function candidato() {
        return $this->belongsTo(Candidato::class);
    }
}
