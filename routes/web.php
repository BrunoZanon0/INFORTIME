<?php

use Illuminate\Support\Facades\Route;

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
//Rotas iniciadas fora do scopo

Route::get('/', \App\Http\Livewire\LoginLivewire::class)->name('login');
Route::get('/cadastro', \App\Http\Livewire\CadastroLivewire::class)->name('cadastro');

Route::middleware('auth')->group(function () {
    Route::get('/home', \App\Http\Livewire\HomeAlbumLivewire::class)->name('home');

    Route::prefix('adicionar')->group(function () {

        Route::get('/album', \App\Http\Livewire\AdicionarAlbumLivewire::class)->name('album_add');
        Route::get('/faixa', \App\Http\Livewire\AdicionarFaixaLivewire::class)->name('faixa_add');

    });

    Route::prefix('desc')->group(function () {

        Route::get('/album/{id}', \App\Http\Livewire\AlbumViewLivewire::class)->name('album_desc');

    });
});
