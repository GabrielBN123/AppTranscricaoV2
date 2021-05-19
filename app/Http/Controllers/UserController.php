<?php

namespace App\Http\Controllers;

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

    public function novoUsuario(Request $request)
    {
        // $user = User::create([$request->all()]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'nivel' => $request->nivel
        ]);

        return redirect()->route('login');
    }
}
