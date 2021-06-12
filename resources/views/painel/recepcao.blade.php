@extends('template.template')

@section('title', 'Painel')

@section('content')
    <div class="accordion px-5 pt-3" id="accordionPanelsStayOpenExample">
        <div class="container bg-light py-4 rounded">
            <form action="{{ route('painel.recepcao.store') }}" method="POST">
                <div class="row">
                    <div class="col-12">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                    </div>
                    @foreach ($forms as $title => $id)
                        <div class="col-md-6 col-sm-12 my-2">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="{{ $title }}" id="{{ $id[0] }}"
                                    name="{{ $id[0] }}" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">{{ $title }}</label>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-1 col-sm-12 pt-4">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
