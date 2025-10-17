<?php

namespace App\Http\Controllers;

use App\Models\ModelColaborador;
use App\Models\ModelUnidade;
use App\Models\ModelAuditoria; // ✅ importamos só pra registrar a auditoria
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ pra saber quem está logado

class ControllerColaborador extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Colaborador()
    {
        $banco = ModelUnidade::all();      // busca todas as unidades
        $col = ModelColaborador::all();    // busca todos os colaboradores

        return view('colaborador', compact('col', 'banco')); // passa $banco, não $uni
    }
    
    public function store(Request $request)
    {
        $colaborador = ModelColaborador::create($request->all());

        // ✅ Auditoria: criação
        $this->registrarAuditoria('colaboradores', 'criação', $colaborador->id, null, $colaborador->toArray());

        return redirect()->route('colaborador')->with('success', 'Colaborador criado com sucesso!');
    }

    public function create()
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $col = ModelColaborador::findOrFail($id);
        return view('Colaborador_edit', compact('col'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $col = ModelColaborador::findOrFail($id);
        $dadosAntes = $col->toArray(); // ✅ salva estado anterior

        // Atualiza os campos desejados
        $col->update([
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
        ]);

        // ✅ Auditoria: atualização
        $this->registrarAuditoria('colaboradores', 'atualização', $col->id, $dadosAntes, $col->toArray());

        return redirect()->route('colaborador')->with('success', 'Colaborador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {    
        $col = ModelColaborador::findOrFail($id);
        $dadosAntes = $col->toArray(); // ✅ guarda dados antes da exclusão

        $col->delete();

        // ✅ Auditoria: exclusão
        $this->registrarAuditoria('colaboradores', 'exclusão', $id, $dadosAntes, null);

        return redirect()->route('colaborador')->with('success', 'Colaborador deletado com sucesso');
    }

    /**
     * ✅ Método de auditoria dentro do mesmo arquivo (sem criar nada novo)
     */
    private function registrarAuditoria($tabela, $acao, $registro_id = null, $dados_anteriores = null, $dados_novos = null)
    {
        $user = Auth::user();

        ModelAuditoria::create([
            'user_id' => $user ? $user->id : null,
            'tabela' => $tabela,
            'acao' => $acao,
            'registro_id' => $registro_id,
            'dados_anteriores' => $dados_anteriores ? (array) $dados_anteriores : null,
            'dados_novos' => $dados_novos ? (array) $dados_novos : null,
        ]);
    }
}
