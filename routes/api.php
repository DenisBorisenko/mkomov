<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::prefix('articles')->group(function () {
    Route::get('latest', [ArticleController::class, 'latest']);
    Route::get('/', [ArticleController::class, 'index']);
    Route::get('/{article}', [ArticleController::class, 'show']);
    Route::post('/{article}/comment', [ArticleController::class, 'storeComment']);
    Route::post('/{article}/like', [ArticleController::class, 'storeLike']);
    Route::post('/{article}/view', [ArticleController::class, 'storeView']);
});

