<?php

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
    return view('quiz.registration');
});


Route::get('/quiz/registration', [App\Http\Controllers\Quiz\RegistrationController::class, 'index']);
Route::get('/quiz/form', [App\Http\Controllers\Quiz\QuizController::class, 'index']);
