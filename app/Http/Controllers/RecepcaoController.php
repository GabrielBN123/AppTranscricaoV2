<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecepcaoController extends Controller
{
    public function index(){
        return view('painel.index',[
            'rotaindex' => route('painel.recepcao.index')
        ]);
    }
}
