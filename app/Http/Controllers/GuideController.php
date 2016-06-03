<?php

namespace App\Http\Controllers;
use App\GuideModel;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;

use App\Http\Requests;


class GuideController extends Controller
{

    public function getGuideInfo()
    {

        $guide_id = Input::get('id');
        
        $guideResult = GuideModel::getGuideInfo($guide_id);

        //print_r($guideResult);
        $guide_infos = array();
        $guide_basic;
        $i = 0;
        foreach($guideResult as $q)
        {
            $guide_infos[] = array( 
                                    'from' => $q->FROM_PLACE,
                                    'to' => $q->TO_PLACE,
                                    'fee' => $q->FEE
                            );
            
            $guide_basic = array(
                                'id'=>$q->GUIDE_ID,
                                'name'=>$q->GUIDE_NAME,
                                'contact_info'=> $q->CONTACT_INFO,
                                'working_area' => $q->SPOT_NAME,
                                );
            $i++;
        }
        
        return view('results.showGuideDetails',
                        array(  
                                'guideInfos' => $guide_infos,
                                'guide' => $guide_basic
                            ));

    }

}
