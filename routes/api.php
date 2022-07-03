<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LetterCategoryController;
use App\Http\Controllers\Api\LetterServiceController;
use App\Http\Controllers\Api\LetterTemplateController;
use App\Http\Controllers\Api\NeedForLetterController;
use App\Http\Controllers\Api\TestingApi;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
});

Route::get('top-article', [TestingApi::class, 'getTopArticle']);
Route::get('latest-article', [TestingApi::class, 'getLatestArticle']);

// Route::group(['middleware' => ['auth:sanctum']], function () {
Route::resource('letter-category', LetterCategoryController::class);
Route::resource('letter-template', LetterTemplateController::class);
Route::get('letter-service/document', [LetterServiceController::class, 'createDocument']);
Route::get('letter-service/letter-name/{id}', [LetterServiceController::class, 'showLetterFromCategory']);
Route::resource('letter-service', LetterServiceController::class);

// });

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
