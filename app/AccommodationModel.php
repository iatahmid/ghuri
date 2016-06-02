<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\PlaceModel;
class AccommodationModel extends Model
{
    protected $primaryKey = 'PROVIDER_ID';
    protected $table = 'accommodation_provider';
    public $timestamps = false;
    public static function findAccommodation($division,$district, $upazilla,$type,$capacity)
     {
        //echo $upazilla, $type, $capacity;
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
        if($type == "Any" && $capacity !="More")
        {
            foreach($uId as $upazillaId)
            
            {
             //$upazillaId= $ud.'UPAZILLA_ID';
             //echo gettype($upazillaId);
             //echo $upazillaId;
            
             array_push($query,(DB::select ('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                      S.ROOM_TYPE,S.CAPACITY,
                                       C.PRICE, C.RATING
                                       from accommodation_provider P
                                       inner join provider_specification_connection C
                                       on P.provider_id = C.provider_id
                                       inner join accommodation_specification S
                                       on S.specification_id = C.specification_id
                                       where S.CAPACITY=? and P.upazilla_id=? order by C.PRICE,
                                       C.RATING desc,P.accomodation_type',[$capacity,$upazillaId])));
           }
        }
        elseif($type != "Any" && $capacity =="More")
        {
             foreach($uId as $upazillaId)
            {
                
                array_push($query,( DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                     S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.room_type = ? AND S.capacity > ? and P.upazilla_id =? 
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[$type,10,$upazillaId])));
            }                             
        }
        elseif($type != "Any" && $capacity !="More")
        {
          foreach($uId as $upazillaId)
            {
                                    array_push($query,(DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,
                                     S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.room_type = ? AND S.capacity = ? AND P.upazilla_id =? 
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[$type,$capacity,$upazillaId])));
            }                         
        }
       
        elseif($type == "Any" && $capacity =="More")
        {
            
            foreach($uId as $upazillaId)
            {
           
            array_push($query,( DB::select('select distinct P.PROVIDER_ID, P.ACCOMODATION_NAME, P.ACCOMODATION_TYPE, P.FACEBOOK_LINK, P.CONTACT_INFO, P.ADDRESS, S.NO_OF_ROOMS, S.CAPACITY,S.ROOM_TYPE,
                                      C.PRICE, C.RATING
                                      from accommodation_provider P
                                      inner join provider_specification_connection C
                                      on P.provider_id = C.provider_id
                                      inner join accommodation_specification S
                                      on S.specification_id = C.specification_id
                                      where S.capacity >? and P.upazilla_id =?
                                      order by C.PRICE, C.RATING desc, P.accomodation_type',[10,$upazillaId])));
            }                         
        }
        /*foreach($query as $q1)
            
            {
                foreach($q1 as $q)
                {
                    echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME, $q->ACCOMODATION_TYPE, $q->FACEBOOK_LINK, $q->CONTACT_INFO, $q->ADDRESS,
                    $q->NO_OF_ROOMS, $q->CAPACITY,$q->ROOM_TYPE,$q->CAPACITY,$q->PRICE, $q->RATING;
                }
                
                
            }
        //print_r($query);*/
        return $query;
     }

}