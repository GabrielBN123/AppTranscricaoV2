<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    PulpitoController,
    RecepcaoController,
    TranscricaoController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| ROTAS DO PULPITO
|--------------------------------------------------------------------------
*/

Route::group([
    'middleware' => ['auth', 'role:pulpito'],
    'prefix' => 'painel-pulpito'
], function () {
    Route::get('/', [PulpitoController::class, 'index'])->name('painel.pulpito.index');
    //Route::get('/', [PulpitoController::class, 'index'])->name('painel');
    Route::get('/config', [PulpitoController::class, 'index'])->name('painel.pulpito.config');
});

/*
|--------------------------------------------------------------------------
| ROTAS DA RECEPCAO
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => ['auth', 'role:recepcao'],
    'prefix' => 'painel-recepcao'
], function () {
    Route::get('/', [RecepcaoController::class, 'index'])->name('painel.recepcao.index');
});

/*
|--------------------------------------------------------------------------
| ROTAS DA TRANSCRICAO
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => ['auth', 'role:transcricao'],
    'prefix' => 'painel-transcricao'
], function () {
    Route::get('/', [TranscricaoController::class, 'index'])->name('painel.transcricao.index');
    Route::get('/transcricao/{table}/{id}', [TranscricaoController::class, 'detalhes'])->name('painel.transcricao.show');
    Route::put('/transcricao/{table}/{id}', [TranscricaoController::class, 'update'])->name('painel.transcricao.update');
    Route::delete('/transcricao/{table}/{id}', [TranscricaoController::class, 'delete'])->name('painel.transcricao.delete');
});

// Route::get('/transcricao/{table}/{id}', [TranscricaoController::class, 'detalhes'])->name('painel.transcricao.show');

/*
|--------------------------------------------------------------------------
| ROTAS DA CADASTRAR
|--------------------------------------------------------------------------
*/
Route::post('/cadastrar', [UserController::class, 'novoUsuario'])->name('novo.usuario');
Route::get('/cadastrar', [UserController::class, 'create'])->name('cadastrar.usuario');

require __DIR__ . '/auth.php';
