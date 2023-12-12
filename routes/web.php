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

Route::get('/', function () {
    return view('welcome');
});


// routes/web.php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\ApiTesteController;

Route::prefix('testes')->group(function () {
    Route::get('/', [ApiTesteController::class, 'index']);
    Route::post('/', [ApiTesteController::class, 'store']);
    Route::get('/{id}', [ApiTesteController::class, 'show']);
    Route::put('/{id}', [ApiTesteController::class, 'update']);
    Route::delete('/{id}', [ApiTesteController::class, 'destroy']);
});




Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
Route::get('/teste/create', [TesteController::class, 'create'])->name('teste.create');
Route::post('/teste/store', [TesteController::class, 'store'])->name('teste.store');
Route::get('/teste/edit/{id}', [TesteController::class, 'edit'])->name('teste.edit');
Route::put('/teste/update/{id}', [TesteController::class, 'update'])->name('teste.update');
Route::delete('/teste/delete/{id}', [TesteController::class, 'destroy'])->name('teste.destroy');





Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/{id}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes/{id}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy'])->name('clientes.destroy');


Route::get('/clientes-json', [ClienteController::class, 'getClientes']);