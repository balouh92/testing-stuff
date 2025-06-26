<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $posts = Post::all();

    return view('welcome', compact('posts'));
});
Route::resource('/post', PostController::class)
    ->only('store', 'destroy')
    ->names('post');
Route::resource('/comment', CommentController::class)
    ->only('store', 'destroy')
    ->names('comment');
