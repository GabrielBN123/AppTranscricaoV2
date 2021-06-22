@extends('template.template')

@section('title', 'Painel')

@section('content')
    <div class="accordion px-5 pt-3" id="accordionPanelsStayOpenExample">
        @foreach ($forms as $title => $id)
            <div class="accordion-item pb-1 bg-secondary">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="panelsStayOpen-headingTwo-{{ $id[0] }}">
                        <button class="accordion-button collapsed fs-3 fw-bold text-end text-decoration-underline"
                            type="button" data-bs-toggle="collapse"
                            data-bs-target="#panelsStayOpen-collapseTwo-{{ $id[0] }}" aria-expanded="false"
                            aria-controls="panelsStayOpen-collapseTwo-{{ $id[0] }}">
                            <div class="text-center w-100">
                                {{ $title }}
                            </div>
                        </button>
                    </h2>
                    <div id="panelsStayOpen-collapseTwo-{{ $id[0] }}" class="accordion-collapse"
                        aria-labelledby="panelsStayOpen-headingTwo-{{ $id[0] }}">
                        @foreach ($Formulario[$id[1]] as $content)
                            @if ($content->lido != 1)
                                <div class="accordion-body">
                                    @if (isset($content->texto))
                                        <div class="row">
                                            <div class="col-11 alert-secondary bg-transparent alert-dismissible fade show fs-3 text"
                                                role="alert">
                                                {{ $content->texto }}
                                            </div>
                                            <div class="col-1">
                                                <button type="button" data-btn-id="{{ route('readed', [$id[2], $content->id]) }}" class="btn btn-success rounded-circle btn_readed">
                                                    <i class="far fa-check-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                        <hr>
                        @foreach ($Formulario[$id[1]] as $content)
                            @if ($content->lido == 1)
                                <div class="accordion-body">
                                    @if (isset($content->texto))
                                        <div class="row">
                                            <div class="col-12 alert alert-secondary bg-transparent alert-dismissible fade show fs-3 readed"
                                                role="alert">
                                                {{ $content->texto }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @push('scripts')
        <script>
            $('.btn_readed').on('click', function (e) { 
                var div = $(e.target).closest( 'div' );
                div.prev('div').toggleClass( "readed" );
                let link = $(this).attr('data-btn-id');
                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function(){
                    if(this.status == 200 && this.readyState == 4){
                        alert(this.response);
                    }
                }
                xhr.open('GET', link);
                xhr.send();
             });
        </script>
    @endpush
@endsection
