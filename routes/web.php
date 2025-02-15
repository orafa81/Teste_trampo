<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VagaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/env-test', function () {
    return response()->json([
        'APP_KEY' => env('APP_KEY'),
        'PUSHER_HOST' => env('PUSHER_HOST'),
        'DATABASE_URL' => env('DATABASE_URL'),
    ]);
});

Route::get('/dashboard', function () {
    if (Gate::allows('isEmpresa')) {
        if (Gate::allows('empresa_create')) {
            return redirect()->route('empresa.index')->with('message', session('message'));
        }
        return redirect()->route('empresa.create');
    } else if (Gate::allows('isCandidato')) {
        if (Gate::allows('candidato_create')) {
            return redirect()->route('candidato.index')->with('message', session('message'));
        }
        return redirect()->route('candidato.create');
    }
})->middleware(['auth', 'tipo_conta'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::prefix('/conta')->group(base_path('routes/conta.php'));
Route::prefix('/candidato')->group(base_path('routes/candidato.php'));
Route::prefix('/empresa')->group(base_path('routes/empresa.php'));
Route::prefix('/vaga')->group(base_path('routes/vaga.php'));