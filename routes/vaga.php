<?php

use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;


Route::resource('/vaga', VagaController::class);

//Route::get('/teste/{id}', [VagaController::class, 'show'])->name('teste');

Route::get('/lista', [VagaController::class, 'listarVagas'])->name('listarVagas');

Route::get('/cadidaturas/{vaga}', [VagaController::class, 'candidaturas'])->name('vaga.candidaturas');