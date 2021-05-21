@extends('template.template')

@section('title', 'Painel')

@section('content')
    <div class="accordion px-5 pt-3" id="accordionPanelsStayOpenExample">
        @foreach ($forms as $title => $id)
            <div class="row bg-light rounded pt-2 mb-2">
                <h5>
                    {{ $title }}
                </h5>
                <div class="bg-light rounded pt-2">
                    @foreach ($formulario as $content)
                        @if ($content->$id != null)
                        <form action="">
                            <div class="col-12 row bg-light mb-1 pb-3 rounded position-relative">
                                <div class="col-12">
                                    <h5>
                                        # {{ $content->id }}
                                    </h5>
                                </div>
                                <div class="form-floating col-11">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                        rows="10">{{ $content->$id }}</textarea>
                                    <label for="floatingTextarea">{{ $id }}</label>
                                </div>
                                <div class="col-1 position-absolute top-50 end-0 translate-middle-y">
                                    <button class="btn btn-danger rounded" title="Excluir">
                                        <i class="fas fa-minus-circle"></i>
                                    </button>
                                    <button type="submit" class="btn btn-success rounded" title="Salvar">
                                        <i class="fas fa-save"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
