<?php

use App\Http\Controllers\Api\LetterCategoryController;
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

Route::get('top-article', [TestingApi::class, 'getTopArticle']);
Route::get('latest-article', [TestingApi::class, 'getLatestArticle']);

Route::resource('letter-category', LetterCategoryController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
