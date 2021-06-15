<?php

namespace App\Http\Controllers;


use App\Http\Requests\novoUsuario;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

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

        $data = $request->all();

        if ($request->foto->isValid()) {

            $nomeFoto = Str::of($request->name)->slug('-') . '.' . $request->foto->getClientOriginalExtension();

            $foto = $request->foto->storeAs('fotos', $nomeFoto);
            $data['foto'] = $foto;
        }


        User::create($data);

        return redirect()->route('login');
    }
}
