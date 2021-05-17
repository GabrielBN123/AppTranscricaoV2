@extends('template.template')

@section('title', 'Painel')

@section('content')
    <div class="accordion" id="accordionPanelsStayOpenExample">
        @foreach ($forms as $title => $id)
            <div class="accordion-item">

                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo-{{ $id }}">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo-{{ $id }}" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo-{{ $id }}">
                            {{ $title }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo-{{ $id }}" class="accordion-collapse collapse"
                        aria-labelledby="panelsStayOpen-headingTwo-{{ $id }}">
                        @foreach ($formulario as $content)
                            <div class="accordion-body">
                                @if ($content->$id != null)
                                    <div class="alert alert-secondary bg-transparent alert-dismissible fade show" role="alert">
                                        {{ $content->$id }}
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
