<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CandidaturaController;
use Illuminate\Support\Facades\Route;

Route::resource('candidato', CandidatoController::class)->middleware('auth');

Route::get('/perfil/{id}', [CandidatoController::class, 'perfil'])->name('candidato.perfil')->middleware('auth');

Route::get('/curriculo/{id}', [CandidatoController::class, 'curriculo'])->name('candidato.curriculo')->middleware('auth');

Route::resource('candidatura', CandidaturaController::class)->middleware('auth');