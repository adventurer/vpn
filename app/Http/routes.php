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
        $v = ['API-Key'=>'6PEVEA2SFEB2QYSCTEALFM57MVFYOHCOZUXQ'];
        print_r($v);exit;
        $server = Tools::curl('https://api.vultr.com/v1/server/bandwidth\?SUBID\=4653179',0,'','', $v);
        return view('index');
    } else {
        return redirect('home');
    }

});



Route::get('/admin', 'AdminController@index');

Route::get('/ios', 'AdminController@ios');

Route::get('home', 'HomeController@index');

Route::any('user/reg', 'UserController@reg');

Route::any('user/login', 'UserController@login');

Route::get('/logout', 'UserController@logout');

Route::get('/vcode', 'VcodeController@index');

Route::get('/vcode/generation', 'VcodeController@generation');
