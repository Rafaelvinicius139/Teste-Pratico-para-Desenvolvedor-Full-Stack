<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelbandeira;
use App\Models\ModelGrupo;

class ControllerBandeira extends Controller
{
    public function bandeira()
    {
        $band = Modelbandeira::all();
        $Nomes =  ModelGrupo::all();
        return view('Bandeira', compact('band', 'Nomes'));
    }

    public function create()
    {
        // aqui você pode retornar uma view de criação se quiser
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Modelbandeira::create($request->all());

        return redirect()->route('bandeira')->with('success', 'Bandeira cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $band = Modelbandeira::findOrFail($id);
        return view('Bandeira_Edit', compact('band'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $band = Modelbandeira::findOrFail($id);
        $band->update([
            'nome' => $request->nome,
        ]);

        // redireciona após atualizar
        return redirect()->route('bandeira')->with('success', 'Bandeira atualizada com sucesso!');
    }

 public function destroy($id)
{
    $band = Modelbandeira::findOrFail($id);

    // Verifica se há unidades vinculadas (sem precisar do relacionamento no model)
    $unidadesVinculadas = \App\Models\ModelUnidade::where('bandeira_id', $band->id)->count();

    if ($unidadesVinculadas > 0) {
        // Mensagem apenas informativa, não bloqueia a exclusão
        session()->flash('warning', "⚠️ Esta bandeira está sendo referenciada por $unidadesVinculadas unidade(s), mas será excluída mesmo assim.");
    }

    // Apaga a bandeira normalmente
    $band->delete();

    return redirect()->route('bandeira')->with('success', 'Bandeira apagada com sucesso!');
}
}