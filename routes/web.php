<?php

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/imprint', function () {
    return view('pages.static.imprint');
});

Route::get('/terms', function () {
    return view('pages.static.terms');
});

Auth::routes();

Route::get('auth/github', 'Auth\SocialController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\SocialController@handleProviderCallback');

Route::resource('users', 'Users\UserController');
Route::resource('meetups', 'Meetups\MeetupController');

Route::get('@{username}', 'Users\UserController@show');

Route::resource('blogs', 'Blog\UserController');
Route::resource('blogs.articles', 'Blog\ArticleController');


Route::get('/profile', 'Profile\ProfileController@index');
Route::get('/settings', 'Profile\SettingsController@index');

Route::post('/updateLocation', 'Intern\Profile\LocationController@updateLocation');
Route::post('/updateAvatar', 'Intern\Profile\AvatarController@updateAvatar');

Route::group(['prefix' => 'backend', 'middleware' => 'admin'], function() {
    Route::get('/', 'Backend\BackendController@index');
    Route::resource('users', 'Backend\Users\UserController');
    Route::resource('articles', 'Backend\Blogs\ArticleController');
});