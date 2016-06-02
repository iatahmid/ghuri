<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class RestaurantModel extends Model
{
    protected $primaryKey = 'RESTAURANT_ID';
    protected $table = 'restaurant';
    public $timestamps = false;
    public static function findRestaurant($upazilla,$district,$division,$food_type) //At least division has to be chosen 
    {

       if($upazilla!='Any')
        {
            $uId=PlaceModel::where('UPAZILLA_NAME',$upazilla)->lists('UPAZILLA_ID');
            //$upazillaId=$uId->UPAZILLA_ID;
        }
        elseif ($district != "Any")
       {
           $uId=PlaceModel::where('DISTRICT_NAME',$district)->lists('UPAZILLA_ID');
           //$upazillaId=$uId->UPAZILLA_ID;
       
           
       }
       else
       {
           $uId=PlaceModel::where('DIVISION_NAME',$division)->lists('UPAZILLA_ID');
          // $upazillaId=$uId->UPAZILLA_ID;
           
       }
       $query=array();
       
       if($food_type!="Any")
       {
            foreach($uId as $upazillaId)
            
            {
            
            array_push($query,DB::select('select R.RESTAURANT_NAME, F.NAME, R.SPECIALIZATION, R.ADDRESS, R.CONTACT_INFO, R.FACEBOOK_LINK, C.PRICE, C.PROPORTION, C.RATING
            from FOOD F
            inner join restaurant_food_connection C
            on (F.FOOD_ID  = C.FOOD_ID)
            inner join restaurant R
            on(R.RESTAURANT_ID = C.RESTAURANT_ID )
            where F.FOOD_TYPE =? and R.UPAZILLA_ID =?
            order by R.RESTAURANT_NAME',[$food_type,$upazillaId]));
            }
       }
       else
       {
           foreach($uId as $upazillaId)
            
            {
            
           array_push(
           $query,DB::select('select R.RESTAURANT_NAME, F.NAME, R.SPECIALIZATION, R.ADDRESS, R.CONTACT_INFO, R.FACEBOOK_LINK, C.PRICE, C.PROPORTION, C.RATING
           from food F
           inner join restaurant_food_connection C
           on (F.FOOD_ID  = C.FOOD_ID)
           inner join restaurant R
           on(R.RESTAURANT_ID = C.RESTAURANT_ID )
           where R.UPAZILLA_ID =?
           order by R.RESTAURANT_NAME',[$upazillaId]));
            }
       }
       return $query;
    }
}
