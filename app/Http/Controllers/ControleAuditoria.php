<?php

namespace App\Http\Controllers;

use App\Models\ModelAuditoria;
use Maatwebsite\Excel\Facades\Excel;

class ControleAuditoria extends Controller
{
    // Método que lista auditorias na view
    public function aud()
    {
        $auditorias = ModelAuditoria::with('user')->latest()->paginate(10);
        return view('auditoria', compact('auditorias'));
    }

    // Exportar auditorias direto para Excel sem criar nenhuma classe
    public function exportarExcel()
{
    $auditorias = ModelAuditoria::all()->map(function($item) {
        return [
            'ID' => $item->id,
            'Usuário' => $item->user ? $item->user->nome : $item->email ?? 'Desconhecido',
            'Tabela' => $item->tabela,
            'Ação' => $item->acao,
            
          
           
        
        ];
    })->toArray();

    $filename = 'auditorias.csv';

    return response()->streamDownload(function() use ($auditorias) {
        $handle = fopen('php://output', 'w');
        
        // Adiciona BOM UTF-8 para o Excel reconhecer caracteres especiais
        fwrite($handle, "\xEF\xBB\xBF");

        if(count($auditorias) > 0){
            fputcsv($handle, array_keys($auditorias[0]), ';'); // separador ponto e vírgula
            foreach ($auditorias as $row) {
                $row = array_map(function($value) {
                    // remove quebras de linha dentro das células
                    return str_replace(["\r", "\n"], ' ', $value);
                }, $row);

                fputcsv($handle, $row, ';');
            }
        }

        fclose($handle);
    }, $filename);
}
}
