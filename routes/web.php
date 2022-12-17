<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\KriteriaDilarangController;
use App\Http\Controllers\PendaftaranController;

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

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::get("/", [PendaftaranController::class, "list"])->name("pendaftaran.list");

Route::get("/pendaftaran", [PendaftaranController::class, "index"])->name("pendaftaran");
Route::get("/pendaftaran/list", [PendaftaranController::class, "list"])->name("pendaftaran.list");
Route::post("/pendaftaran/create", [PendaftaranController::class, "create"])->name("pendaftaran.create");
Route::get("/pendaftaran/detail/{id}", [PendaftaranController::class, "detail"])->name("pendaftaran.form-kesehatan")->middleware(['petugas']);
Route::put("/pendaftaran/update/{id}", [PendaftaranController::class, "update"])->name("pendaftaran.update")->middleware(['petugas']);

Route::middleware(['petugas'])->prefix("kriteria-dilarang")->name('kriteria-dilarang.')->controller(KriteriaDilarangController::class)->group(function () {
    Route::get('/list', 'index')->name("list");
    Route::get('/detail/{id}', 'detail')->name("detail");
    Route::get('/store', 'store')->name("store");

    Route::post('/create', 'create')->name("create");
    Route::put('/update/{id}', 'update')->name("update");
    Route::get('/destroy/{id}', 'destroy')->name("destroy");
});


Route::any("login", [PetugasController::class, "login"])->name("login")->middleware(['noAuth']);
Route::any("logout", [PetugasController::class, "logout"])->name("logout")->middleware(['petugas']);
