<?php

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

Auth::routes();

Route::group(['middleware' => ['checkauth']], function () {

    Route::get('/', function () {
        return view('welcome');
    });


    /*
    |---------------------------------------------------------------|
    |Profile Routes 
    |---------------------------------------------------------------|
    */
   
    Route::get('image-crop', 'ImageController@imageCrop');
    Route::post('image-crop', 'ImageController@imageCropPost');

    /*
    |---------------------------------------------------------------|
    |Project Routes
    |---------------------------------------------------------------|
    */
    
    Route::get('/projects','ProjectController@index');
    Route::get('/projects/create','ProjectController@create');
    Route::post('/projects/store','ProjectController@store');
    Route::get('/projects/search','ProjectController@search');
    Route::get('/projects/{project}','ProjectController@show');
    Route::get('/projects/{project}/start','ProjectController@startProject');
    Route::get('/projects/{project}/complete','ProjectController@completeProject');
    Route::get('/projects/{project}/users/{user}/join','ProjectController@joinProject');
    Route::get('/projects/{project}/users/{user}/leave','ProjectController@leaveProject');
    Route::post('/projects/{project}/comment','CommentController@store');
    Route::post('/acceptance-criteria/toggle/{acceptanceCriteria}','AcceptanceCriteriaController@toggle');

    /*
    |---------------------------------------------------------------|
    |Favorite Routes
    |---------------------------------------------------------------|
    */
    Route::post('/favorite/{project}', 'ProjectController@favoriteProject');
    Route::post('/unfavorite/{project}', 'ProjectController@unFavoriteProject');


    Route::get('/users/{id}','UserController@show');
    Route::get('/company-profile','CompanyController@index');

    Route::post('/review/{review}','ReviewController@Store');


});


