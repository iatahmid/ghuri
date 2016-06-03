<?php

namespace App\Http\Controllers;
use App\TouristSpotModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

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
                $reviews[] = array( 'SPOT_ID'=>$q->SPOT_ID,
                                    'SPOT_NAME'=>$q->SPOT_NAME,
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

        return view('results.showTouristSpot',array('reviews' => $reviews, 'photos' => $photos, 'avgRatings' => $avgRatings));
    }

    public function getSpotInfo()
    {
        $spot_id = Input::get('id');
        
        $photoResult = TouristSpotModel::getPhotos($spot_id);
        $reviewResult = TouristSpotModel::getReviews($spot_id);
        $avgRatingResult = TouristSpotModel::getAvgRating($spot_id);
        $guideResult = TouristSpotModel::getGuides($spot_id);


        $photos = array();
        $spot_name = "";
        foreach($photoResult as $q)
        {
            $photos[] = array( 'SPOT_NAME'=>$q->SPOT_NAME,
                                'PHOTO_FILE'=> $q->PHOTO_FILE, 
                                'UPLOADER'=>$q->name
                            );
            $spot_name = $q->SPOT_NAME;
        }        
        //print_r($photos);

        $reviews = array();
        foreach($reviewResult as $q)
        {
            $reviews[] = array( 'SPOT_NAME'=>$q->SPOT_NAME,
                                'REVIEWER'=>$q->name,
                                'DESCRIPTION'=> $q->DESCRIPTION, 
                                'RATING'=>$q->RATING
                            );
        }

        $rating = array();
        foreach($avgRatingResult as $q)
        {
            $rating['avg'] = $q->avgRating;
        }

        $guides = array();
        foreach($guideResult as $q)
        {
            $guides[] = array( 'id'=>$q->GUIDE_ID,
                                'name'=>$q->GUIDE_NAME,
                                'contact_info'=> $q->CONTACT_INFO
                            );
        }
        
        return view('results.showTouristSpotDetails',
                        array(  'photos' => $photos,
                                'reviews' => $reviews, 
                                'avgRating' => $rating,
                                'guides' => $guides,
                                'spot' => $spot_name));

    }
}
