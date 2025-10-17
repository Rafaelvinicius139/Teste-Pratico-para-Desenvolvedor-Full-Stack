<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUnidade;
use App\Models\ModelColaborador;

class ControleRelatorioColaborador extends Controller
{
    public function ColaboradorRelatorio(Request $request)
    {
       
        $trabalho = ModelUnidade::all();

        $unidadeId = $request->input('unidade_id');

       
        if ($unidadeId) {
            $trabalhador = ModelColaborador::where('unidade_id', $unidadeId)->get();
        } else {
            //
            $trabalhador = ModelColaborador::all();
        }

        return view('Relatorio_Colaboradores', compact('trabalho', 'trabalhador'));
    }
}