<?php

// Front area

Route::get('/', 'HomeController@index');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/articles', 'ArticleController@index');
Route::get('/article/{slug}', 'ArticleController@show');

// Admin area

Route::get('/admin', function(){
   return redirect('/admin/article');
});

Route::group([
    'namespace' => 'Admin',
    'middleware' => 'auth'
], function(){
    resource('admin/article', 'ArticleController');
    resource('admin/tag', 'TagController');
    get('admin/upload', 'UploadController@index');
});

// Authentication routes
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);