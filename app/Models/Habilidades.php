<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habilidades extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_h',
        
    ];

    public function candidato() {
        return $this->belongsTo(Candidato::class);
    }
}
