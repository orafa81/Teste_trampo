<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ferramentas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_f',
    
    ];

    public function candidato() {
        return $this->belongsTo(Candidato::class);
    }
}
