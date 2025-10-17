<?php
use App\Http\Controllers\ControllerLogin;
use App\Http\Controllers\Controles_Paginas;
use App\Http\Controllers\ControllerBandeira;
use App\Http\Controllers\ControllerColaborador;
use App\Http\Controllers\ControllerGrupo;
use App\Http\Controllers\UnidadeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControleRelatorioColaborador;
use App\Http\Controllers\ControleAuditoria;

// Rota pública (login)
Route::get('/', [ControllerLogin::class, 'index'])->name('Login');
Route::post('/login', [ControllerLogin::class, 'processo'])->name('login.processo');

// Rotas protegidas
Route::middleware(['auth.session'])->group(function () {

    Route::get('/home',[Controles_Paginas::class,'menu'])->name('home');

    Route::get('/auditoria', [ControleAuditoria::class, 'aud'])->name('auditoria');
    Route::get('/auditoria/exportar', [ControleAuditoria::class, 'exportarExcel'])->name('auditoria.exportar');

    Route::get('/Grupos/create',[ControllerGrupo::class, 'create'])->name('Grupos.create');
    Route::post('/Grupos', [ControllerGrupo::class, 'store'])->name('Grupos.store');
    Route::get('/Grupos', [ControllerGrupo::class, 'Grupos'])->name('Grupos'); 
    Route::delete('/grupos/{id}', [ControllerGrupo::class, 'destroy'])->name('grupos.destroy');
    Route::get('/grupos/{nome}', [ControllerGrupo::class,'edit'])->name('grupos.edit');
    Route::put('/grupos/{id}', [ControllerGrupo::class, 'update'])->name('grupos.update');

Route::get('/bandeira', [ControllerBandeira::class,'bandeira'])->name('bandeira');
Route::get('/bandeira/create', [ControllerBandeira::class, 'create'])->name('bandeiras.create');
Route::post('/bandeira', [ControllerBandeira::class, 'store'])->name('bandeira.store');
Route::get('/bandeira/{id}/edit', [ControllerBandeira::class, 'edit'])->name('bandeiras.edit');
Route::put('/bandeira/{id}', [ControllerBandeira::class, 'update'])->name('bandeiras.update');
Route::delete('/bandeira/{id}', [ControllerBandeira::class, 'destroy'])->name('Bandeira.destroy');

// Excluir Bandeira
Route::delete('/bandeira/{id}', [ControllerBandeira::class, 'destroy'])->name('Bandeira.destroy');
    Route::get('/Unidade', [UnidadeController::class, 'Unidade'])->name('Unidade');
    Route::get('/Unidade/create', [UnidadeController::class, 'create'])->name('Unidade.create');
    Route::post('/unidades', [UnidadeController::class, 'store'])->name('unidade.store');
    Route::get('/unidades/{id}', [UnidadeController::class, 'edit'])->name('unidades_edit');
    Route::put('/unidades/{id}', [UnidadeController::class, 'update'])->name('unidade.update');
    Route::delete('/unidades/{id}', [UnidadeController::class, 'destroy'])->name('Unidade.destroy');
    Route::get('/Unidade/{id}', [UnidadeController::class, 'show'])->name('Unidade.show');

    Route::get('/colaborador', [ControllerColaborador::class,'Colaborador'])->name('colaborador');
    Route::get('/colaborador/create', [ControllerColaborador::class,'create'])->name('colaborador.create');
    Route::post('/colaborador', [ControllerColaborador::class,'store'])->name('colaborador.store');
    Route::get('/colaborador/{id}/edit', [ControllerColaborador::class,'edit'])->name('colaborador_edit');
    Route::put('/colaborador/{id}', [ControllerColaborador::class,'update'])->name('Colaborador.update');
    Route::delete('/colaborador/{id}', [ControllerColaborador::class,'destroy'])->name('Colaborador.destroy');
    Route::get('/colaborador/{id}', [ControllerColaborador::class,'show'])->name('colaborador.show');

    Route::get('/RelatorioColaborador', [ControleRelatorioColaborador::class,'ColaboradorRelatorio'])->name('RelatorioColaborador');
});


