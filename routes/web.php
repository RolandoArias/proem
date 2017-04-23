<?php

$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);

Route::get('/', function () {
    return view('welcome');
});


Auth::routes(['login' => 'auth.login']);


Route::get('/home', ['as'=>'user.home','uses'=> 'HomeController@index']);
