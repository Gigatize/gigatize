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

    Route::get('send_test_email', function(){
        Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->subject('Mailgun and Laravel are awesome!');
            $message->to('josh@gigatize.io');
        });
    });


    Route::get('/', function () {
        return view('welcome')->with('success','Welcome!');
    });


    /***************************************************************/
    /*                      Profile Routes                         */
    /***************************************************************/

    Route::get('image-crop', 'ImageController@imageCrop');
    Route::post('image-crop', 'ImageController@imageCropPost');

    /***************************************************************/
    /*                      Project Routes                         */
    /***************************************************************/

    Route::get('/projects/create','ProjectController@create');


});


