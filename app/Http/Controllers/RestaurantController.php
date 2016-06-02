<?php

namespace App\Http\Controllers;
use App\RestaurantModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class RestaurantController extends Controller
{
    
    
    public function searchRestaurant(Request $request)
    {
    $division=$request->get('restaurant_division');
    $district=$request->get('restaurant_district');
    $upazilla=$request->get('restaurant_upazilla');
    
    $type=$request->get('restaurant_type');
    
    $queryResult = RestaurantModel::findRestaurant($upazilla,$district,$division,$type);
    
    $result=array();
    foreach($queryResult as $q1)
            
            {
                foreach($q1 as $q)
                {
                    //echo gettype($q);
                    $result[]=array( 'RESTAURANT_NAME'=>$q->RESTAURANT_NAME, 'SPECIALIZATION'=>$q->SPECIALIZATION,'ADDRESS'=> $q->ADDRESS,
                'CONTACT_INFO'=>$q->CONTACT_INFO, 'FACEBOOK_LINK'=>$q->FACEBOOK_LINK, 'PRICE'=>$q->PRICE, 'PROPORTION'=>$q->PROPORTION,
		'RATING'=> $q->RATING);
                    
                }
                
                
            }
    return view('showRestaurant',array('result' => $result));
    }
}
