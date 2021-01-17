<?php

use App\Http\Controllers\Api\DrawController;
use App\Http\Controllers\Api\QuestionsController;
use App\Http\Controllers\Api\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'web'
], function () {
    Route::get('draw', [DrawController::class, 'index']);
    Route::get('questions', [QuestionsController::class, 'getQuestionsWithAnswers']);
    Route::post('questions/check', [QuestionsController::class, 'checkAnswers']);
    Route::get('messages', [MessageController::class, 'index']);
});

