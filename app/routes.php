<?php

Event::listen('Larabook.Registration.Events.UserRegistered', function ($event)
{
//    dd('send a notification email');
    return;
});

Route::get('/', [
    'as'   => 'home',
    'uses' => 'PagesController@home'
]);

# Registration
Route::get('register', [
    'as'   => 'register_path',
    'uses' => 'RegistrationController@create'
]);

Route::post('register',
    ['as'   => 'register_path',
     'uses' => 'RegistrationController@store'
    ]);

# Login
Route::get('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@create'
]);

Route::post('login', [
    'as'   => 'login_path',
    'uses' => 'SessionsController@store'
]);
Route::get('logout', [
    'as'   => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);

# Statuses
Route::get('statuses', [
    'as' => 'status_path',
    'uses' => 'StatusController@index'
]);

Route::post('statuses', [
    'as' => 'status_path',
    'uses' => 'StatusController@store'
]);