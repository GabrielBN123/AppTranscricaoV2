<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoLouvor extends Model
{

    protected $table = 'pedido_louvors';

    protected $fillable = ['texto', 'confirmado', 'lido', 'user_id'];

    use HasFactory;
}
