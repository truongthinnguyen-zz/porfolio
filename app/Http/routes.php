<?php

Route::get('/', function () {
    return view('home');
});

// Authentication routes
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);

Route::resource('article', 'ArticlesController');