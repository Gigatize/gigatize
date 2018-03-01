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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects/create','ProjectController@create');

\Illuminate\Support\Facades\Event::listen('Aacotroneo\Saml2\Events\Saml2LoginEvent', function (\Aacotroneo\Saml2\Events\Saml2LoginEvent $event) {
    $messageId = $event->getSaml2Auth()->getLastMessageId();
    // your own code preventing reuse of a $messageId to stop replay attacks
    $user = $event->getSaml2User();
    $userData = [
        'id' => $user->getUserId(),
        'attributes' => $user->getAttributes(),
        'assertion' => $user->getRawSamlAssertion()
    ];

    dd($userData);
    $laravelUser = 1;
        //if it does not exist create it and go on or show an error message
    \Illuminate\Support\Facades\Auth::login($laravelUser);
});


Route::get('/home', 'HomeController@index')->name('home');

