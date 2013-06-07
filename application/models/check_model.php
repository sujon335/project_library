<?php

class Check_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

//cron job
      function check_booking_date(){

               $query="DELETE FROM BOOKING_DATA WHERE TAKEN=0 AND BOOKING_DATE+2<SYSDATE";

               $update=$this->db->query($query);

    }



   function update_fine(){


        $query="SELECT * FROM BOOKING_DATA WHERE FINISHING_DATE < SYSDATE";
        $query=$this->db->query($query);
        
           foreach ($query->result() as $row)
            {
                $member_id=$row->MEMBER_ID;
                $fine=0;
                
                 $q="SELECT * FROM BOOKING_DATA WHERE FINISHING_DATE<SYSDATE AND MEMBER_ID='$member_id'";
                 $q=$this->db->query($q);


                  foreach ($q->result() as $r)
                   {
                    $delay_day=date('d-M-y')-$r->FINISHING_DATE;
                    $fine=$fine+($delay_day*5);

                   }

                 $query="UPDATE FINES
                  set
                  FINE = '$fine'
                     WHERE MEMBER_ID='$member_id'";

                $update=$this->db->query($query);
            }

    }





}

?>
