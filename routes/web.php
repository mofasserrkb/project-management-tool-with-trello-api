<?php

use App\Http\Controllers\AuthorizeController;
use Illuminate\Support\Facades\Route;

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

Route::post('/getuser',[AuthorizeController::class,'getUser'])->name('getuser');
Route::get('/getorg',[AuthorizeController::class,'getOrg']);
Route::get('/getorgboard',[AuthorizeController::class,'getOrgBoard'])->name('getorgboard');
Route::post('/createboard',[AuthorizeController::class,'createBoard'])->name('createboard');
Route::get('/createboard',[AuthorizeController::class,'getcreateBoard'])->name('getcreateboard');
Route::post('/delete',[AuthorizeController::class,'delete'])->name('delete');
Route::post('/getupdateboard',[AuthorizeController::class,'getUpdateBoard'])->name('getupdateboard');
Route::post('/updateboard',[AuthorizeController::class,'updateboard'])->name('updateboard');
Route::post('/getlist',[AuthorizeController::class,'getlist'])->name('getlist');
Route::post('/getlistcard',[AuthorizeController::class,'getlistcard'])->name('getlistcard');
Route::post('/viewlistcard',[AuthorizeController::class,'viewlistcard'])->name('viewlistcard');
Route::post('/createlist',[AuthorizeController::class,'createlist'])->name('createlist');
Route::post('/createlists',[AuthorizeController::class,'createlists'])->name('createlists');
Route::post('/cardinfo',[AuthorizeController::class,'cardinfo'])->name('cardinfo');
Route::post('/createlistcard',[AuthorizeController::class,'createlistcard'])->name('createlistcard');
Route::post('/createlistcards',[AuthorizeController::class,'createlistcards'])->name('createlistcards');
