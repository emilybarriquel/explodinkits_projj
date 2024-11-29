<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PersonagemController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\HabilidadeController;
use App\Http\Controllers\MissaoController;

Route::resource('users', UserController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/personagem', [PersonagemController::class, 'edit'])->name('personagem.edit');
    Route::get('/habilidade', [HabilidadeController::class, 'edit'])->name('habilidade.edit');
    Route::get('/classe', [ClasseController::class, 'edit'])->name('classe.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/personagem', [PersonagemController::class, 'update'])->name('personagem.update');
    Route::patch('/habilidade', [HabilidadeController::class, 'update'])->name('habilidade.update');
    Route::patch('/classe', [ClasseController::class, 'update'])->name('classe.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas das migr
Route::middleware('auth')->group(function () {
    Route::resource('personagens', PersonagemController::class);
    Route::resource('classes', ClasseController::class);
    Route::resource('habilidades', HabilidadeController::class);
    Route::resource('missoes', MissaoController::class);
});

require __DIR__.'/auth.php';
