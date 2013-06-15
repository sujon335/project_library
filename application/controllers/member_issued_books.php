<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_issued_books extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */
        $this->load->model('book_model_member');
        $is_logged_in=$this->session->userdata('is_logged_in_member');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }


     }










     public function show_fine()
     {

        $data=array();
        $member_id=$this->book_model_member->get_member_id();
        $this->db->where('MEMBER_ID',$member_id);
        $query= $this->db->get('FINES');
        foreach ($query->result() as $row)
        {
          $fine= $row->FINE;
        }

        $data['num']=$fine;
        $this->load->view('fine_of_member',$data);

     }









    public function show_books()
    {


        $data=array();
        $member_id=$this->book_model_member->get_member_id();


            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->where('MEMBER_ID',$member_id);
            $config['total_rows']=  $this->db->get('BOOKING_DATA')->num_rows();


            
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->where('MEMBER_ID',$member_id);
            $query= $this->db->get('BOOKING_DATA');
            $data['booking_list']=$query->result();
            $data['num']=$config['total_rows'];



            $this->db->join('BOOKING_DATA','ADVANCE_BOOKING.BOOKING_ID=BOOKING_DATA.BOOKING_ID');
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->where('ADVANCE_BOOKING.MEMBER_ID',$member_id);
            $query= $this->db->get('ADVANCE_BOOKING');
            $data['adv_booking_list']=$query->result();
            $data['n']=$query->num_rows;



           $this->load->view('issued_book_list',$data);

    }






    function extend_booking($booking_id){

        $date=$this->input->post('booking_extend_date',true);

        $this->db->where('BOOKING_ID',$booking_id);
        $q=$this->db->get('BOOKING_EXTEND');


        if($q->num_rows==1)
        {
                    $query="UPDATE BOOKING_EXTEND
              set
              EXTEND_DATE = to_date('$date','dd-mm-yy')
             WHERE BOOKING_ID='$booking_id'";

                    $update=$this->db->query($query);
        }
        
         else {



               $query="INSERT INTO BOOKING_EXTEND (ID,BOOKING_ID,EXTEND_DATE)
               VALUES (SEQ_USER.nextval,'$booking_id',to_date('$date','dd-mm-yy'))";

                 $insert=$this->db->query($query);

         }

        redirect('member_issued_books/show_books');

    }









}
