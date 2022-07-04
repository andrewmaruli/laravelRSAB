<?php

use App\Models\Post;
use App\Http\Controllers\PostsApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts', function() {
    return Post::all();
});

Route::get('/posts', function() {
    request()->validate([
        'title'=>'required',
        'content'=>'required',
    ]);
    return Post::create([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);
});

Route::put('/posts/{post}', function(Post $post){
    request()->validate([
        'title'=>'required',
        'content'=>'required',
    ]);

    $post->update([
        'title'=>request('title'),
        'content'=>request('content'),
    ]);
});

Route::delete('posts/{post}', function(Post $post){
    $success = $post->delete();

    return [ 
        'success deleted' =>$success
    ];
});

Route::get('/posts', [PostsApiController::class, 'index']);
Route::post('/posts', [PostsApiController::class, 'store']);
Route::put('/posts/{post}', [PostsApiController::class, 'update']);
Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);

Route::get('/pasien', function() {
    return Pasien::all();
});

Route::get('/pasien', function() {
    request()->validate([
        'NOPASIEN'=>'required',
        'NAMAPASIEN'=>'required',
        'TMPLAHIR'=>'required',
        'TGLLAHIR'=>'required',
        'ALAMAT'=>'required',
    ]);
    return Post::create([
        'NOPASIEN'=>request('NOPASIEN'),
        'NAMAPASIEN'=>request('NAMAPASIEN'),
        'TMPLAHIR'=>request('TMPLAHIR'),
        'TGLLAHIR'=>request('TGLLAHIR'),
        'ALAMAT'=>request('ALAMAT'),
    ]);
});

Route::get('/masterpasien', 'App\Http\Controllers\PasienController@index');
Route::post('/masterpasien', 'App\Http\Controllers\PasienController@store')->name('pasien.storepasien');
