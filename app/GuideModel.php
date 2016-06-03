<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class GuideModel extends Model
{
        protected $primaryKey = 'GUIDE_ID';
        protected $table = 'guide';
        public $timestamps = false;   

        public static function getGuideInfo($id)
        {

            $guideInfos = DB::select(
                        'Select G.GUIDE_ID, GUIDE_NAME, CONTACT_INFO, 
                                TS.SPOT_ID as SPOT_ID, TS.SPOT_NAME as SPOT_NAME, 
                                FROM_PLACE, TO_PLACE, FEE
                        from guide G
                        join tourist_spot TS
                        on (G.SPOT_ID = TS.SPOT_ID)
                        join guide_tour_connection GTC
                        on (G.GUIDE_ID = GTC.GUIDE_ID)
                        join tour T
                        on (T.TOUR_ID = GTC.TOUR_ID)
                        where G.GUIDE_ID = ?
                        Order By FROM_PLACE', [$id]
                        );

            return $guideInfos;
        }  
}

?>