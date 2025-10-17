<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\ModelColaborador;

class ControllerLogin extends Controller
{
    public function index()
    {
        return view('Login');
    }

    public function processo(LoginRequest $request)
    {
        $login = $request->input('login');

        $colaborador = ModelColaborador::where('email', $login)
                            ->orWhere('cpf', $login)
                            ->first();

        if ($colaborador) {
            Session::put('colaborador_id', $colaborador->id);
            Session::put('colaborador_nome', $colaborador->nome);

            return redirect()->route('home');
        }

        return redirect()->route('Login')->with('error', 'CPF ou Email inválido.');
    }
}
