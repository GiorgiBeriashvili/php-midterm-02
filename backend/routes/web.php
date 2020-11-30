<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\QuizController;
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

Route::get('/', function () { return view('home'); })->name('home');

Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::post('/register', [AuthenticationController::class, 'postRegister'])->name('post_register');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'postLogin'])->name('post_login');

Route::middleware('auth')->group(function () {
    Route::get('/quiz/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/quiz/save', [QuizController::class, 'save'])->name('quiz.save');
    Route::get('/quizz', [QuizController::class, 'read'])->name('quiz.read');
    Route::post('/results', [QuizController::class, 'results'])->name('quiz.results');

    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

