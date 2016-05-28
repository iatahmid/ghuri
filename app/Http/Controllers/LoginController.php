<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Contributor;
use DB;
use Illuminate\Contracts\Validation;
use View;
use Hash;

class LoginController extends Controller
{
    //
	public function showLogin(){

		$data = array(
			'page' => 'Sign In'
		);

		return View::make('login/login')->with('data', $data);

	}

	public function logged(){

		if(!Auth::check()){
			return redirect('/admin');
		}

	}

	public function postLogin(Request $request){

		/*$this->validate($request,[
			'email' => 'required',
			'password' => 'required'
			]);*/

		$logdata = $request->only('email', 'password');

		//echo "Log Data: $logdata <br>";

		if(\Auth::attempt($logdata))
		{

			return "Yes!";
			/*$data = array(
				'page' => 'Test Run Successful',
				'email' => $request['email'],
				'password' => $request['password']
			);

			return View::make('test/test')->with('data', $data);*/

		}
		
		$email = $request->input('email');
		$user = DB::table('contributors')->where('email', $email)->first();

		$userPass = $user->Password;
		$hashedPass = Hash::make($request->get('password'));
		//$cryptPass = bcrypt($request->get('password'));
		
		echo "Hashed Pass: $hashedPass";
		echo "<br>";
		echo "User Pass: $userPass";
		echo "<br>";

		$hashedPass = Hash::make("mm7");
		echo "Hashed Pass(Raw): $hashedPass";
		//echo $cryptPass;
		//return "Alas";

		/*if(!(Auth::attempt(['email' => $request['email'],'password' => $request['password']]))){
			//return redirect()->back()->with(['fail' => 'Could not log you in !']);	

			$data = array(
				'page' => 'Test Run',
				'email' => $request['email'],
				'password' => $request['password']
			);

			return View::make('test/test')->with('data', $data);
		}*/

		/*
		if($request->email != 'admin@admin.com'){
			
			$email = $request->input('email');
			$contributor = new Contributor;
			
			$contributor = DB::table('contributors')->where('email', $email)->first();
			
			//return view('logged',compact('user'));

	    	return View::make('logged')->with('data', $contributor);

		}*/

		/*
		$data = array(
			'page' => 'Test Run Success',
			'email' => $request['email'],
			'password' => $request['password']
		);

		return View::make('test/test')->with('data', $data);
		*/

		//return $this->index($request);

	}

}
