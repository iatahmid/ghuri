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
                'select T.spot_id as SPOT_ID, SPOT_NAME, DESCRIPTION, RATING, USER, name
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

        public static function getPhotos($spot_id)
        {

            $photos = DB::select(
                        'Select PHOTO_FILE, SPOT_NAME, name
                        from photo P
                        left outer join users U
                        on (P.USER_ID = U.id)
                        join tourist_spot T
                        on (P.SPOT_ID = T.SPOT_ID)
                        where P.SPOT_ID = ?
                        Order By name', [$spot_id]
                        );

            return $photos;
        }

        public static function getReviews($spot_id)
        {

            $reviews = DB::select(
                        'Select DESCRIPTION, RATING, SPOT_NAME, name
                        from review R
                        left outer join users U
                        on (R.USER = U.id)
                        join tourist_spot T
                        on (R.SPOT_ID = T.SPOT_ID)
                        where R.SPOT_ID = ?
                        Order By name', [$spot_id]
                        );

            return $reviews;
        }        
        
        public static function getAvgRating($spot_id)
        {

            $avgRating = DB::select(
                        'Select avg(RATING) as avgRating
                        from review R
                        where R.SPOT_ID = ?
                        Group By R.SPOT_ID', [$spot_id]
                        );

            return $avgRating;
        } 
    
        public static function getGuides($spot_id)
        {

            $guides = DB::select(
                        'Select GUIDE_ID, GUIDE_NAME, CONTACT_INFO
                        from guide G
                        where G.SPOT_ID = ?
                        Order By GUIDE_NAME', [$spot_id]
                        );

            return $guides;
        } 

        public static function getAccommodations($spot_id)
        {

            $accommodation = DB::select(
                        'Select AP.PROVIDER_ID as PROVIDER_ID, ACCOMODATION_NAME, ACCOMODATION_TYPE,
                        CONTACT_INFO, FACEBOOK_LINK, ADDRESS, 
                        SPOT_NAME, UPAZILLA_NAME, DISTRICT_NAME
                        from accommodation_provider AP
                        Join tourist_spot TS
                        On (AP.UPAZILLA_ID = TS.UPAZILLA_ID)
                        Join upazilla U
                        On (AP.UPAZILLA_ID = U.UPAZILLA_ID)
                        where TS.SPOT_ID = ?
                        Order By ACCOMODATION_NAME', [$spot_id]
                        );

            return $accommodation;
        }

        public static function getRestaurants($spot_id)
        {

            $restaurants = DB::select(
                        'Select RESTAURANT_ID, RESTAURANT_NAME, SPECIALIZATION,
                        CONTACT_INFO, FACEBOOK_LINK, ADDRESS,
                        SPOT_NAME, UPAZILLA_NAME, DISTRICT_NAME
                        from restaurant R
                        Join tourist_spot TS
                        On (R.UPAZILLA_ID = TS.UPAZILLA_ID)
                        Join upazilla U
                        On (R.UPAZILLA_ID = U.UPAZILLA_ID)
                        where TS.SPOT_ID = ?
                        Order By RESTAURANT_NAME', [$spot_id]
                        );

            return $restaurants;
        }

/*
        PRICE, PSC.RATING RATING,
        NO_OF_ROOMS, ROOM_TYPE, CAPACITY


        Left Outer Join provider_specification_connection PSC
        On (AP.PROVIDER_ID = PSC.PROVIDER_ID)
        Join accommodation_specification ASP
        On (PSC.SPECIFICATION_ID = ASP.SPECIFICATION_ID)
*/        
}