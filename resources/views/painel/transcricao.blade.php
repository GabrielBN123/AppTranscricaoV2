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
                                    <div class="row">
                                        <div class="form-floating col-11">
                                            <textarea class="form-control" placeholder="Leave a comment here"
                                                id="floatingTextarea2"
                                                style="height: 100px">{{ $content->texto }}</textarea>
                                            <label for="floatingTextarea2">{{ $content->id }}</label>
                                        </div>
                                        <div class="col-1 py-4">
                                            <button class="btn btn-danger rounded" title="Excluir">
                                                <i class="fas fa-minus-circle"></i>
                                            </button>
                                            <button type="submit" class="btn btn-success rounded" title="Salvar">
                                                <i class="fas fa-save"></i>
                                            </button>
                                        </div>
                                    </div>
                                @else
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
