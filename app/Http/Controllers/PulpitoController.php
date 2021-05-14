<?php

namespace App\Http\Controllers;

use App\Models\Formulario;
use Illuminate\Http\Request;

class PulpitoController extends Controller
{
    public function index(){

        $formulario = Formulario::get();

        // dd($formulario);

        return view('painel.pulpito', compact('formulario'));
    }
}
