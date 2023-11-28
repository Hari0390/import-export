<?php

use App\Http\Controllers\ExportImportController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/export_import',[ExportImportController::class, 'create']);
Route::get('/export_import/export',[ExportImportController::class, 'export'])->name('export');
Route::post('/export_import/import',[ExportImportController::class, 'import'])->name('import');
