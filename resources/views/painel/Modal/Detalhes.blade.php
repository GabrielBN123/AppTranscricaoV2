@extends('template.template')

@section('title', 'Detalhes')

@section('content')
    <div class="container pt-5">
        <div class="row bg-light rounded">
            <div class="col-12 text-center py-3">
                <h2>Detalhes do Formulário</h2>
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
                <strong>Alterado:</strong> {{ $Dados->confirmado }}
            </div>
            <hr>
            <div class="col-12 text-center pt-3 pb-2">
                <h2>  </h2>
            </div>
        </div>
    </div>
@endsection
