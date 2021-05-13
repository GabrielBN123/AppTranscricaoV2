<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('pasta1.arquivo', [
            'dados' => User::where('id', 1)->with('pessoa', 'pessoa.instituicao')->get()
        ]);
    }
}
