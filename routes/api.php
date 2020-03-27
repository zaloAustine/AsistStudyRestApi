<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AunthenticationController;
use App\Http\Controllers\UnitsController;
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

Route::post('/register','AunthenticationController@register');
Route::post('/login','AunthenticationController@login');
Route::get('/schools','AunthenticationController@getSchools');
Route::get('/course','AunthenticationController@getCourse');

Route::get('/units/{courseId}','UnitsController@getUnits');
Route::get('/notes/{UnitId}','UnitsController@getNotes');
Route::get('/notesData/{NoteId}','UnitsController@getNoteData');
Route::get('/notesUrl/{NoteId}','UnitsController@getNoteUrl');


Route::group(['middleware' => 'auth:api'], function(){


});

