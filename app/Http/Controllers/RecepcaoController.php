<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecepcaoController extends Controller
{
    public function index()
    {

        return view('painel.recepcao', [
            'user_id' => Auth::id(),
            'forms' => [
                'Apresentação de Visitante' => ['apresentacaos', 0],
                'Avisos' => ['aviso', 1],
                'Pedidos de Oração' => ['pedidoOracao', 2],
                'Felicitações' => ['felicitacao', 3],
                'Pedidos de Louvor' => ['pedidoLouvor', 4],
                'Ação de Graças' => ['acaoGracas', 5],
                'Apresentação de Recém Nascidos' => ['apresentacaoRN', 6],
                'Pedido de Comunhão' => ['pedidoComunhao', 7],
                'Carta de Apresentação' => ['cartaApresentacao', 8],
            ],
            'rotaindex' => route('painel.recepcao.index')
        ]);
    }

    public function store(Request $request)
    {
        $forms = [
            'apresentacaos' => 'apresentacaos',
            'aviso' => 'avisos',
            'pedidoOracao' => 'pedido_oracaos',
            'felicitacao' => 'felicitacaos',
            'pedidoLouvor' => 'pedido_louvors',
            'acaoGracas' => 'acao_gracas',
            'apresentacaoRN' => 'apresentacao_r_n_s',
            'pedidoComunhao' => 'pedido_comunhaos',
            'cartaApresentacao' => 'carta_apresentacaos'
        ];

        foreach ($forms as $campo => $table) {
            if ($request->$campo != null) {
                // echo $campos . ' - ' . $request->$campos . '<br />';
                DB::table($table)->insert([
                    ['texto' => $request->$campo, 'user_id' => $request->user_id]
                ]);
            }
        }
        return redirect(route('painel.recepcao.index'));
    }
}
