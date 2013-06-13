<?php

class Authentication_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function validate_admin()
    {
        $this->db->where('USERNAME',$this->input->post('username',true));
        $this->db->where('PASSWORD', md5($this->input->post('password',true)));
        $query=$this->db->get('LIBRARIAN');


        $this->db->where('EMAIL',$this->input->post('username',true));
        $this->db->where('PASSWORD', md5($this->input->post('password',true)));
        $q=$this->db->get('LIBRARIAN');


        if($query->num_rows==1 || $q->num_rows==1)
        {

            return true;
        }
    }

    function validate_member()
    {
        $this->db->where('STATUS',1);
        $this->db->where('USERNAME',$this->input->post('username',true));
        $this->db->where('PASSWORD', md5($this->input->post('password',true)));
        $query=$this->db->get('MEMBER');


        $this->db->where('STATUS',1);
        $this->db->where('EMAIL',$this->input->post('username',true));
        $this->db->where('PASSWORD',  md5($this->input->post('password',true)));
        $q=$this->db->get('MEMBER');


        if($query->num_rows==1 || $q->num_rows==1)
        {

            return true;
        }

    }





    

}

?>
