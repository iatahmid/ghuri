<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TouristSpotModel extends Model
{
        protected $primaryKey = 'SPOT_ID';
        protected $table = 'tourist_spot';
        public $timestamps = false;
        
        public static function findTouristSpotReviews($division,$district,$upazilla)
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
       foreach($uId as $upazillaId)
            
            {
            
                array_push($query,DB::select(
                'select SPOT_NAME, DESCRIPTION, RATING, USER, name
                from tourist_spot T 
                left outer join review R
                on(T.spot_id=R.spot_id)
                join users U 
                on(R.USER=U.id)
                where upazilla_id =?
                order by SPOT_NAME',[$upazillaId]));
                
            }   
           
            return $query;
        }

        public static function findTouristSpotPhotos($division,$district,$upazilla)
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
       foreach($uId as $upazillaId)
            
            {
            
                array_push($query,DB::select(
                'select SPOT_NAME, PHOTO_FILE, USER_ID
                from tourist_spot T 
                left outer join photo P
                on(T.spot_id=P.spot_id)
                where upazilla_id =?
                order by SPOT_NAME',[$upazillaId]));
                
            }   
           
            return $query;
        }

        public static function findTouristSpotAvgRating($division, $district, $upazilla)
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
       foreach($uId as $upazillaId)
            
            {
            
                array_push($query,DB::select(
                'select R.SPOT_ID as SPOT_ID, SPOT_NAME, avg(RATING) as avgRating
                from tourist_spot T 
                left outer join review R
                on(T.spot_id=R.spot_id)
                where upazilla_id = ?
                group by R.SPOT_ID, SPOT_NAME
                order by SPOT_NAME', [$upazillaId]));                
            }
       
            return $query;
        }
        
    
}