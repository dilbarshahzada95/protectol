<?php

use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('optimize');
    return "Cleared!";
});
Route::get('/', function () {
    return view('quiz.registration');
});


Route::get('/quiz/registration', [App\Http\Controllers\Quiz\RegistrationController::class, 'index']);
Route::post('/quiz/registration', [App\Http\Controllers\Quiz\RegistrationController::class, 'save']);
Route::middleware(['enrolled'])->prefix('questionnaire')->group(function () {
    Route::get('/{uuid}/start', [App\Http\Controllers\Quiz\QuizController::class, 'index']);
});
Route::prefix('questionnaire')->group(function () {
    Route::post('/update', [App\Http\Controllers\Quiz\QuizController::class, 'updateQuiz']);
    Route::post('/save-later', [App\Http\Controllers\Quiz\QuizController::class, 'saveItLater']);
});
Route::fallback(function () {
    echo '404';
});
