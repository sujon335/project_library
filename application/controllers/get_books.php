<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Get_books extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */
        $this->load->model('book_model_member');

        $is_logged_in_admin = $this->session->userdata('is_logged_in_admin');
        $is_logged_in_member = $this->session->userdata('is_logged_in_member');

        if ((!isset($is_logged_in_admin) || $is_logged_in_admin != true) && (!isset($is_logged_in_member) || $is_logged_in_member != true)) {
            //NOT
            redirect($base_url);
        }
    }

    public function show_books_by_category($category) {


        $data = array();


        $config['base_url'] = "" . base_url() . "index.php/get_books/show_books_by_category/$category";

        $category=urldecode($category);

        $this->db->where('CATEGORY', $category);
        $config['total_rows'] = $this->db->get('BOOK')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);



         $this->db->where('CATEGORY', $category);
        $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
        $data['book_list'] = $query->result();
        $data['num'] = $config['total_rows'];

        $data['fine'] = $this->book_model_member->get_fine();
        $q = $this->db->get('BOOKING_DATA');
        $data['record'] = $q->result();


        $member_id = $this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID', $member_id);
        $qu = $this->db->get('BOOKING_DATA');
        $data['issued_books'] = $qu->result();
        $data['n'] = $qu->num_rows();




        $this->db->where('MEMBER_ID', $member_id);
        $que = $this->db->get('ADVANCE_BOOKING');
        $data['adv_book'] = $que->result();




        $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
        $data['cats'] = $s->result();
        $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
        $data['author'] = $t->result();
        $this->load->view('book_list_view_member', $data);


    }



    public function show_books_by_author($author) {


        $data = array();


        $config['base_url'] = "" . base_url() . "index.php/get_books/show_books_by_author/$author";


        $author=urldecode($author);
        $this->db->where('AUTHOR', $author);
        $config['total_rows'] = $this->db->get('BOOK')->num_rows();
        $config['per_page'] = 10;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);



         $this->db->where('AUTHOR', $author);
        $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
        $data['book_list'] = $query->result();
        $data['num'] = $config['total_rows'];

        $data['fine'] = $this->book_model_member->get_fine();
        $q = $this->db->get('BOOKING_DATA');
        $data['record'] = $q->result();


        $member_id = $this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID', $member_id);
        $qu = $this->db->get('BOOKING_DATA');
        $data['issued_books'] = $qu->result();
        $data['n'] = $qu->num_rows();




        $this->db->where('MEMBER_ID', $member_id);
        $que = $this->db->get('ADVANCE_BOOKING');
        $data['adv_book'] = $que->result();




        $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
        $data['cats'] = $s->result();
        $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
        $data['author'] = $t->result();
        $this->load->view('book_list_view_member', $data);


    }


      public function show_books_by_id($id) {


        $data = array();


        $config['base_url'] = '' . base_url() . 'index.php/get_books/show_books_by_id';


        $this->db->where('BOOK_ID', $id);
        $config['total_rows'] = $this->db->get('BOOK')->num_rows();
        $config['per_page'] = 6;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);



        $this->db->where('BOOK_ID', $id);
        $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
        $data['book_list'] = $query->result();
        $data['num'] = $config['total_rows'];

        $data['fine'] = $this->book_model_member->get_fine();
        $q = $this->db->get('BOOKING_DATA');
        $data['record'] = $q->result();


        $member_id = $this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID', $member_id);
        $qu = $this->db->get('BOOKING_DATA');
        $data['issued_books'] = $qu->result();
        $data['n'] = $qu->num_rows();




        $this->db->where('MEMBER_ID', $member_id);
        $que = $this->db->get('ADVANCE_BOOKING');
        $data['adv_book'] = $que->result();




        $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
        $data['cats'] = $s->result();
        $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
        $data['author'] = $t->result();
        $this->load->view('book_list_view_member', $data);


    }




}
