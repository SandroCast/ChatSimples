<?php

use App\Http\Controllers\MessageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/home', [MessageController::class, 'home']);
Route::get('/session', [MessageController::class, 'session']);

Route::get('/chat', [MessageController::class, 'index']);
Route::get('/chat/{id}', [MessageController::class, 'conversas']);
Route::get('/chat/novo/{id}', [MessageController::class, 'nova_conversa']);
Route::get('/load', [MessageController::class, 'load']);
Route::get('/conversa/{id}', [MessageController::class, 'load_conversas']);
Route::post('/enviar/{id}', [MessageController::class, 'update']);