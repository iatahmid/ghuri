<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FestivalModel extends Model
{
    protected $primaryKey = 'FESTIVAL_ID';
    protected $table = 'festival';
    public $timestamps = false;
    
    //festival search is of two types. 1. will give fest name as input.
    //2. will give fest_type,div, district,upazilla,month,year as input.
    //$festival_name = "Any"; //value can be "Any"
    
    //$festival_type ="RELIGIOUS" ; //value can be "Any"
    //$division= "CHITTAGONG"; //value can be "Any"
    //$district= "BANDORBAN "; //value can be "Any"
    //$upazilla= "RUMA"; //value can be "Any"
    //$month = 10;
    public function selectQuery($festival_name, $festival_type, $month, $monthInt, $division, $district, $upazilla)
    {
        if($festival_type != "Any"){
    
            if($festival_name!= "")
            {
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE, FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.FESTIVAL_NAME =?
                ORDER BY F.FROM_DATE',[$festival_name]);
                
            }
            
            elseif($upazilla!= "Any")
            {
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE, FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.festival_type =?and U.upazilla_name =? and (F.month_of_occurence =?
                or month(F.from_date) = ?
                or month(F.to_date) = ?
                )
                ORDER BY F.FROM_DATE',[$festival_type,$upazilla,$month,$monthInt,$monthInt])
                ;
               
               
            }
            elseif($district!= "Any" )
            {
                
                $query =DB::select('select FESTIVAL_NAME, DESCRIPTION,FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.festival_type=? and U.district_name =?
                and (F.month_of_occurence =?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )
                ORDER BY F.FROM_DATE',[$festival_type,$district,$month,$monthInt,$monthInt])
                ;
               
            }
            elseif ($division != "Any" )
            {
                 $query =DB::select('select FESTIVAL_NAME, DESCRIPTION,FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.festival_type =? and U.division_name = ? and (F.month_of_occurence =?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )ORDER BY F.FROM_DATE',[$festival_type,$division,$month,$monthInt,$monthInt])
                ;
                
            }
            else
            {
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.festival_type = ? and (F.month_of_occurence = ?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )ORDER BY F.FROM_DATE',[$festival_type,$month,$monthInt,$monthInt])
                ;    
            }
        }
    
    else{
            if($festival_name!= "")
            {
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE, FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where F.FESTIVAL_NAME =?
                ORDER BY F.FROM_DATE',[$festival_name])
                ;       
            }
            
            elseif($upazilla!= "Any")
            {
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE, FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where U.upazilla_name = ? and (F.month_of_occurence =?
                or month(F.from_date) = ?
                or month(F.to_date) = ?
                )
                ORDER BY F.FROM_DATE',[$upazilla,$month,$monthInt,$monthInt])
                ;
               
               
            }
            elseif($district!= "Any" )
            {
                
                $query = DB::select('select FESTIVAL_NAME, DESCRIPTION,FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where U.district_name = ?
                and (F.month_of_occurence = ?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )
                ORDER BY F.FROM_DATE',[$district,$month,$monthInt,$monthInt]);
               
            }
            elseif ($division != "Any" )
            {
                 $query = DB::select('select FESTIVAL_NAME, DESCRIPTION,FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where U.division_name = ? and (F.month_of_occurence = ?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )ORDER BY F.FROM_DATE',[$division,$month,$monthInt,$monthInt])
                ;
                
            }
            else
            {
                 $query = DB::select('select FESTIVAL_NAME, DESCRIPTION, FESTIVAL_TYPE , FROM_DATE, TO_DATE, MONTH_OF_OCCURENCE, UPAZILLA_NAME, DISTRICT_NAME, DIVISION_NAME
                from festival F
                inner join upazilla_festival_connection C
                on (F.festival_id  = C.festival_ID)
                inner join upazilla U
                on(U.upazilla_id = C.upazilla_id )
                where (F.month_of_occurence = ?
                or month(F.from_date) =?
                or month(F.to_date) =?
                )ORDER BY F.FROM_DATE',[$month,$monthInt,$monthInt])
                ;    
            }   
        }

    return $query;
    }
}
