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

// Routes for managing users
Route::name('me')->get('users/me', 'User\UserController@me');
Route::resource('users', 'User\UserController')->except(['create', 'edit']);
Route::name('verify')->get('users/verify/{token}', 'User\UserController@verify');
Route::name('resend')->get('users/{user}/resend', 'User\UserController@resend');


// Ensure this route uses api group middleware
Route::post('oauth/token', '\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken');


// Chord changes
Route::get('chords/changes', 'Chord\ChordController@getChordChanges');

// User Chord Changes. Same url different method, different table.
Route::post('chords/changes', 'Chord\ChordController@storeUserChordChange');