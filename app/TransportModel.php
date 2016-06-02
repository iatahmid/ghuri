<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class TransportModel extends Model
{
     
    protected $primaryKey = 'TRANSPORT_ID';
    protected $table = 'transport';
    public $timestamps = false;
    public static function findTransport($type,$from,$to)
    {     
        if($type != "Any")
        {
          if($from == "Any" && $to == "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE T.TYPE = ?
                   ORDER BY T.TRANSPORT_NAME',[$type]); 
                    
          }
    
          elseif($from == "Any" && $to != "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.TO_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$to,$from]); 
                    
          }
    
          elseif($from != "Any" && $to == "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$type]); 
                    
          }
    
          elseif($from != "Any" && $to != "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and I.TO_PLACE =? and T.TYPE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$to,$type]); 
                    
          }
        }
    
        //type == Any
        else
        {
          if($from == "Any" && $to == "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   ORDER BY T.TRANSPORT_NAME');
                    
          }
    
          elseif($from == "Any" && $to != "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.TO_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$to]); 
                    
          }
    
          elseif($from != "Any" && $to == "Any")
          {
              $query =DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$from]); 
                    
          }
    
          elseif($from != "Any" && $to != "Any")
          {
              $query = DB::select('SELECT T.TRANSPORT_NAME, T.TYPE, T.ADDRESS, T.CONTACT_INFO, C.TICKET_PRICE_PER_PERSON, C.TICKET_PRICE_PER_TRIP,
                   I.FROM_PLACE, I.TO_PLACE
                   FROM TRANSPORT T INNER JOIN
                   TRANSPORT_TRIP_CONNECTION C
                   ON(T.TRANSPORT_ID = C.TRANSPORT_ID)
                   INNER JOIN TRIP_INFORMATION I
                   ON(C.TRIP_ID = I.TRIP_ID)
                   WHERE I.FROM_PLACE =? and I.TO_PLACE =?
                   ORDER BY T.TRANSPORT_NAME',[$from,$to]); 
                    
          }
        }
        return $query;
    }
   
}
