<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Comment
Route::post('comments', [CommentController::class, 'store']);
Route::get('comments/{comment}/edit', [CommentController::class, 'edit']);
Route::put('comments/{comment}', [CommentController::class, 'update']);
Route::delete('comments/{comment}', [CommentController::class, 'destroy']);
//Article

Route::resource('article', ArticleController::class)->middleware('auth:sanctum');

//Auth

Route::get('signin', [AuthController::class, 'signin']);
Route::post('registr', [AuthController::class, 'registr']);
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('signup', [AuthController::class, 'signup']);
Route::get('logout', [AuthController::class, 'logout']);

// Route::get('/', function () {
//     return view('layout');
// });

Route::get('/full-img/{img}', [MainController::class, 'show']);

Route::get('/', [MainController::class, 'index']);

Route::get('/contacts', function(){
    $contacts = [
       'Univer' => 'Polytech', 
       'phone' => '89231',
       'email' => 'alex@mail.ru'
    ];
    return view('main.contact', ['contacts'=>$contacts]);
});
