<?php
#rutas de Login Social
$s = 'social.';
Route::get('/social/redirect/{provider}',   ['as' => $s . 'redirect',   'uses' => 'Auth\SocialController@getSocialRedirect']);
Route::get('/social/handle/{provider}',     ['as' => $s . 'handle',     'uses' => 'Auth\SocialController@getSocialHandle']);
Auth::routes(['login' => 'auth.login']);

#Rutas Paginas Frontend
Route::get('/', function () { return view('front.index')->with('carousel',true); });


Route::group(['middleware' => ['auth']], function () {    
	Route::get('/mi-cuenta', ['as'=>'user.mi-cuenta','uses'=> 'HomeController@getMiCuenta']);
	Route::post('/update/edit_profile', ['as'=>'user.edit-user','uses'=> 'UserFrontController@postSaveUser']);
});

#Rutas de pruebas
Route::get('/64', function () {});
