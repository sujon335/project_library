<?php

class Registration_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function create_member(){


            $this->db->where('USERNAME',$this->input->post('username',true));
            $q= $this->db->get('MEMBER');
            if($q->num_rows>=1)
            {
                return false;
            }



 
            $NAME=$this->input->post('name',true);
           $EMAIL=$this->input->post('email',true);
            $CONTACT=$this->input->post('contact',true);
            $USERNAME=$this->input->post('username',true);
            $PASSWORD = md5($this->input->post('password',true));

       $query="INSERT INTO MEMBER (MEMBER_ID,NAME,EMAIL,CONTACT,USERNAME,PASSWORD)
               VALUES (SEQ_USER.nextval,'$NAME','$EMAIL','$CONTACT','$USERNAME','$PASSWORD')";

        $insert=$this->db->query($query);
        return $insert;
    }




}