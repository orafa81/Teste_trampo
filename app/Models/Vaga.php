<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'empresa_id',
        'titulo',
        'hierarquia',
        'salario',
        'descricao',
        'area',
        'beneficio',
        'vinculo_id',
    ];

    public function empresa() {
        return $this->belongsTo(Empresa::class);
    }

    public function candidaturas() {
        return $this->hasMany(Candidatura::class);
    }

    public function vinculo() {
        return $this->belongsTo(Vinculo::class);
    }

    public function requisitos() {
        return $this->hasMany(Requisito::class);
    }

    public function responsabilidades() {
        return $this->hasMany(Responsabilidade::class);
    }

    public function beneficios() {
        return $this->hasMany(Beneficio::class);
    }

}
