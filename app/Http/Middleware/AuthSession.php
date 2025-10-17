<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AuthSession
{
    public function handle($request, Closure $next)
    {
        // Se não tiver colaborador logado, redireciona para login
        if (!Session::has('colaborador_id')) {
            return redirect()->route('Login')->with('error', 'Você precisa fazer login primeiro.');
        }

        return $next($request);
    }
}
