<?php

Route::middleware(['web'])->namespace('Admin')->prefix('admin')->group(function () {
    Route::resource('users', 'UsersController');
    Route::resource('role', 'RoleController');
    Route::resource('news', 'NewsController');
    Route::resource('programms', 'ProgrammController');
    Route::resource('{programm}/tests', 'TestController');
    Route::resource('{test}/questions', 'QuestionController');
    Route::resource('{question}/answers', 'AnswerController');
    Route::get('{test}/questions/create/excel', 'QuestionController@createExcel');
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('country/{locale}', 'LocalizationCountryController@index');

Route::middleware(['web'])->group(function () {
    Route::get('media/{file_name}', 'MediaController@getImage')->where('file_name', '.*');
    Route::get('media_avatar/{file_name}', 'MediaController@getAvatar')->where('file_name', '.*');
    Route::get('media_doc/{file_name}', 'MediaController@getFile')->where('file_name', '.*');
    Route::get('media_content/{file_name}', 'MediaController@getContentImage')->where('file_name', '.*');
    Route::post('content_image', 'MediaController@storeContentImage');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
