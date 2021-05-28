@extends('template.template')

@section('title', 'Detalhes')

@section('content')
    <div class="container pt-5">
        <div class="row bg-light rounded">
            <div class="col-1 py-4">
                <a class="font-dark fs-4 px-2" href=" {{ route('painel.transcricao.index') }} " title="Voltar a listagem">
                    <i class="fas fa-arrow-alt-circle-left"></i>
                </a>
            </div>
            <div class="col-11 text-center py-3">
                <h2>Detalhes: {{ $tabela }}</h2>
            </div>
            <hr>
            <div class="col-2 py-2">
                <strong>ID Texto:</strong> {{ $Dados->id }}
            </div>
            <div class="col-2 py-2">
                <strong>ID Usuario:</strong> {{ $Dados->user_id }}
            </div>
            <hr>
            <div class="col-12 py-2 border-secondary rounded">
                <strong>Conteúdo:</strong> {{ $Dados->texto }}
            </div>
            <hr>
            <div class="col-12 py-2 border-secondary rounded">
                <strong>Alterado:</strong>
                @if ($Dados->confirmado == null || $Dados->confirmado == 0)
                    <span class="bg-danger px-2 rounded text-light">Não</span>
                @else
                    <span class="bg-success px-2 rounded text-light">Sim</span>
                @endif
            </div>
            <hr>
            <div class="col-12 text-center pt-3 pb-2">
                <h2> </h2>
            </div>
        </div>
    </div>
@endsection
