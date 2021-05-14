<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return $this->redirection(Auth::user()->nivel);
        }
        return view('login');
    }

    public function login(Request $request){

        $validated = $request->validate([
            'email' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $this->redirection(Auth::user()->nivel);
        }

        return back()->withInput()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function redirection($nivel){
        switch($nivel){
            case 'recepcao':
                    return redirect()->route('painel.recepcao.index');
                break;
            case 'transcricao':
                return redirect()->route('painel.transcricao.index');
                break;
            case 'pulpito':
                return redirect()->route('painel.pulpito.index');
                break;
            default:
                return redirect()->route('logout');
        }
    }
}
