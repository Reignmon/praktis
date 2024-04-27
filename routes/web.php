<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('employees',[App\Http\Controllers\EmployeeController::class, 'index']);
Route::post('employees',[App\Http\Controllers\EmployeeController::class, 'store']);
Route::get('employees/show',[App\Http\Controllers\EmployeeController::class, 'show']);
Route::get('employees/{id}/edit',[App\Http\Controllers\EmployeeController::class, 'edit']);
Route::put('employees/{id}/edit',[App\Http\Controllers\EmployeeController::class, 'update']);
Route::get('employees/{id}/delete',[App\Http\Controllers\EmployeeController::class, 'destroy']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::Routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
