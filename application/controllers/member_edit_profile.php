<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_edit_profile extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */
        $this->load->model('book_model_member');
         $this->load->model('settings_model');

        $is_logged_in=$this->session->userdata('is_logged_in_member');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }


     }





    function edit_profile()
    {

        $this->load->model('book_model_member');
        $member_id=$this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID',$member_id);
        $query= $this->db->get('MEMBER');
        $data['record']=$query->result();

            $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '', 'required');
         $this->form_validation->set_rules('email', '', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact', '', 'required');
        $this->form_validation->set_rules('username', '', 'required');
           if ($this->form_validation->run() == FALSE) {

                       $this->load->view('edit_profile_view',$data);
                   }

                   else
                   {
                       if($qu=$this->settings_model->update_member_info($member_id))
                       {
                           $data['msg']="Succesfully updated";
                          $this->load->view('validation_error_view',$data);
                       }


                   }

    }


     



     function change_password()
     {


       $data=array();
       $this->load->library('form_validation');
       $this->form_validation->set_rules('password','','trim|required');
       $this->form_validation->set_rules('c_password','','trim|required');

       if ($this->form_validation->run() == FALSE) {

           $this->load->view('validation_error_view');

       }

       else {

                $member_id=$this->book_model_member->get_member_id();
                $this->db->where('MEMBER_ID',$member_id);
                $query=$this->db->get('MEMBER');
                foreach ($query->result() as $row)
                {
                    $p=$row->PASSWORD;
                }

                $c_p=md5($this->input->post('password'));

                 if($p==$c_p)
                 {

                            if($q=$this->settings_model->change_password_member($member_id))
                            {
                                $data['msg']="password has been successfully changed";
                                $this->load->view('validation_error_view',$data);
                            }
                            else
                            {
                                echo "error";
                            }
                     }

                    else
                    {
                         $data['msg']="current password didn't match";
                           $this->load->view('validation_error_view',$data);
                    }

                 }

        }












}
