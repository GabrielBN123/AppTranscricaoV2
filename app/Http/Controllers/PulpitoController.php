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
use Illuminate\Support\Facades\DB;

class PulpitoController extends Controller
{
    public function index()
    {

        // dd($formulario);

        return view('painel.pulpito', [
            'Formulario' => [
                Apresentacao::where('confirmado', 1)->get(),
                Aviso::where('confirmado', 1)->get(),
                PedidoOracao::where('confirmado', 1)->get(),
                Felicitacao::where('confirmado', 1)->get(),
                PedidoLouvor::where('confirmado', 1)->get(),
                AcaoGraca::where('confirmado', 1)->get(),
                ApresentacaoRN::where('confirmado', 1)->get(),
                PedidoComunhao::where('confirmado', 1)->get(),
                CartaApresentacao::where('confirmado', 1)->get(),
            ],
            'forms' => [
                'Apresentação de Visitante' => ['apresentacaos', 0, 'apresentacaos'],
                'Avisos' => ['aviso', 1, 'avisos'],
                'Pedidos de Oração' => ['pedidoOracao', 2, 'pedido_oracaos'],
                'Felicitações' => ['Felicitacao', 3, 'felicitacaos'],
                'Pedidos de Louvor' => ['pedidoLouvor', 4, 'pedido_louvors'],
                'Ação de Graças' => ['acaoGracas', 5, ''],
                'Apresentação de Recém Nascidos' => ['apresentacaoRN', 6, 'apresentacao_r_n_s'],
                'Pedido de Comunhão' => ['pedidoComunhao', 7, 'pedido_comunhaos'],
                'Carta de Apresentação' => ['cartaApresentacao', 8, 'carta_apresentacaos'],
            ],
            'rotaindex' => route('painel.pulpito.index')
        ]);
    }
    public function update(Request $request)
    {
        // $forms = [
        //     'apresentacaos' => 'apresentacaos',
        //     'aviso' => 'avisos',
        //     'pedidoOracao' => 'pedido_oracaos',
        //     'felicitacao' => 'felicitacaos',
        //     'pedidoLouvor' => 'pedido_louvors',
        //     'acaoGracas' => 'acao_gracas',
        //     'apresentacaoRN' => 'apresentacao_r_n_s',
        //     'pedidoComunhao' => 'pedido_comunhaos',
        //     'cartaApresentacao' => 'carta_apresentacaos'
        // ];

        // foreach ($forms as $campo => $table) {
        //     if ($request->$campo != null) {
        DB::table($request->tb)->where('id', $request->id)->update(
            ['lido' => 1]
        );
        //     }
        // }
    }
}
