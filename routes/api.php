<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LikeController;

Route::middleware('auth:users')->get('/user', function (Request $request) {
    return $request->user();
});

// like routing
Route::prefix('likes')->middleware(['api', 'auth:users'])->group(function () {
    Route::post('/add', [LikeController::class, 'add'])->name('likes.add');
    Route::post('/delete', [LikeController::class, 'delete'])->name('likes.delete');
});
