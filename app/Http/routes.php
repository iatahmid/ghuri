<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\PlaceModel;


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

Route::get('/', array('uses' => 'HomeController@showHome'));
//Route::get('home', array('uses' => 'HomeController@showHome'));
Route::get('about', array('uses' => 'HomeController@showAbout'));
Route::get('blog', array('uses' => 'HomeController@showBlog'));
Route::get('contact', array('uses' => 'HomeController@showContact'));


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

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@showHome']);

Route::group(['middleware' => ['web']], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'AuthController@login']);
    Route::post('/handleLogin', ['as' => 'handleLogin', 'uses' => 'AuthController@handleLogin']);
    //Route::get('/home', ['middleware' => 'auth', 'as' => 'home', 'uses' => 'HomeController@showHome']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
    Route::get('/reg', ['as' => 'register', 'uses' => 'UsersController@create']);
    Route::post('/handlereg', ['as' => 'handlereg', 'uses' => 'UsersController@store']);
    //Route::resource('users', 'UsersController', ['only' => ['create', 'store']]);
});

/*
/---------------------------------------------------------------------------
/ Search from the home page
/---------------------------------------------------------------------------
*/

Route::get('index',function(){
    
    return view ('index');
});
Route::get('ajax_district',function(){
    $division_name=Input::get('division_name');
    $districts=PlaceModel::findDistricts($division_name);
    return Response::json($districts);
});
Route::get('ajax_upazilla',function(){
    $district_name=Input::get('district_name');
    $upazillas=PlaceModel::findUpazillas($district_name);
    return Response::json($upazillas);
    
});
Route::get('ajax_tourist_spot',function(){
    $upazilla_name=Input::get('upazilla_name');
    $upazilla=PlaceModel::where('UPAZILLA_NAME',$upazilla_name)->first();
    $upazilla_id=$upazilla->UPAZILLA_ID;
   
    $spots=PlaceModel::findSpots($upazilla_id);
    

    return Response::json($spots);
    
});
Route::post('/search_accommodation', ['uses'=>'AccommodationController@searchAccommodation'])->middleware(['web']);
Route::post('/search_transport', ['uses'=>'TransportController@searchTransport'])->middleware(['web']);
Route::post('/search_festival', ['uses'=>'FestivalController@searchFestival'])->middleware(['web']);
Route::post('/search_tourist_spot', ['uses'=>'TouristSpotController@searchTouristSpot'])->middleware(['web']);
Route::post('/search_restaurant', ['uses'=>'RestaurantController@searchRestaurant'])->middleware(['web']);

/*
/ Showing results
*/

Route::get('show-result',function(){
    return view ('results.default');
});

Route::get('req-spot', array('uses' => 'TouristSpotController@getSpotInfo'));
Route::get('req-guide', array('uses' => 'GuideController@getGuideInfo'));
Route::get('req-accommodation', array('uses' => 'AccommodationController@getAccommodationInfo'));
Route::get('req-restaurant', array('uses' => 'RestaurantController@getRestaurantInfo'));


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
 