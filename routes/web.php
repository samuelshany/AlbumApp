<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\is_user;
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

Route::get('/loginForm',[UserController::class,'loginForm']);
Route::get('/signupForm',[UserController::class,'signupForm']);

Route::post('/loginHandel',[UserController::class,'loginHandel']);
Route::post('/signupHandel',[UserController::class,'signupHandel']);
Route::get('/logout',[UserController::class,'logout']);

Route::middleware([is_user::class])->group(function () {
Route::get('/addAlbum',[AlbumController::class,'addAlbumForm']);
Route::post('/addAlbumHandel',[AlbumController::class,'addAlbumHandel']);
Route::post('/openAlbum/{id}',[AlbumController::class,'openAlbum']);
Route::post('/deleteAlbumWithPic/{id}',[AlbumController::class,'deleteAlbumWithPic']);
Route::post('/addimage/{id}',[ImageController::class,'addImage']);
Route::post('/update/{id}',[AlbumController::class,'updateForm']);
Route::post('/updateHandel/{id}',[AlbumController::class,'updateHandel']);
Route::post('/deleteImage/{id}',[ImageController::class,'deleteImage']);
Route::post('/addImageHandel/{id}',[ImageController::class,'addImageHandel']);
Route::get('/allAlbums',[AlbumController::class,'allAlbums']);
Route::post('/moveAllPic/{id}',[AlbumController::class,'moveAll']);
Route::post('/addimage',[ImageController::class,'addimage']);

});
//Route::get('/signupForm',[UserController::class,'signupForm']);