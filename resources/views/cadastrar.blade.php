<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Cadastrar</title>
</head>

<body>
    <div class="conteudo">
        <div class="auth-container bg-dark">
            <div class="auth-left bg-light">
                <div class="login-container">
                    <div class="login-header">
                        <h2 class="text-center">R E G I S T R A R</h2>
                        <hr>
                    </div>
                    <div class="login-body">
                        <form method="POST" action="{{ route('novo.usuario') }}" enctype="multipart/form-data">
                            @csrf
                            <label for="foto" class="btn btn-dark">Selecionar foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" hidden>
                            <div class="input-group mb-3">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control bg-dark border-dark text-light" placeholder="Digite seu Nome"
                                    aria-label="Recipient's username" aria-describedby="basic-addon2"
                                    title="Seu nome Completo">
                            </div>
                            <div class="input-group mb-3">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control bg-dark border-dark text-light" placeholder="Digite seu E-mail"
                                    aria-label="email" aria-describedby="basic-addon2"
                                    title="Este E-mail será utilizado para acessar sua conta">
                            </div>
                            <div class="input-group mb-3">
                                <input type="password" id="inputpassword" name="password"
                                    class="form-control bg-dark border-dark text-light" placeholder="Digite sua senha"
                                    aria-label="Recipient's password" aria-describedby="button-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="button" id="button-addon2">
                                            <i id="iconeye" class="far fa-eye"></i>
                                        </button>
                                    </div>
                            </div>
                            <div class="input-group mb-3">
                                <select name="nivel" id="nivel" class="form-control bg-dark border-dark text-light"
                                    aria-label="Default select example">
                                    <option value="recepcao" selected>Recepção</option>
                                    <option value="transcricao">Transcrição</option>
                                    <option value="pulpito">Pulpito</option>
                                </select>
                            </div>
                            <button class="btn btn-outline-secondary w-100">Cadastrar</button>
                        </form>
                        <div class="mt-3">
                            Já é cadastrado? <a href="{{ route('login') }}">Entrar</a>
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

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        document.getElementById('button-addon2').addEventListener('click', () => {
            let input = document.getElementById('inputpassword');
            input.type = input.type != 'password' ? 'password' : 'text';
            document.getElementById('iconeye').classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>