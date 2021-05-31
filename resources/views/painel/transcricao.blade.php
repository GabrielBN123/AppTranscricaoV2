@extends('template.template')

@section('title', 'Painel')

@section('content')
    {{-- @php
    $count_table = count($Formulario[0]);
@endphp --}}
    <div class="accordion px-5 pt-3" id="accordionPanelsStayOpenExample">
        {{-- {{ dd($id) }} --}}
        {{-- {{ dd($user->id) }} --}}
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
                        @if (count($Formulario[$id[1]]) != 0)
                            @foreach ($Formulario[$id[1]] as $content)
                                <div class="accordion-body">
                                    @if ($content->confirmado == null)
                                        <form
                                            action="{{ route('painel.transcricao.update', ['table' => $id[0], 'id' => $content->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            {{-- <input type="hidden" name=""> --}}
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="row">
                                                <div class="form-floating col-10">
                                                    <textarea class="form-control" placeholder="Leave a comment here"
                                                        name="texto" id="floatingTextarea2"
                                                        style="height: 100px">{{ $content->texto }}</textarea>
                                                    <label for="floatingTextarea2"> ID: {{ $content->id }}</label>
                                                </div>
                                                <div class="col-2 py-4 px-5">
                                                    <a class="btn btn-danger rounded" href="" title="Excluir"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $id[0] }}-{{ $content->id }}">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                    <button type="submit" class="btn btn-success rounded" title="Salvar">
                                                        <i class="fas fa-save"></i>
                                                    </button>
                                                    <a class="btn btn-info rounded" title="Ver Detalhes"
                                                        href="{{ route('painel.transcricao.show', ['table' => $id[0], 'id' => $content->id]) }}">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="modal fade" id="exampleModal-{{ $id[0] }}-{{ $content->id }}"
                                            tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmar</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Tem Certeza que Deseja deletar este registro?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">
                                                            Não
                                                        </button>
                                                        <form
                                                            action="{{ route('painel.transcricao.delete', ['table' => $id[0], 'id' => $content->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-primary">
                                                                Sim
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            {{-- Alterados --}}
                            <div class="accordion-item">
                                <div class="accordion-item ">
                                    <h2 class="accordion-header"
                                        id="panelsStayOpen-headingTwo-alterado-{{ $id[0] }}">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#panelsStayOpen-collapseTwo-alterado-{{ $id[0] }}"
                                            aria-expanded="false"
                                            aria-controls="panelsStayOpen-collapseTwo-alterado-{{ $id[0] }}">
                                            Alterados
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapseTwo-alterado-{{ $id[0] }}"
                                        class="accordion-collapse collapse"
                                        aria-labelledby="panelsStayOpen-headingTwo-alterado-{{ $id[0] }}">
                                        @foreach ($Formulario[$id[1]] as $content)
                                            <div class="accordion-body">
                                                @if (isset($content->texto))
                                                    @if ($content->confirmado == 1)
                                                        <form
                                                            action="{{ route('painel.transcricao.update', ['table' => $id[0], 'id' => $content->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('put')
                                                            {{-- <input type="hidden" name=""> --}}
                                                            <input type="hidden" name="user_id"
                                                                value="{{ $user->id }}">
                                                            <div class="row">
                                                                <div class="form-floating col-10">
                                                                    <textarea class="form-control"
                                                                        placeholder="Leave a comment here" name="texto"
                                                                        id="floatingTextarea2"
                                                                        style="height: 100px">{{ $content->texto }}</textarea>
                                                                    <label for="floatingTextarea2"> ID:
                                                                        {{ $content->id }}</label>
                                                                </div>
                                                                <div class="col-2 py-4 px-5">
                                                                    <a class="btn btn-danger rounded" href=""
                                                                        title="Excluir" data-bs-toggle="modal"
                                                                        data-bs-target="#exampleModal-{{ $id[0] }}-{{ $content->id }}">
                                                                        <i class="fas fa-trash"></i>
                                                                    </a>
                                                                    <button type="submit" class="btn btn-success rounded"
                                                                        title="Salvar">
                                                                        <i class="fas fa-save"></i>
                                                                    </button>
                                                                    <a class="btn btn-info rounded" title="Ver Detalhes"
                                                                        href="{{ route('painel.transcricao.show', ['table' => $id[0], 'id' => $content->id]) }}">
                                                                        <i class="fas fa-info-circle"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div class="modal fade"
                                                            id="exampleModal-{{ $id[0] }}-{{ $content->id }}"
                                                            tabindex="-1" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Confirmar
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        Tem Certeza que Deseja deletar este registro?
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Não</button>
                                                                        <button type="button"
                                                                            class="btn btn-primary">Sim</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @else
                                                    <div class="row">
                                                        <h1>Não há registro</h1>
                                                    </div>
                                                    <div class="alert alert-info">Não há
                                                        <strong>{{ $title }}</strong>.
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-12 py-3">
                                    <h2 class="text-center">Não há registros</h2>
                                </div>
                            </div>
                            <div class="alert alert-info">
                                Não há <strong>{{ $title }}</strong>.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
