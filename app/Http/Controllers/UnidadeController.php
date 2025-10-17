<?php

namespace App\Http\Controllers;

use App\Models\ModelUnidade;
use App\Models\ModelBandeira;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function Unidade()
    {
        $ban = ModelBandeira::all();
        $unidade = ModelUnidade::all();
        return view('Unidade', compact('unidade', 'ban'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ModelUnidade::create($request->all());
        return redirect()->route('Unidade')->with('success', 'Grupo cadastrado com sucesso!');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $unidade = ModelUnidade::findOrFail($id);
        return view('unidades_edit', compact('unidade'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:20',
            
        ]);

        $unidade = ModelUnidade::findOrFail($id);

        $unidade->update([
            'nome_fantasia' => $request->nome_fantasia,
            'razao_social' => $request->razao_social,
            'cnpj' => $request->cnpj,
            
        ]);

        return redirect()->route('Unidade')->with('success', 'Unidade atualizada com sucesso!');
    }

    public function destroy(string $id)
    {
        $unidade = ModelUnidade::findOrFail($id);
        $unidade->delete();

        return redirect()->route('Unidade')->with('success', 'Unidade excluída com sucesso!');
    }
}
