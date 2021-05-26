@extends('template.template')

@section('title', 'Painel')

@section('content')
    <div class="accordion px-5 pt-3" id="accordionPanelsStayOpenExample">
        @foreach ($forms as $title => $id)
            <div class="accordion-item pb-1 bg-secondary">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo-{{ $id[0] }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo-{{ $id[0] }}" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo-{{ $id[0] }}">
                            {{ $title }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo-{{ $id[0] }}" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingTwo-{{ $id[0] }}">
                        @foreach ($Formulario[$id[1]] as $content)
                            <div class="accordion-body">
                                @if (isset($content->texto))
                                    <form action="">
                                        <div class="row">
                                            <div class="form-floating col-10">
                                                <textarea class="form-control" placeholder="Leave a comment here"
                                                    id="floatingTextarea2"
                                                    style="height: 100px">{{ $content->texto }}</textarea>
                                                <label for="floatingTextarea2"> ID: {{ $content->id }}</label>
                                            </div>
                                            <div class="col-2 py-4 px-5">
                                                <a class="btn btn-danger rounded" title="Excluir">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <button type="submit" class="btn btn-success rounded" title="Salvar">
                                                    <i class="fas fa-save"></i>
                                                </button>
                                                <a class="btn btn-info rounded" title="Ver Detalhes" href="{{ route('painel.transcricao.show', ['table' => $id[0], 'id' => $content->id]) }}">
                                                    <i class="fas fa-info-circle"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                @else
                                    <div class="row">
                                        <h1>Não há registro</h1>
                                    </div>
                                    <div class="alert alert-info">Não há <strong>{{ $title }}</strong>.</div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
