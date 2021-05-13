<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PulpitoController extends Controller
{
    public function index(){
        return view('painel.pulpito');
    }
}
