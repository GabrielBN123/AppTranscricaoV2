<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class PulpitoController extends Controller
{
    public function index(){

        $formulario = Formulario::get();

        // dd($formulario);

        return view('painel.pulpito', [
            'formulario'=> $formulario, 
            'forms' => [
                'Apresentação de Visitante' => 'apresentacao',
                'Avisos' => 'aviso',
                'Pedidos de Oração' => 'pedidoOracao',
                'Felicitações' => 'Felicitacao',
                'Pedidos de Louvor' => 'pedidoLouvor',
                'Ação de Graças' => 'acaoGracas',
                'Apresentação de Recém Nascidos' => 'apresentacaoRN',
                'Pedido de Comunhão' => 'pedidoComunhao',
                'Carta de Apresentação' => 'cartaApresentacao',
            ]
        ]);
    }
}
