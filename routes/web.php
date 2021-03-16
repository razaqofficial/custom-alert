
<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function() {
   Route::get('login', 'LoginController@login')->name('login');
   Route::post('login', 'LoginController@doLogin')->name('login');
   Route::get('logout', 'LoginController@logout')->name('logout');

   Route::post('register', 'RegisterController@register')->name('register');
});

Route::get('', function() {
    return redirect(route('alert.index'));
});


Route::group(['middleware' => 'auth'], function() {

    Route::group(['as' => 'alert.', 'prefix'=>'alert'], function() {
        Route::get('', 'AlertController@index')->name('index');
        Route::post('create', 'AlertController@create')->name('create');
        Route::get('details/{alert}', 'AlertController@details')->name('details');
        Route::get('delete/{alert}', 'AlertController@delete')->name('delete');
    });

    Route::group(['as' => 'rule.', 'prefix'=>'rule'], function() {
        Route::post('create/{alert}', 'RuleController@create')->name('create');
        Route::get('user/{user}', 'RuleController@getUserRules');
        Route::get('delete/{rule}', 'RuleController@delete')->name('delete');
    });

});

