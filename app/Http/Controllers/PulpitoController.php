<?php

namespace App\Http\Controllers;

use App\Models\AcaoGraca;
use App\Models\Apresentacao;
use App\Models\ApresentacaoRN;
use App\Models\Aviso;
use App\Models\CartaApresentacao;
use App\Models\Felicitacao;
use App\Models\PedidoComunhao;
use App\Models\PedidoLouvor;
use App\Models\PedidoOracao;
use Illuminate\Http\Request;

class PulpitoController extends Controller
{
    public function index()
    {

        // dd($formulario);

        return view('painel.pulpito', [
            'Formulario' => [
                Apresentacao::get(),
                Aviso::get(),
                PedidoOracao::get(),
                Felicitacao::get(),
                PedidoLouvor::get(),
                AcaoGraca::get(),
                ApresentacaoRN::get(),
                PedidoComunhao::get(),
                CartaApresentacao::get(),
            ],
            'forms' => [
                'Apresentação de Visitante' => ['apresentacaos', 0],
                'Avisos' => ['aviso', 1],
                'Pedidos de Oração' => ['pedidoOracao', 2],
                'Felicitações' => ['Felicitacao', 3],
                'Pedidos de Louvor' => ['pedidoLouvor', 4],
                'Ação de Graças' => ['acaoGracas', 5],
                'Apresentação de Recém Nascidos' => ['apresentacaoRN', 6],
                'Pedido de Comunhão' => ['pedidoComunhao', 7],
                'Carta de Apresentação' => ['cartaApresentacao', 8],
            ],
            'rotaindex' => route('painel.pulpito.index')
        ]);
    }
}
