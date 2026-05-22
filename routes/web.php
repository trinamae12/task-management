<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/test-auth', function () {
//     return "I am ". Auth::guard('web')->user()->name;
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/add', function () {
        return view('add-todo');
    })->name('add-to-do');

    Route::post('/add', [TaskController::class,'store'])->name('store-task');
    Route::get('/task/{id}', [TaskController::class, 'show'])->name('show-task');
    Route::get('/task/edit/{id}', [TaskController::class, 'showForEdit'])->name('show-edit-task');
    Route::post('/task/edit/{id}', [TaskController::class,'edit'])->name('edit-task');
    Route::delete('/task/delete/{id}', [TaskController::class,'destroy'])->name('delete-task');
});

Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

require __DIR__.'/auth.php';
