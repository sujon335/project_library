<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Member_auth extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
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
            redirect('member_auth/member_page');
        } else {
            $query = $this->authentication_model->validate_member();
            if ($query) {
                $data = array(
                    'username' => $this->input->post('username', true),
                    'is_logged_in_member' => true
                );

                $this->load->library('session');
                $this->session->set_userdata($data);

                 redirect('member_auth/member_page');

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



    function member_page()
    {

        $data = array();


        $config['base_url'] = '' . base_url() . 'index.php/member_auth/member_page';


        $config['total_rows'] = $this->db->get('BOOK')->num_rows();
        $config['per_page'] = 19;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);


        $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
        $data['books'] = $query->result();

        $this->load->view('member_page',$data);
    }

    

}

?>