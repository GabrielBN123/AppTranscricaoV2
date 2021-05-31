<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apresentacao extends Model
{
    
    protected $table = 'apresentacaos';

    protected $fillable = ['texto', 'confirmado', 'lido', 'user_id'];

    use HasFactory;
}
