<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = [
        'nome',
        'sobrenome',
        'id_user',
        'id_instituicao'
    ];

    public function instituicao(){
        return $this->hasOne(Instituicao::class, 'id', 'id_instituicao');
    }
}
