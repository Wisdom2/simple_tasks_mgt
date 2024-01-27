<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return view('tasks');
});
Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::get('/tasks/{id}', [TaskController::class, 'show'])->name('task.show');
Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
Route::post('/task/reorganize', [TaskController::class, 'reorganize'])->name('task.reorganize');
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);