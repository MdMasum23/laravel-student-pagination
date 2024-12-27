<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/students', [StudentController::class, 'index']);
Route::get('/', [StudentController::class, 'index']); // Optional: Use the same search on the homepage



