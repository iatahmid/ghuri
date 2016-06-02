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
   
    $division=$request->get('accommodation_division');
    $district=$request->get('accommodation_district');
    $upazilla=$request->get('accommodation_upazilla');
    $type=$request->get('accommodation_type');
    $capacity=$request->get('accommodation_capacity');
   // $queryResult=array();
    $queryResult = AccommodationModel::findAccommodation($division,$district, $upazilla,$type,$capacity);
    //echo gettype($queryResult);
    //$count=0;
    $result=array();
    foreach($queryResult as $q1)
            
            {
                foreach($q1 as $q)
                {
                    //echo gettype($q);
                    $result[]=array('PROVIDER_ID'=>$q->PROVIDER_ID, 'ACCOMODATION_NAME'=>$q->ACCOMODATION_NAME,
                            'ACCOMODATION_TYPE'=> $q->ACCOMODATION_TYPE, 'FACEBOOK_LINK'=>$q->FACEBOOK_LINK, 'CONTACT_INFO'=>$q->CONTACT_INFO,
                            'ADDRESS'=>$q->ADDRESS,'NO_OF_ROOMS'=>$q->NO_OF_ROOMS, 'CAPACITY'=>$q->CAPACITY,'ROOM_TYPE'=>$q->ROOM_TYPE,'CAPACITY'=>$q->CAPACITY,
                            'PRICE'=> $q->PRICE, 'RATING'=>$q->RATING);
                    //echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME, $q->ACCOMODATION_TYPE, $q->FACEBOOK_LINK, $q->CONTACT_INFO, $q->ADDRESS,
                    //$q->NO_OF_ROOMS, $q->CAPACITY,$q->ROOM_TYPE,$q->CAPACITY,$q->PRICE, $q->RATING .' </br> ' ;
                    //$count++;
                }
                
                
            }
            //print_r($result);
        /*    echo $count.'</br> ';
            $count=0;
        foreach($result as $q1)
            {
                
                    echo $q1['PROVIDER_ID'].'</br> ';
                    $count++;
                
            }
         echo $count.'</br> ';*/
            
    
    return view('showAccommodation',array('result' => $result));
    // return view('showAccommodationResult')->with('result',$result);
    //return view('showAccommodationResult',$queryResult);
    }
}
