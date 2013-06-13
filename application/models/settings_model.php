<?php

class Settings_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    function create_admin()
    {

            $USERNAME=$this->input->post('username',true);
            $EMAIL=$this->input->post('email',true);
            $PASSWORD= md5($this->input->post('password'));

             $query="INSERT INTO LIBRARIAN (ID,USERNAME,EMAIL,PASSWORD)
               VALUES (SEQ_USER.nextval,'$USERNAME','$EMAIL','$PASSWORD')";

        

        $insert=$this->db->query($query);
        return $insert;
    }


        function change_password_admin($id)
        {


            $new_pass=array(
                'PASSWORD'=>md5($this->input->post('c_password'))
            );
            $this->db->where('ID',$id);
            $update=$this->db->update('LIBRARIAN',$new_pass);

            return $update;

         }


        function change_password_member($member_id)
        {


            $new_pass=array(
                'PASSWORD'=>md5($this->input->post('c_password'))
            );
            $this->db->where('MEMBER_ID',$member_id);
            $update=$this->db->update('MEMBER',$new_pass);

            return $update;

         }


         function update_admin_info($id)
         {

           $EMAIL=$this->input->post('email',true);
            $USERNAME=$this->input->post('username',true);


                   $query="UPDATE LIBRARIAN
              set
              EMAIL = '$EMAIL',
              USERNAME = '$USERNAME'
                 WHERE ID='$id'";



        $update=$this->db->query($query);

               $data = array(
           'username' =>$this->input->post('username',true),
           'is_logged_in_admin' =>true
       );

     $this->session->set_userdata($data);


        return $update;
        }


        function update_member_info($member_id)
        {

           $NAME=$this->input->post('name',true);
           $EMAIL=$this->input->post('email',true);
            $CONTACT=$this->input->post('contact',true);
            $USERNAME=$this->input->post('username',true);


                   $query="UPDATE MEMBER
              set
              NAME = '$NAME',
              EMAIL = '$EMAIL',
            CONTACT = '$CONTACT',
              USERNAME = '$USERNAME'
                 WHERE MEMBER_ID='$member_id'";



        $update=$this->db->query($query);

               $data = array(
           'username' =>$this->input->post('username',true),
           'is_logged_in_member' =>true
       );

     $this->session->set_userdata($data);


        return $update;
        }



    
}