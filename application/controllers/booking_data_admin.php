<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Booking_data_admin extends CI_Controller {

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



      function taken_book($booking_id)
        {

        $query="UPDATE BOOKING_DATA
          set
          TAKEN = 1
         WHERE BOOKING_ID='$booking_id'";

        $update=$this->db->query($query);

            redirect('booking_data_admin/show_booking_data');
        }

      function returned_book($booking_id)
        {

          $this->db->where('BOOKING_ID',$booking_id);
          $this->db->order_by('BOOKING_DATE_TIME');
          $query=$this->db->get('ADVANCE_BOOKING');

          if($query->num_rows>=1){

              foreach ($query->result() as $row) {

                  $member_id=$row->MEMBER_ID;
                  $this->db->where('MEMBER_ID',$member_id);
                  $quer=$this->db->get('BOOKING_DATA');
                  if($quer->num_rows>=4){
                      continue;
                  }

                    $q="UPDATE BOOKING_DATA
                  set
                  MEMBER_ID = '$member_id',
                  BOOKING_DATE = SYSDATE,
                  TAKEN=0,
                  FINISHING_DATE = SYSDATE+14 WHERE BOOKING_ID='$booking_id'";

                $update=$this->db->query($q);

                break;

              }

//            $this->db->where('MEMBER_ID',$member_id);
//            $q=$this->db->get('MEMBER');
//            foreach($q->result() as $row)
//            {
//                $email=$row->EMAIL;
//            }
//
//             $this->advance_booking_mail($email);




          }

          else{

          
            $this->db->where('BOOKING_ID',$booking_id);
            $this->db->delete('BOOKING_DATA');

          }





        redirect('booking_data_admin/show_booking_data');
        
        }




    public function show_booking_data()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/booking_data_admin/show_booking_data';

            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $config['total_rows']=  $this->db->get('BOOKING_DATA')->num_rows();
            $config['per_page']=6;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);

            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $query= $this->db->get('BOOKING_DATA',$config['per_page'],$this->uri->segment(3));
            $data['booking_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('booking_list_admin',$data);

    }


   public function data_search_get()
    {
              $dat = array(
                       'search' =>$this->input->post('search',true)
                   );
                $this->session->set_userdata($dat);
                $this->data_search();

    }

    public function data_search()
    {



        $search=strtolower($this->session->userdata('search'));
        $data=array();



            $config['base_url']=''.base_url().'index.php/booking_data_admin/data_search';

            $this->db->like('LOWER(TITLE)',$search);
            $this->db->or_like('LOWER(EXTENSION_NO)',$search);
            $this->db->or_like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);
            $this->db->or_like('LOWER(FINISHING_DATE)',$search);
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $config['total_rows']=  $this->db->get('BOOKING_DATA')->num_rows();
            $config['per_page']=6;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);


            $this->db->like('LOWER(TITLE)',$search);
            $this->db->or_like('LOWER(EXTENSION_NO)',$search);
            $this->db->or_like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);
            $this->db->or_like('LOWER(FINISHING_DATE)',$search);
            $this->db->join('BOOK', 'BOOKING_DATA.BOOK_ID=BOOK.BOOK_ID');
            $this->db->join('MEMBER', 'BOOKING_DATA.MEMBER_ID=MEMBER.MEMBER_ID');
            $query= $this->db->get('BOOKING_DATA',$config['per_page'],$this->uri->segment(3));
            $data['booking_list']=$query->result();
            $data['num']=$config['total_rows'];


            $this->load->view('booking_list_admin',$data);



    }















       function advance_booking_mail($email)
        {

               $data=array();







                   $base=base_url();

                    $sender_mail="sujon335@yahoo.com";
                    $sender_name="Online Library Management";
                    $subject="Membership Approval confirmation";

                    $message="You have just issued a book from $base
                                which you have requested  advance.please check your issued books section
                                thank you.
                            ";




                    $config=Array(
                    'protocol'=>'smtp',
                    'smtp_host'=>'ssl://smtp.googlemail.com',
                    'smtp_port'=>465,
                    'smtp_user'=>'gkabswebsite@gmail.com',
                    'smtp_pass'=>'gkabswebsitepassword'
                    );
                    $this->load->library('email',$config);
                    $this->email->set_newline("\r\n");

                    $this->email->from($sender_mail,$sender_name);
                    $this->email->to($this->input->post('email'));
                    $this->email->subject($subject);
                    $this->email->message($message);

                    if($this->email->send())
                    {
                        redirect('approve_member/disapproved_members');
                    }
                    else
                    {
                        show_error($this->email->print_debugger());
                    }




        }











}
