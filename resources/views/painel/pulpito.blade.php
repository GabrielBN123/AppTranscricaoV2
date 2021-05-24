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
                                        <div class="alert alert-secondary bg-transparent alert-dismissible fade show"
                                            role="alert">
                                            {{ $content->texto }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
