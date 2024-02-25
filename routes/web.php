<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contact.store');
    Route::get('/contacts/edit/{contact}', [ContactController::class, 'show'])->name('contact.show');
    Route::put('/contacts/edit/{contact}', [ContactController::class, 'update'])->name('contact.update');

    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('task.create');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/edit/{task}', [TaskController::class, 'show'])->name('task.show');
    Route::put('/tasks/edit/{task}', [TaskController::class, 'update'])->name('task.update');


});
