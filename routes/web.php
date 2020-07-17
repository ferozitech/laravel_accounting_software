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
    Auth::routes();

    Route::get('/', function () {
        return view('frontend.welcome');
    });
    Route::any('home/', array( 'as' => 'home', 'uses' => 'frontend\UserController@home' ));
    Route::get('admin/', 'backend\AdminController@login')->name('admin');
    Route::post('SignInAdmin/{var?}', 'backend\AdminController@SignIn')->name('SignInAdmin');
    Route::get('login/{var?}', 'frontend\UserController@login')->name('login');
    Route::post('sign_in_user/{var?}', 'frontend\UserController@SignIn')->name('sign_in_user');
    Route::get('forgot-password/{var?}', 'frontend\UserController@forgotpassword')->name('forgot-password');
    Route::post('forgotPasswordSubmit', 'frontend\UserController@forgotPasswordSubmit')->name('forgotPasswordSubmit');
    Route::get('reset-password/{var?}', 'frontend\UserController@reset_password')->name('reset-password');
    Route::post('reset_now/{var?}', 'frontend\UserController@reset_now')->name('reset_now');
    Route::get('logOutUser/{var?}', 'frontend\UserController@logOutUser')->name('logOutUser');
    Route::post('user_sign_in/{var?}', 'frontend\UserController@SignIn')->name('user_sign_in');
    Route::any('getLogOut/{var?}', 'backend\AdminController@getLogOut')->name('getLogOut');


    Route::group(['namespace' => 'frontend','middleware' => ['auth:web']],function() {
        Route::get('user-dashboard/{var?}', 'UserController@dashboard')->name('user-dashboard');
    });

    Route::group(['prefix'=>'admin','namespace' => 'backend','middleware' => ['auth:admin']],function() {
        Route::get('dashboard/', 'AdminController@dashboard')->name('dashboard');
        Route::get('admin-blogs/', 'ArticleController@index')->name('admin-blogs');
        Route::get('create-blogs/', 'ArticleController@create')->name('create-blogs');
        Route::get('create-page/', 'PagesController@create')->name('create-page');
        Route::get('create-company/', 'CompanyController@create')->name('create-company');
        Route::get('companies/', 'CompanyController@index')->name('companies');
        Route::post('storecompanies/', 'CompanyController@store')->name('storecompanies');
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
