<?php

namespace App\Http\Controllers;
use App\TouristSpotModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

use App\Http\Requests;


class TouristSpotController extends Controller
{
    public function searchTouristSpot(Request $request)
    {
    
        $division=$request->get('spot_division');
        $district=$request->get('spot_district');
        $upazilla=$request->get('spot_upazilla');
        
        $reviewResult = TouristSpotModel::findTouristSpotReviews($division,$district,$upazilla);
        $photoResult = TouristSpotModel::findTouristSpotPhotos($division,$district,$upazilla);
        $avgRatingResult = TouristSpotModel::findTouristSpotAvgRating($division,$district,$upazilla);

        $reviews = array();
        foreach($reviewResult as $q1)
        {
            foreach($q1 as $q)
            {
                //echo gettype($q);
                $reviews[] = array( 'SPOT_NAME'=>$q->SPOT_NAME,
                                    'DESCRIPTION'=> $q->DESCRIPTION, 
                                    'RATING'=>$q->RATING, 
                                    'USER'=>$q->USER,
                                    'NAME' => $q->name
                        );
                //echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME, $q->ACCOMODATION_TYPE, $q->FACEBOOK_LINK, $q->CONTACT_INFO, $q->ADDRESS,
                //$q->NO_OF_ROOMS, $q->CAPACITY,$q->ROOM_TYPE,$q->CAPACITY,$q->PRICE, $q->RATING .' </br> ' ;
                //$count++;
            }        
        }

        $photos = array();
        foreach($photoResult as $q1)
        {
            foreach($q1 as $q)
            {
                //echo gettype($q);
                $photos[] = array( 'SPOT_NAME'=>$q->SPOT_NAME,
                                    'PHOTO_FILE'=> $q->PHOTO_FILE, 
                                    'USER'=>$q->USER_ID
                                );
                
                //echo $q->PROVIDER_ID, $q->ACCOMODATION_NAME, $q->ACCOMODATION_TYPE, $q->FACEBOOK_LINK, $q->CONTACT_INFO, $q->ADDRESS,
                //$q->NO_OF_ROOMS, $q->CAPACITY,$q->ROOM_TYPE,$q->CAPACITY,$q->PRICE, $q->RATING .' </br> ' ;
                //$count++;
            }        
        }

        $avgRatings = array();
        foreach($avgRatingResult as $q1)
        {
            foreach($q1 as $q)
            {
                $avgRatings[] = array( 'AVG_RATING'=> $q->avgRating,
                                        'SPOT_ID'=>$q->SPOT_ID,
                                        'SPOT_NAME'=>$q->SPOT_NAME
                                        
                            );
            }  
            
        }

        return view('showTouristSpot',array('reviews' => $reviews, 'photos' => $photos, 'avgRatings' => $avgRatings));
    }
}
