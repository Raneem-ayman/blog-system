<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('news/{news}', [NewsController::class, 'show'])->name('news.show');
Route::post('news/{news}/comment', [NewsController::class, 'comment'])->name('news.comment');

