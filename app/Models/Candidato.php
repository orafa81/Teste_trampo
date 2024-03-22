<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'sobre',
        'area',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

  

    public function candidaturas() {
        return $this->hasMany(Candidatura::class);
    }

    public function experiencias() {
        return $this->hasMany(Experiencia::class);
    }

    public function formacaos() {
        return $this->hasMany(Formacao::class);
    }

    public function ferramentas() {
        return $this->hasMany(Ferramentas::class);
    }

    public function habilidades() {
        return $this->hasMany(Habilidades::class);
    }

    public function linguas() {
        return $this->hasMany(Linguas::class);
    }
}
