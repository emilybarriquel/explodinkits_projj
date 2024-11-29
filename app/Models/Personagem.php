<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personagem extends Model
{
    use HasFactory;

    protected $table = 'personagens';

    protected $fillable = ['nome', 'descricao', 'habilidade_id', 'classe_id'];

    public function habilidade()
    {
        return $this->belongsTo(Habilidade::class, 'habilidade_id');
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
}
