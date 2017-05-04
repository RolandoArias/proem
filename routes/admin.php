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

use Illuminate\Support\Facades\Auth;

Route::get('admin/', function () {
    if (Auth::check()) {
        return redirect('admin/dashboard');
    }

    return view('admin.auth.login');
});



Route::group(['middleware' => ['auth'],'prefix' => 'admin'], function () {    
    Route::get('/dashboard', '\App\Http\Controllers\Admin\HomeController@index')->name('home');
    Route::resource('accesos', '\App\Http\Controllers\Admin\AccesosController');
});

