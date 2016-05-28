<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use View;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Redirect;

use Auth;

class HomeController extends Controller
{
    //
    public function showHome()
    {
    	$data = array(
			'page' => 'Home'
		);

    	return View::make('pages/home')->with('data', $data);
    }

    public function showAbout()
    {
    	$data = array(
			'page' => 'About'
		);

    	return View::make('pages/about')->with('data', $data);
    }

    public function showBlog()
    {
    	$data = array(
			'page' => 'Blog'
		);

    	return View::make('pages/blog')->with('data', $data);
    }

    public function showContact()
    {
    	$data = array(
			'page' => 'Contact'
		);

    	return View::make('pages/contact')->with('data', $data);
    }

	// show the form
    public function showLogin()
	{
	    return View::make('login');
	    //return view('login');
	}

	// process the form
	public function doLogin()
	{
		// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        // echo 'SUCCESS!';
		        return Redirect::to('loginSuccess');


		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('loginFailed');

		    }

		}
	} // doLogin //

	// log out
	public function doLogout()
	{
	    Auth::logout(); // log the user out of our application
	    return Redirect::to('login'); // redirect the user to the login screen
	}
}
