<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css') }}">
    <title>Login</title>
</head>

<body>
    <div class="conteudo">
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
        <div class="auth-container bg-dark">
            <div class="auth-left bg-light">
                <div class="login-container">
                    <div class="login-header">
                        <h2 class="text-center">L O G I N</h2>
                        <hr>
                    </div>
                    <div class="login-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" name="email" value="{{ old('email') }}"
                                    class="form-control bg-dark border-dark text-light" placeholder="Digite seu login"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2">
                                <span class="input-group-text bg-dark text-light border-dark" id="basic-addon2"><i
                                        class="fas fa-user"></i></span>
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="inputpassword" name="password"
                                    class="form-control bg-dark border-dark text-light" placeholder="Digite sua senha"
                                    aria-label="Recipient's password" aria-describedby="button-addon2">
                                <button class="btn btn-dark" type="button" id="button-addon2"><i id="iconeye"
                                        class="far fa-eye"></i></button>
                            </div>
                            <button class="btn btn-outline-secondary w-100">Entrar</button>
                        </form>
                        <div class="mt-3">
                            Ainda não possui cadastro? <a href="{{ route('cadastrar.usuario') }}">Cadastrar</a>
                        </div>
                    </div>
                    <div class="login-footer mt-2">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{ $error }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="auth-right"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/all.min.js') }}"></script>
        <script>
            document.getElementById('button-addon2').addEventListener('click', () => {
                let input = document.getElementById('inputpassword');
                input.type = input.type != 'password' ? 'password' : 'text';
                document.getElementById('iconeye').classList.toggle('fa-eye-slash');
            });

        </script>
