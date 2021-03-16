
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
   Route::post('logout', 'LoginController@logout')->name('logout');

   Route::post('register', 'RegisterController@register')->name('register');
});

Route::get('', function() {
    return redirect(route('rule.index'));
});
Route::group(['middleware' => 'auth', 'as' => 'rule.', 'prefix'=>'rule'], function() {
    Route::get('', 'RuleController@index')->name('index');
    Route::post('create', 'RuleController@create')->name('create');
    Route::get('user/{user}', 'RuleController@getUserRules');
    Route::get('delete/{rule}', 'RuleController@delete')->name('delete');
    Route::get('download-js/{file}', 'RuleController@downloadJsFile')->name('download.js');

});

