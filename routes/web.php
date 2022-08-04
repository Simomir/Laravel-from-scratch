<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ArticlesController;
use App\Models\Article;

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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test', ['name'=> request('name')]);
});

//Route::get('/posts/{post}', function($post) {
//    $posts = [
//        'first-post' => 'Hello, this is my first blog posts',
//        'second-post' => 'Second post'
//    ];
//
//    if (!array_key_exists($post, $posts)) {
//        abort(404, 'Sorry that post was not found');
//    }
//
//    return view('post', ['post' => $posts[$post]]);
//});

Route::get('/posts/{slug}', [PostsController::class, 'show']);

// Routes fo premade template
Route::get('/', function () {return view('welcome'); })->name('layout');
Route::get('/index', function () { return view('elements/index'); })->name('index');
Route::get('/left-sidebar', function () {return view('elements/left-sidebar'); })->name('left_sidebar');
Route::get('/no-sidebar', function () { return view('elements/no-sidebar'); })->name('no_sidebar');
Route::get('/right-sidebar', function () { return view('elements/right-sidebar'); })->name('right_sidebar');

// Article routes
Route::get('/about', function () {
//    return Article::all();
//    return Article::take(2)->get();
//    return Article::paginate(2);
    return view('about', ['articles'=>Article::take(3)->latest('created_at')->get()]);
});
Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/articles/{article}', [ArticlesController::class, 'show']);
