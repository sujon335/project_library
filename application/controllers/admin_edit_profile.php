<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Admin_edit_profile extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */
        $this->load->model('book_model');
        $this->load->model('settings_model');
        $is_logged_in=$this->session->userdata('is_logged_in_admin');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }


     }






    function edit_profile()
    {

        $id=$this->book_model->get_librarian_id();
        $this->db->where('ID',$id);
        $query= $this->db->get('LIBRARIAN');
        $data['record']=$query->result();

            $this->load->library('form_validation');
         $this->form_validation->set_rules('email', '', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', '', 'required');
           if ($this->form_validation->run() == FALSE) {

                       $this->load->view('edit_profile_view_admin',$data);
                   }

                   else
                   {
                       if($qu=$this->settings_model->update_admin_info($id))
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

                $id=$this->book_model->get_librarian_id();
                $this->db->where('ID',$id);
                $query= $this->db->get('LIBRARIAN');
                foreach ($query->result() as $row)
                {
                    $p=$row->PASSWORD;
                }

                $c_p=md5($this->input->post('password'));

                 if($p==$c_p)
                 {

                            if($q=$this->settings_model->change_password_admin($id))
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





     function create_librarian()
    {
         $data=array();

            $this->load->library('form_validation');
         $this->form_validation->set_rules('email', '', 'trim|required|valid_email');
        $this->form_validation->set_rules('username', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
           if ($this->form_validation->run() == FALSE) {

                       $this->load->view('validation_error_view');
                   }

                   else
                   {
                       if($qu=$this->settings_model->create_admin())
                       {
                           $data['msg']="Succesfully created";
                          $this->load->view('validation_error_view',$data);
                       }


                   }

    }












}
