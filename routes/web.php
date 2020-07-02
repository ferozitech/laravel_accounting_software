<?php

    use Illuminate\Support\Facades\Auth;
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

    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();
//    Route::get('/', ['uses' => 'frontend\SettingsController@homepage','as' => 'home']);
    Route::get('admin/', 'backend\AdminController@login')->name('admin');
    Route::post('SignInAdmin/{var?}', 'backend\AdminController@SignIn')->name('SignInAdmin');
    Route::any('getLogOut/{var?}', 'backend\AdminController@getLogOut')->name('getLogOut');

    Route::group(['prefix'=>'admin','namespace' => 'backend','middleware' => ['auth:admin']],function() {
        Route::get('dashboard/', 'AdminController@dashboard')->name('dashboard');
        Route::get('admin-blogs/', 'ArticleController@index')->name('admin-blogs');
        Route::get('create-blogs/', 'ArticleController@create')->name('create-blogs');
        Route::get('create-page/', 'PagesController@create')->name('create-page');
        Route::post('submitPage/', 'PagesController@store')->name('submitPage');
        Route::post('updatePage/', 'PagesController@update')->name('updatePage');
        Route::any('destroyPost/{id?}', 'PagesController@destroy')->name('destroyPost');
        Route::get('pages/', 'PagesController@index')->name('pages');
        Route::get('menu/{slug?}', 'PagesController@menu')->name('menu');
        Route::get('edit-page/{slug?}', 'PagesController@edit')->name('edit-page');
        Route::post('addToHeaderMenu/', 'PagesController@addToHeaderMenu')->name('addToHeaderMenu');
        Route::post('postHeaderMenu/', 'PagesController@postHeaderMenu')->name('postHeaderMenu');
        Route::post('storeBlogs/', 'ArticleController@store')->name('storeBlogs');
        Route::get('edit-blog/{slug?}', 'ArticleController@edit')->name('edit-blog');
        Route::post('updateBlog/{slug?}', 'ArticleController@update')->name('updateBlog');
        Route::any('deleteBlog/{id?}', 'ArticleController@destroy')->name('deleteBlog');
    });
