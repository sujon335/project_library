<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('authentication_model');
    }

    public function login() {






        $is_logged_in_member = $this->session->userdata('is_logged_in_member');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', '', 'trim|required');
        $this->form_validation->set_rules('password', '', 'trim|required');
        if ($this->form_validation->run() == FALSE && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {

            $this->load->view('welcome_message');
        } elseif ($this->form_validation->run() == FALSE && (isset($is_logged_in_member) || $is_logged_in_member == true)) {
            $this->load->view('member_page');
        } else {
            $query = $this->authentication_model->validate_member();
            if ($query) {
                $data = array(
                    'username' => $this->input->post('username', true),
                    'is_logged_in_member' => true
                );

                $this->load->library('session');
                $this->session->set_userdata($data);


                $this->load->view('member_page', $data);
            } else {
                $data['msg'] = "Username and password combination is not in the approved member list";
                $this->load->view('welcome_message', $data);
            }
        }
    }

    function logout() {
        $this->load->library('session');
        $this->session->sess_destroy();
        redirect('');
    }

}

?>