<?php

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

Route::post('/register', 'App\Http\Controllers\Api\AuthController@register');
Route::post('/login', 'App\Http\Controllers\Api\AuthController@login');

Route::get('/login/facebook', 'App\Http\Controllers\SocialiteController@redirectToProvider');
Route::get('/login/facebook/callback', 'App\Http\Controllers\SocialiteController@handleProviderCallback');

Route::apiResource('personagens', 'App\Http\Controllers\PersonagemController')->middleware('auth:api');;
Route::apiResource('aldeias', 'App\Http\Controllers\AldeiaController')->middleware('auth:api');;
