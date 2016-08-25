<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    $name =  Session::get('name');
    if (!$name) {
        return view('index');
    } else {
        return redirect('home');
    }

});



Route::get('/admin', 'AdminController@index');

Route::get('/ios', 'AdminController@ios');

Route::get('home', 'HomeController@index');

Route::get('user/reg', 'UserController@reg');

Route::get('user/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');
