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

/*Route::get('/', function () {
    return view('pages/home');
});

Route::get('home', function () {
    return view('pages/home');
});

Route::get('about', function () {
    return view('pages/about');
});

Route::get('blog', function () {
    return view('pages/blog');
});

Route::get('contact', function () {
    return view('pages/contact');
});*/

Route::get('/', array('uses' => 'HomeController@showHome'));
//Route::get('home', array('uses' => 'HomeController@showHome'));
Route::get('about', array('uses' => 'HomeController@showAbout'));
Route::get('blog', array('uses' => 'HomeController@showBlog'));
Route::get('contact', array('uses' => 'HomeController@showContact'));

// route to show the login form
/*
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));

Route::get('loginSuccess', function () {
    return view('loginSuccess');
});

Route::get('logout', array('uses' => 'HomeController@doLogout'));
*/

//signup
/*Route::get('/reg', 'SignupController@showForm')->middleware(['web']);
Route::post('/reg/store','SignupController@registerNewUser')->middleware(['web']);

//login
//Route::post('/login','loginController@postLogin')->middleware(['web']);
Route::get('/login','loginController@showLogin')->middleware(['web']);
Route::post('/login','loginController@postLogin')->middleware(['web']);*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
    Route::get('/home', ['middleware' => 'auth', 'as' => 'home', 'uses' => 'UsersController@showHome']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    //Route::get('/reg', ['as' => 'register', 'uses' => 'UsersController@create']);
    //Route::post('/reg/store', ['as' => 'regStore', 'uses' => 'UsersController@store']);
    Route::resource('users', 'UsersController', ['only' => ['create', 'store']]);
});
 