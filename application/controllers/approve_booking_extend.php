<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Approve_booking_extend extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */

        $is_logged_in=$this->session->userdata('is_logged_in_admin');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }


     }


    public function change_finishing_date($booking_id,$date)
    {

                    $query="UPDATE BOOKING_DATA
              set
              FINISHING_DATE = to_date('$date','dd-mm-yy')
             WHERE BOOKING_ID='$booking_id'";

                    $update=$this->db->query($query);

                    
             $this->db->where('BOOKING_ID',$booking_id);
            $this->db->delete('BOOKING_EXTEND');

        redirect('approve_booking_extend/extend_requests');
        
    }


    public function cancel_request($id)
    {
            $this->db->where('BOOKING_ID',$id);
            $this->db->delete('BOOKING_EXTEND');
           redirect('approve_booking_extend/extend_requests');

    }


    public function extend_requests()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/approve_booking_extend/extend_requests';

            $this->db->join('BOOKING_DATA', 'BOOKING_EXTEND.BOOKING_ID=BOOKING_DATA.BOOKING_ID');
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $this->db->order_by('ID');
            $config['total_rows']=  $this->db->get('BOOKING_EXTEND')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);



            $this->db->join('BOOKING_DATA', 'BOOKING_EXTEND.BOOKING_ID=BOOKING_DATA.BOOKING_ID');
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $this->db->order_by('ID');
            $query= $this->db->get('BOOKING_EXTEND',$config['per_page'],$this->uri->segment(3));
            $data['booking_extend_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('booking_extend_list',$data);

    }









}
