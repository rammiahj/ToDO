<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);      // list (status=0 by default)
Route::post('/tasks', [TaskController::class, 'store']);      // create
Route::patch('/tasks/{task}', [TaskController::class, 'update']); // optional update
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']); // optional
Route::patch('/tasks/{task}/done', [TaskController::class, 'done']); // mark done
