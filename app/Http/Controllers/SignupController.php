<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use View;

//use App\Http\Controllers\Controller;
use App;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Contracts\Validation;
use App\Contributor;
use DB;
use Hash;

class SignupController extends Controller
{
    public function showForm()
	{
		//return view('pages/registerUser');
		$data = array(
			'page' => 'Register'
		);

    	return View::make('pages/registerUser')->with('data', $data);
	}

	public function registerNewUser(Request $request)
	{
		$this->validate($request,[
			'name' => 'required',
			'gender' => 'required',
			'email' => 'required',
			'password' => 'required',
			'password_confirmation' => 'required|same:password',
		]);

		$email = $request->input('email');
		$user = DB::table('contributors')->where('email', $email)->first();
		
		if ($user != null) {
		   // user does exist
			return "hi";
		}

    	$contributor = new App\Contributor;
		
		$contributor->Name= $request->get('name');
        $contributor->Contact= $request->get('ContactNumber');
        $contributor->Address=$request->get('Address');
        $contributor->DOB=$request->get('DOB');
        $contributor->Gender= $request->get('gender');
        $contributor->Email=$request->get('email');
        //$contributor->Password=bcrypt($request->get('password'));
        $contributor->Password=Hash::make($request->get('password'));
        
        $contributor->save();

        return back();
    	//}
	}
}
