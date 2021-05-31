<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormRequest;
use App\Models\AcaoGraca;
use App\Models\Apresentacao;
use App\Models\ApresentacaoRN;
use App\Models\Aviso;
use App\Models\CartaApresentacao;
use App\Models\Felicitacao;
use App\Models\Formulario;
use App\Models\PedidoComunhao;
use App\Models\PedidoLouvor;
use App\Models\PedidoOracao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TranscricaoController extends Controller
{


    public function index()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user...
        $id = Auth::id(); // Retrieve the currently authenticated user's ID...

        return view('painel.transcricao', [
            'id' => $id,
            'user' => $user,
            'Formulario' => [
                Apresentacao::orderBy('id', 'DESC')->get(),
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
                'Felicitações' => ['felicitacao', 3],
                'Pedidos de Louvor' => ['pedidoLouvor', 4],
                'Ação de Graças' => ['acaoGracas', 5],
                'Apresentação de Recém Nascidos' => ['apresentacaoRN', 6],
                'Pedido de Comunhão' => ['pedidoComunhao', 7],
                'Carta de Apresentação' => ['cartaApresentacao', 8],
            ],
            'rotaindex' => route('painel.transcricao.index')
        ]);
    }

    public function detalhes($table, $id)
    {
        // recupera por um  especifico
        // $teste = Apresentacao::where('id', $id)->first();
        // recupera direto pelo ID
        switch ($table) {
            case 'apresentacaos':
                $detail = Apresentacao::find($id);
                $tabela = 'Apresentação';
                break;
            case 'aviso':
                $detail = Aviso::find($id);
                $tabela = 'Aviso';
                break;
            case 'pedidoOracao':
                $detail = PedidoOracao::find($id);
                $tabela = 'Pedido de Oração';
                break;
            case 'felicitacao':
                $detail = Felicitacao::find($id);
                $tabela = 'Felicitação';
                break;
            case 'pedidoLouvor':
                $detail = PedidoLouvor::find($id);
                $tabela = 'Pedido de Louvor';
                break;
            case 'acaoGracas':
                $detail = AcaoGraca::find($id);
                $tabela = 'Ação de Graças';
                break;
            case 'apresentacaoRN':
                $detail = ApresentacaoRN::find($id);
                $tabela = 'Apresentação de Rescém Nascido';
                break;
            case 'pedidoComunhao':
                $detail = PedidoComunhao::find($id);
                $tabela = 'Pedido de Comunhão';
                break;
            case 'cartaApresentacao':
                $detail = CartaApresentacao::find($id);
                $tabela = 'Carta de Apresentação';
                break;
            default:
                $detail = null;
                break;
        }
        if ($detail != null) {
            return view('painel.Modal.Detalhes', [
                'Dados' => $detail,
                'tabela' => $tabela,
                'rotaindex' => route('painel.transcricao.index')
            ]);
        } else {
            return Redirect()->route('painel.transcricao.index');
        }
    }

    public function update(StoreFormRequest $request, $table, $id)
    {
        switch ($table) {
            case 'apresentacaos':
                $table = Apresentacao::find($id);
                break;
            case 'aviso':
                $table = Aviso::find($id);
                break;
            case 'pedidoOracao':
                $table = PedidoOracao::find($id);
                break;
            case 'felicitacao':
                $table = Felicitacao::find($id);
                break;
            case 'pedidoLouvor':
                $table = PedidoLouvor::find($id);
                break;
            case 'acaoGracas':
                $table = AcaoGraca::find($id);
                break;
            case 'apresentacaoRN':
                $table = ApresentacaoRN::find($id);
                break;
            case 'pedidoComunhao':
                $table = PedidoComunhao::find($id);
                break;
            case 'cartaApresentacao':
                $table = CartaApresentacao::find($id);
                break;
            default:
                $table = null;
                break;
        }
        if ($table != null) {

            $table->update([
                $request->all(),
                'user_id' => $request->user_id,
                'confirmado' => true
            ]);
            // dd($request->all());
        }
        return Redirect()->route('painel.transcricao.index');
    }

    public function delete($table, $id)
    {
        switch ($table) {
            case 'apresentacaos':
                $delete = Apresentacao::find($id);
                break;
            case 'aviso':
                $delete = Aviso::find($id);
                break;
            case 'pedidoOracao':
                $delete = PedidoOracao::find($id);
                break;
            case 'felicitacao':
                $delete = Felicitacao::find($id);
                break;
            case 'pedidoLouvor':
                $delete = PedidoLouvor::find($id);
                break;
            case 'acaoGracas':
                $delete = AcaoGraca::find($id);
                break;
            case 'apresentacaoRN':
                $delete = ApresentacaoRN::find($id);
                break;
            case 'pedidoComunhao':
                $delete = PedidoComunhao::find($id);
                break;
            case 'cartaApresentacao':
                $delete = CartaApresentacao::find($id);
                break;
            default:
                $delete = null;
                break;
        }
        if ($delete != null) {
            // return view('painel.Modal.Detalhes', [
            //     'Dados' => $delete,
            //     'rotaindex' => route('painel.transcricao.index')
            // ]);
            $delete->delete();
            // Redirect()->route('painel.transcricao.index');
        }
        return Redirect()->route('painel.transcricao.index');
    }
}
