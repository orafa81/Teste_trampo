<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linguas extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_l',
        'nivel',
        
    ];

    public function candidato() {
        return $this->belongsTo(Candidato::class);
    }
}
