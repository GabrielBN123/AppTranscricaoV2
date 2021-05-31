<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Felicitacao extends Model
{
    protected $table = 'felicitacaos';

    protected $fillable = ['texto', 'confirmado', 'lido', 'user_id'];

    use HasFactory;
}
