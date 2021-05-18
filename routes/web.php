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
    Route::get('/', [PulpitoController::class, 'index'])->name('painel');
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
});

/*
|--------------------------------------------------------------------------
| ROTAS DA CADASTRAR
|--------------------------------------------------------------------------
*/
Route::get('/cadastrar', function () {
    return view('cadastrar');
})->name('painel.transcricao.index');

require __DIR__ . '/auth.php';
