<?php

namespace App\Http\Controllers;
use App\AccommodationModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


class AccommodationController extends Controller
{
    public function getAccommodationInfo()
    {

        $provider_id = Input::get('id');
        $roomInfoResult = AccommodationModel::getAccommodationInfo($provider_id);
        $providerResult = AccommodationModel::getProviderInfo($provider_id);

        $room_infos = array();
        foreach($roomInfoResult as $q)
        {
            $room_infos[] = array( 
                                    'room_count' => $q->NO_OF_ROOMS,
                                    'room_type' => $q->ROOM_TYPE,
                                    'room_capacity' => $q->CAPACITY,
                                    'room_price' => $q->PRICE,
                                    'room_rating' => $q->RATING,
                            );
            
        }

        $provider_basic;
        foreach($providerResult as $q)
        {
            $provider_basic = array(
                                'id'=>$q->PROVIDER_ID,
                                'name'=>$q->ACCOMODATION_NAME,
                                'type'=>$q->ACCOMODATION_TYPE,
                                'contact_info'=> $q->CONTACT_INFO,
                                'facebook_link' => $q->FACEBOOK_LINK,
                                'address' => $q->ADDRESS,
                                'spot_id' => $q->SPOT_ID,
                                'spot_name' => $q->SPOT_NAME,
                                'upazilla' => $q->UPAZILLA_NAME,
                                'district' => $q->DISTRICT_NAME
                                );
        }        

        return view('results.showAccommodationDetails',
                        array(  
                                'roomInfos' => $room_infos,
                                'provider' => $provider_basic
                            ));
    }
    
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
