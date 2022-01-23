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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin' ,'middleware' => 'auth'], function() {
    Route::get('site/create', 'Admin\SiteController@add')->middleware('auth');
    Route::post('site/create', 'Admin\SiteController@create'); 
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::post('profile/create', 'Admin\ProfileController@create');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::post('profile/edit', 'Admin\ProfileController@update');
    
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', function () {
    return redirect('/admin/site/main');
})->name('home');

Route::group(['prefix' => 'admin'], function() {
    Route::get('site/create', 'Admin\SiteController@add')->middleware('auth');
    Route::post('site/create', 'Admin\SiteController@create')->middleware('auth');
    Route::get('site', 'Admin\SiteController@index')->middleware('auth'); // 追記
    Route::get('site/edit', 'Admin\SiteController@edit')->middleware('auth'); // 追記
    Route::post('site/edit', 'Admin\SiteController@update')->middleware('auth'); // 追記
    Route::get('site/delete', 'Admin\SiteController@delete')->middleware('auth');
    Route::get('site/main', 'Admin\SiteController@main')->middleware('auth');
    
});

Route::get('/', 'SiteController@index');

Route::get('/profile', 'ProfileController@index');


