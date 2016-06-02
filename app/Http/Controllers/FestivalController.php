<?php

namespace App\Http\Controllers;
use App\AccommodationModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class AccommodationController extends Controller
{
    
    
    public function searchAccommodation(Request $request)
    {
    $this->validate($request,[
			'accommodation_division' => 'required',
			'accommodation_district' => 'required',
			'accommodation_upazilla' => 'required',
			'accommodation_type' => 'required',
			'accommodation_capacity' => 'required',
		]);
    $upazilla=$request->get('accommodation_upazilla');
    $type=$request->get('accommodation_type');
    $capacity=$request->get('accommodation_capacity');
    $queryResult = AccommodationModel::findAccommodation($upazilla,$type,$capacity);
    /*foreach($queryResult as $q)
            {
                echo $q->PROVIDER_ID;
                echo "Hi There!";
                
            }*/
    return view('showAccommodationResult',array('result' => $queryResult));
    }
}
