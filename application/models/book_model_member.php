<?php

class Book_model_member extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


     //ekhane ekta function or procedure hote pare
    
    function get_fine()
    {
        $name=$this->session->userdata('username');

        $this->db->where('USERNAME',$name);
        $query=$this->db->get('MEMBER');


        if($query->num_rows==1)
        {
           foreach ($query->result() as $row)
            {
                $member_id= $row->MEMBER_ID;
            }

        }

        else
        {
                $this->db->where('EMAIL',$name);
                $query=$this->db->get('MEMBER');
                foreach ($query->result() as $row)
                {
                    $member_id= $row->MEMBER_ID;
                }

        }



        $this->db->where('MEMBER_ID',$member_id);
        $query=$this->db->get('FINES');

                foreach ($query->result() as $row)
                {
                    $fine= $row->FINE;
                }

                return $fine;
    }

    function get_member_id()
    {
        $name=$this->session->userdata('username');

        $this->db->where('USERNAME',$name);
        $query=$this->db->get('MEMBER');


        if($query->num_rows==1)
        {
           foreach ($query->result() as $row)
            {
                $member_id= $row->MEMBER_ID;
            }

        }

        else
        {
                $this->db->where('EMAIL',$name);
                $query=$this->db->get('MEMBER');
                foreach ($query->result() as $row)
                {
                    $member_id= $row->MEMBER_ID;
                }

        }

        return $member_id;

    }


}

?>
