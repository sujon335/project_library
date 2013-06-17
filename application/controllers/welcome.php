<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->check();


        $is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
        $is_logged_in_member = $this->session->userdata('is_logged_in_member');


        if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {

            $this->load->view('welcome_message');
        } else if (!isset($is_logged_in_admin) || $is_logged_in_admin != true) {
            $this->load->view('member_page');
        } else {
            redirect('book_list_admin/show_books');
        }
    }

    public function check() {
        $this->load->model('check_model');
        $this->check_model->check_booking_date();
        $this->check_model->update_fine();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */