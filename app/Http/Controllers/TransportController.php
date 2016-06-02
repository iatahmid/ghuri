<?php

namespace App\Http\Controllers;
use App\TransportModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class TransportController extends Controller
{
    
    
    public function searchTransport(Request $request)
    {
    /*$this->validate($request,[
			'accommodation_division' => 'required',
			'accommodation_district' => 'required',
			'accommodation_upazilla' => 'required',
			'accommodation_type' => 'required',
			'accommodation_capacity' => 'required',
		]);*/
    $from_division=$request->get('transport_from_division');
    $from_district=$request->get('transport_from_district');
    $from_upazilla=$request->get('transport_from_upazilla');
    $from_tourist_spot=$request->get('transport_from_tourist_spot');
    $to_division=$request->get('transport_to_division');
    $to_district=$request->get('transport_to_district');
    $to_upazilla=$request->get('transport_to_upazilla');
    $to_tourist_spot=$request->get('transport_to_tourist_spot');
    if($from_district=="Any")$from=$from_division; else if ($from_upazilla=="Any") $from=$from_district;
    elseif($from_tourist_spot=="Any") $from=$from_upazilla; else $from = $from_tourist_spot;
    
    if($to_district=="Any")$to=$to_division; else if ($to_upazilla=="Any") $to=$to_district;
    elseif($to_tourist_spot=="Any") $to=$to_upazilla; else $to = $to_tourist_spot;
    
    $type=$request->get('transport_type');
    
    $queryResult = TransportModel::findTransport($type,$from,$to);
    /*foreach($queryResult as $q)
            {
                echo $q->PROVIDER_ID;
                echo "Hi There!";
                
            }*/
    return view('showTransportResult',array('result' => $queryResult));
    }
}
