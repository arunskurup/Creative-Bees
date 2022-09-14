<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

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

Route::middleware(['auth:sanctum'])->group(function () {
//list Employee data
Route::get('/', [CrudController::class, 'list'])->name('Employee.list');
Route::get('Employee/List', [CrudController::class, 'list'])->name('Employee.list');
Route::post('Employee/Create', [CrudController::class, 'Create'])->name('Employee.Create');
Route::post('Employee/Info/{id}', [CrudController::class, 'info'])->name('Employee.Info');
Route::get('Employee/Update/{id}', [CrudController::class, 'update'])->name('Employee.Update');
Route::post('Employee/Update', [CrudController::class, 'updated'])->name('Employee.Updated');
Route::get('Employee/Delete/{id}', [CrudController::class, 'delete'])->name('Employee.Delete');
Route::get('Employee/View/{id}', [CrudController::class, 'Show'])->name('Employee.View');


});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
