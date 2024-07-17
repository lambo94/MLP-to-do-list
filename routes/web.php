<?php

use App\Http\Controllers\TaskController;
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
    $tasks = new \App\Http\Controllers\TaskController;

    return view('tasks', ['tasks' => $tasks->viewAll()]);
});

Route::post('/create_task', [TaskController::class, 'create']);

Route::post('/delete_task', [TaskController::class, 'delete']);

Route::post('/update_task', [TaskController::class, 'update']);
