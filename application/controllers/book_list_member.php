<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Book_list_member extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */
        $this->load->model('book_model_member');

        $is_logged_in = $this->session->userdata('is_logged_in_member');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }
    }

    public function show_books() {


        $data = array();


        $config['base_url'] = '' . base_url() . 'index.php/book_list_member/show_books';


        $this->db->order_by('CATEGORY');

        $config['total_rows'] = $this->db->get('BOOK')->num_rows();
        $config['per_page'] = 8;
        $config['num_links'] = 20;
        $config['full_tag_open'] = '<div id="pagination">';
        $config['full_tag_close'] = '</div>';


        $this->pagination->initialize($config);



        $this->db->order_by('CATEGORY');

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

    public function book_search_get() {
        $dat = array(
            'search_typ' => $this->input->post('search_type', true),
            'search' => $this->input->post('search', true)
        );
        $this->session->set_userdata($dat);
        $this->book_search();
    }

    public function book_search() {


//        $search_type=  $this->input->post('search_type',true);
//        $search=  $this->input->post('search',true);
        $search = strtolower($this->session->userdata('search'));
        $search_type = $this->session->userdata('search_typ');
        $data = array();


        if ($search_type == "all") {

            $config['base_url'] = '' . base_url() . 'index.php/book_list_member/book_search';


            $this->db->like('LOWER(TITLE)', $search);
            $this->db->or_like('LOWER(AUTHOR)', $search);
            $this->db->or_like('LOWER(KEYWORD)', $search);
            $this->db->or_like('LOWER(CATEGORY)', $search);
            $this->db->or_like('LOWER(PUBLISHER)', $search);
            $config['total_rows'] = $this->db->get('BOOK')->num_rows();
            $config['per_page'] = 6;
            $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="pagination">';
            $config['full_tag_close'] = '</div>';


            $this->pagination->initialize($config);


            $this->db->like('LOWER(TITLE)', $search);
            $this->db->or_like('LOWER(AUTHOR)', $search);
            $this->db->or_like('LOWER(KEYWORD)', $search);
            $this->db->or_like('LOWER(CATEGORY)', $search);
            $this->db->or_like('LOWER(PUBLISHER)', $search);

//            $this->db->join('BOOKING_DATA', 'BOOK.BOOK_ID=BOOKING_DATA.BOOK_ID');
            $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
            $data['book_list'] = $query->result();
            $data['num'] = $config['total_rows'];
            $data['fine'] = $this->book_model_member->get_fine();
            $q = $this->db->get('BOOKING_DATA');
            $data['record'] = $q->result();




            $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
            $data['cats'] = $s->result();
            $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
            $data['author'] = $t->result();
            $this->load->view('book_list_view_member', $data);
        } else {



            $config['base_url'] = '' . base_url() . 'index.php/book_list_member/book_search';


            $this->db->like("LOWER($search_type)", $search);
            $config['total_rows'] = $this->db->get('BOOK')->num_rows();
            $config['per_page'] = 7;
            $config['num_links'] = 20;
            $config['full_tag_open'] = '<div id="pagination">';
            $config['full_tag_close'] = '</div>';


            $this->pagination->initialize($config);

//            $this->db->join('BOOKING_DATA', 'BOOK.BOOK_ID=BOOKING_DATA.BOOK_ID');
            $this->db->like("LOWER($search_type)", $search);
            $query = $this->db->get('BOOK', $config['per_page'], $this->uri->segment(3));
            $data['book_list'] = $query->result();
            $data['num'] = $config['total_rows'];
            $data['fine'] = $this->book_model_member->get_fine();
            $q = $this->db->get('BOOKING_DATA');
            $data['record'] = $q->result();



            $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
            $data['cats'] = $s->result();
            $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
            $data['author'] = $t->result();
            $this->load->view('book_list_view_member', $data);
        }
    }

    function issue_book($book_id) {

        $member_id = $this->book_model_member->get_member_id();

        $query = "INSERT INTO BOOKING_DATA (BOOKING_ID,BOOK_ID,MEMBER_ID,BOOKING_DATE,FINISHING_DATE)
               VALUES (SEQ_USER.nextval,'$book_id','$member_id',SYSDATE,SYSDATE+14)";

        $insert = $this->db->query($query);

        if (!$insert) {
            $data['msg'] = "Booking failed!!!Yoy have already booked 4 books";

            $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
            $data['cats'] = $s->result();
            $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
            $data['author'] = $t->result();
            $this->load->view('validation_error_view', $data);
        } else {
            $data['msg'] = "Successfully booked";

            $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
            $data['cats'] = $s->result();
            $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
            $data['author'] = $t->result();
            $this->load->view('validation_error_view', $data);
        }
    }

    function advance_book($booking_id) {

        $member_id = $this->book_model_member->get_member_id();

        $query = "INSERT INTO ADVANCE_BOOKING (ID,BOOKING_ID,MEMBER_ID,BOOKING_DATE_TIME)
               VALUES (SEQ_USER.nextval,'$booking_id','$member_id',CURRENT_TIMESTAMP)";

        $insert = $this->db->query($query);

        $s = $this->db->query('SELECT DISTINCT CATEGORY FROM BOOK');
        $data['cats'] = $s->result();
        $t = $this->db->query('SELECT DISTINCT AUTHOR FROM BOOK');
        $data['author'] = $t->result();
        $data['msg'] = "Successfully advance booked";
        $this->load->view('validation_error_view', $data);
    }

}
