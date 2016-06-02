<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class PlaceModel extends Model
{
    protected $primaryKey = 'UPAZILLA_ID';
    protected $table = 'upazilla';
    public $timestamps = false;
   
    
    public static function findUpazillas($districtName)
    {
        return DB::select('select distinct UPAZILLA_NAME from upazilla where DISTRICT_NAME=?',[$districtName]);
    }
    public static function findDistricts($divisionName)
    {
        return DB::select('select distinct DISTRICT_NAME from upazilla where DIVISION_NAME=?',[$divisionName]);
        
        
    
    }
    public static function findSpots($upazillaID)
    {
    
        //echo $upazillaID;
        return DB::select('select distinct SPOT_NAME from tourist_spot where UPAZILLA_ID=?',[$upazillaID]);
       
        
        
    
    }
    /*public static function listPlace()
    {
        $divisions=array("dhaka","chiitagong","rajshahi","sylhet","Barisal","khulna","mymensingh","rangpur");
        foreach($divisions as $division)
        {
            $query=DB::select('select DISTRICT_NAME from upazilla where DIVISION_NAME=?',[$division]);
            $result=array();
            foreach($query as $list)
            {
                $result[]=$list->DISTRICT_NAME;
            }
            $bangladesh[$division]=$result;
            foreach ($bangladesh[$division] as $district)
            {
                $query=DB::select('select UPAZILLA_NAME from upazilla where DISTRICT_NAME=?',[$district]);
                $result2=array();
                foreach($query as $list)
                {
                    $result2[]=$list->UPAZILLA_NAME;
                }
                $bangladesh[$division][$district]=$result2;
            }
            
        }
        foreach($list as $division=>$districts)
        {
            echo $division;
            foreach($districts as $district=>$upazilla )
            {
                echo $upazilla;
            }
        }
        return $bangladesh;
    
    }*/
    
}
?>