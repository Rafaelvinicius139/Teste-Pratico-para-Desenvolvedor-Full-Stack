<?php

namespace App\Http\Controllers;
use App\Models\ModelGrupo;
use Illuminate\Http\Request;
use App\Models\Modelbandeira;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Return_;

class ControllerGrupo extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Grupos()
    {
        $grupos = ModelGrupo::all();
        
       return view('Grupos', compact('grupos'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

     ModelGrupo::create($request->all());
     return redirect()->route('Grupos')->with('success', 'Grupo cadastrado com sucesso!');

       
    }

       

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $grupo = ModelGrupo::findOrFail($id);
          return view('Grupos_edit', compact('grupo'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $grupo = ModelGrupo::findOrFail($id);
        $grupo->update([
        'nome' => $request->nome,
    ]);

     return redirect()->route('Grupos')->with('success', 'Grupo atualizado com sucesso!');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {


     $grupo = ModelGrupo::findOrFail($id);
     $grupo->delete();
      return redirect()->route('Grupos')->with('success', 'Grupo cadastrado com sucesso!');
        //
    }
}
