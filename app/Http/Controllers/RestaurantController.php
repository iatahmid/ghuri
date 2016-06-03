<?php

namespace App\Http\Controllers;
use App\RestaurantModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


class RestaurantController extends Controller
{
    public function getRestaurantInfo()
    {

        $restaurant_id = Input::get('id');
        
        $foodInfoResult = RestaurantModel::getFoodInfo($restaurant_id);
        $restaurantResult = RestaurantModel::getRestaurantInfo($restaurant_id);

        $food_infos = array();
        foreach($foodInfoResult as $q)
        {
            $food_infos[] = array( 
                                    'name' => $q->FOOD_NAME,
                                    'type' => $q->FOOD_TYPE,
                                    'price' => $q->PRICE,
                                    'proportion' => $q->PROPORTION,
                                    'rating' => $q->RATING,
                            );
            
        }

        $restaurant_basic;
        foreach($restaurantResult as $q)
        {
            $restaurant_basic = array(
                                'id'=>$q->RESTAURANT_ID,
                                'name'=>$q->RESTAURANT_NAME,
                                'specialization'=>$q->SPECIALIZATION,
                                'contact_info'=> $q->CONTACT_INFO,
                                'facebook_link' => $q->FACEBOOK_LINK,
                                'address' => $q->ADDRESS,
                                'spot_id' => $q->SPOT_ID,
                                'spot_name' => $q->SPOT_NAME,
                                'upazilla' => $q->UPAZILLA_NAME,
                                'district' => $q->DISTRICT_NAME
                                );
        }        

        return view('results.showRestaurantDetails',
                        array(  
                                'foodInfos' => $food_infos,
                                'restaurant' => $restaurant_basic
                            ));
    }
    
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
