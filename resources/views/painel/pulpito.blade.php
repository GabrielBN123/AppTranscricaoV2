@extends('template.template')

@section('title', 'Painel')

@section('content')
    @php
    $forms = [
        'Apresentação de Visitante' => 'apresentacao',
        'Avisos' => 'aviso',
        'Pedidos de Oração' => 'pedidoOracao',
        'Felicitações' => 'Felicitacao',
        'Pedidos de Louvor' => 'pedidoLouvor',
        'Ação de Graças' => 'acaoGracas',
        'Apresentação de Recém Nascidos' => 'apresentacaoRN',
        'Pedido de Comunhão' => 'pedidoComunhao',
        'Carta de Apresentação' => 'cartaApresentacao',
    ];
    @endphp
    <div class="accordion" id="accordionPanelsStayOpenExample">
        @foreach ($forms as $title => $id)
            <div class="accordion-item">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-{{ $id }}">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-{{ $id }}" aria-expanded="true"
                            aria-controls="panelsStayOpen-collapseOne">
                            {{ $title }}
                        </button>
                    </h2>
                    <div id="panelsStayOpen-{{ $id }}" class="accordion-collapse collapse show"
                        aria-labelledby="panelsStayOpen-{{ $id }}">
                        @foreach ($formulario as $content)
                            <div class="accordion-body">
                                {{ $content->$id }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseTwo">
                Accordion Item #2
            </button>
        </h2> --}}
    {{-- <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingTwo">
            <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse
                plugin adds the appropriate classes that we use to style each element. These classes control the overall
                appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go
                within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div> --}}
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                aria-controls="panelsStayOpen-collapseThree">
                Accordion Item #3
            </button>
        </h2>
        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
            aria-labelledby="panelsStayOpen-headingThree">
            <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse
                plugin adds the appropriate classes that we use to style each element. These classes control the overall
                appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with
                custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go
                within the <code>.accordion-body</code>, though the transition does limit overflow.
            </div>
        </div>
    </div>
    </div>
@endsection
