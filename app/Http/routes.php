<?php

// Front area

Route::get('/', 'HomeController@index');
Route::get('/store', 'HomeController@store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/article', 'ArticleController@index');
Route::get('/article/{slug}', 'ArticleController@show');

// Contact
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@sendContactInfo');

// Admin area

Route::get('/admin', function(){
   return redirect('/admin/article');
});

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth', 'roles']
], function(){
    resource('admin/article', 'ArticleController', ['except' => 'show']);
    resource('admin/tag', 'TagController', ['except' => 'show']);
    get('admin/upload', 'UploadController@index');

    post('admin/upload/file','UploadController@uploadFile');
    delete('admin/upload/file','UploadController@deleteFile');
    post('admin/upload/folder','UploadController@createFolder');
    delete('admin/upload/folder','UploadController@deleteFolder');
});

// Authentication routes
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController'
]);