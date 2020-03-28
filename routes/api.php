<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AunthenticationController;
use App\Http\Controllers\UnitsController;
use App\Http\Controllers\BlogController;
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













Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/units/{courseId}','UnitsController@getUnits');
    Route::get('/notes/{UnitId}','UnitsController@getNotes');
    Route::get('/notesData/{NoteId}','UnitsController@getNoteData');
    Route::get('/notesUrl/{NoteId}','UnitsController@getNoteUrl');
    Route::post('/addUnit','UnitsController@postUnit');
    Route::post('/addNotes','UnitsController@postNotes');
    Route::post('/addNotesData','UnitsController@postNotesData');
    Route::post('/addNotesUrls','UnitsController@postNotesUrl');
    Route::get('/myid','UnitsController@getUserID');
    Route::get('/recentUnits/{courseId}','UnitsController@getNewUnits');
    Route::delete('delete/{id}/','UnitsController@unitDelete');


    Route::get('/allpost','BlogController@getAllPosts');
    Route::get('/userposts/{user_id}','BlogController@getUserPosts');
    Route::post('/post','BlogController@post');
    Route::delete('/deletepost/{id}','BlogController@deletepost');

    Route::get('/allcomments/{post_id}','BlogController@getAllComments');
    Route::get('/usercomments/{user_id}','BlogController@getUserComments');
    Route::post('/comment','BlogController@comment');
    Route::delete('/deletecomment/{id}','BlogController@deletecomment');



});

