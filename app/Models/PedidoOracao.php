<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoOracao extends Model
{
    protected $table = 'pedido_oracaos';

    protected $fillable = ['texto', 'confirmado', 'lido', 'user_id'];

    use HasFactory;
}
