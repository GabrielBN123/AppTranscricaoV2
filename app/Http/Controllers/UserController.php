<?php

namespace App\Http\Controllers;


use App\Http\Requests\novoUsuario;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('pasta1.arquivo', [
            'dados' => User::where('id', 1)->with('pessoa', 'pessoa.instituicao')->get()
        ]);
    }

    public function create()
    {
        return view('cadastrar');
    }

    public function novoUsuario(novoUsuario $request)
    {
        User::create($request->all());

        return redirect()->route('login');
    }
}
