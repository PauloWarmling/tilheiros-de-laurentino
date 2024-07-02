<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ParticipacaoController;


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

Route::get('/', function () {
    return view('index');
})->name('index');


// Rotas para CRUD de Pessoa
Route::get('/pessoa', PessoaController::class . '@index')->name('pessoa.index');
Route::get('/pessoa/create', PessoaController::class . '@create')->name('pessoa.create');
Route::post('/pessoa', PessoaController::class .'@store')->name('pessoa.store');
Route::get('/pessoa/{pessoa}', [PessoaController::class, 'show'])->name('pessoa.show');
Route::get('/pessoa/{pessoa}/edit', PessoaController::class .'@edit')->name('pessoa.edit');
Route::put('/pessoa/{pessoa}', PessoaController::class .'@update')->name('pessoa.update');
Route::delete('/pessoa/{pessoa}', PessoaController::class .'@destroy')->name('pessoa.destroy');

// Rotas para CRUD de Eventos
Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{id}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
Route::put('/eventos/{id}', [EventoController::class, 'update'])->name('eventos.update');
Route::delete('/eventos/{id}', [EventoController::class, 'destroy'])->name('eventos.destroy');

// Rotas para CRUD de Participacoes
Route::get('/participacoes', [ParticipacaoController::class, 'index'])->name('participacoes.index');
Route::get('/participacoes/create', [ParticipacaoController::class, 'create'])->name('participacoes.create');
Route::post('/participacoes', [ParticipacaoController::class, 'store'])->name('participacoes.store');
Route::get('/participacoes/{participacao}', [ParticipacaoController::class, 'show'])->name('participacoes.show');
Route::get('/participacoes/{participacao}/edit', [ParticipacaoController::class, 'edit'])->name('participacoes.edit');
Route::put('/participacoes/{participacao}', [ParticipacaoController::class, 'update'])->name('participacoes.update');
Route::delete('/participacoes/{participacao}', [ParticipacaoController::class, 'destroy'])->name('participacoes.destroy');

