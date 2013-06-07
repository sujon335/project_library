<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Approve_member extends CI_Controller {

    public function __construct() {
         parent::__construct();

        $this->load->library('pagination');
        $this->load->database();
        $this->load->helper('url');
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



            $this->pagination->initialize($config);


            $this->db->where('STATUS',0);
            $this->db->order_by('NAME');

            $query= $this->db->get('MEMBER',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('disapproved_members_list',$data);

    }









}
