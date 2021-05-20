<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TranscricaoController extends Controller
{
    public function index(){
        return view('painel.transcricao',[
            'rotaindex' => route('painel.transcricao.index')
        ]);
    }
}
