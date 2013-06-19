<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Approve_member extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->helper('date');
        $this->load->helper('url');
        $this->load->helper('download');
        $this->load->helper(array('form', 'url'));
        $this->load->library('pagination');
        $this->load->database();
        /* ------------------ */
        $this->load->model('book_model');

        $is_logged_in=$this->session->userdata('is_logged_in_admin');
        if (!isset($is_logged_in) || $is_logged_in != TRUE) {

            redirect($base_url);
        }


     }


    public function change_status($member_id)
    {

        $query="UPDATE MEMBER
  set
  STATUS = 1
 WHERE MEMBER_ID='$member_id'";

//        $q="INSERT INTO FINES (ID,MEMBER_ID,FINE)
//               VALUES (SEQ_USER.nextval,'$member_id',0)";
//
//        $insert=$this->db->query($q);
        $update=$this->db->query($query);

//
            $this->db->where('MEMBER_ID',$member_id);
            $q=$this->db->get('MEMBER');
            foreach($q->result() as $row)
            {
                $email=$row->EMAIL;
            }

        $a=$this->approval_mail($email);

        redirect('approve_member/disapproved_members');
        
    }


    public function cancel_request($member_id)
    {
            $this->db->where('MEMBER_ID',$member_id);
            $this->db->delete('MEMBER');
           redirect('approve_member/disapproved_members');

    }


    public function disapproved_members()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/approve_member/disapproved_members';

            $this->db->where('STATUS',0);
            $this->db->order_by('NAME');
            $config['total_rows']=  $this->db->get('MEMBER')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);


            $this->db->where('STATUS',0);
            $this->db->order_by('NAME');

            $query= $this->db->get('MEMBER',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('disapproved_members_list',$data);

    }


    

       function approval_mail($email)
        {

               $data=array();







                   $base=base_url();

                    $sender_mail="sujon335@yahoo.com";
                    $sender_name="Online Library Management";
                    $subject="Membership Approval confirmation";

                    $message="Your membership request for $base
                                has been approved.you can sine in now
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
                    $this->email->to($email);
                    $this->email->subject($subject);
                    $this->email->message($message);

                    if($this->email->send())
                    {
                        return true;
                    }
                    else
                    {
                       return false;
                    }




        }











}
