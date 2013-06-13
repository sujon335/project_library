<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_fines extends CI_Controller {

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



      function clear_fine($member_id)
        {

        $query="UPDATE FINES
          set
          FINE = 0
         WHERE MEMBER_ID='$member_id'";

        $update=$this->db->query($query);

         $q="DELETE FROM BOOKING_DATA WHERE FINISHING_DATE<SYSDATE AND MEMBER_ID='$member_id'";
         $q=$this->db->query($q);
            redirect('member_fines/show_fines');
        }
    

    public function show_fines()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/member_fines/show_fines';

            $this->db->where('FINE >',0);
            $this->db->join('MEMBER', 'FINES.MEMBER_ID=MEMBER.MEMBER_ID');
            $config['total_rows']=  $this->db->get('FINES')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);
            
            $this->db->where('FINE >',0);
            $this->db->join('MEMBER', 'FINES.MEMBER_ID=MEMBER.MEMBER_ID');

            $query= $this->db->get('FINES',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('member_fines_list',$data);

    }


   public function member_search_get()
    {
              $dat = array(
                       'search' =>$this->input->post('search',true)
                   );
                $this->session->set_userdata($dat);
                $this->member_search();

    }

    public function member_search()
    {



        $search=strtolower($this->session->userdata('search'));
        $data=array();



            $config['base_url']=''.base_url().'index.php/member_fines/member_search';


            $this->db->like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(USERNAME)',$search);
            $this->db->or_like('LOWER(EMAIL)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);
            $this->db->join('MEMBER', 'FINES.MEMBER_ID=MEMBER.MEMBER_ID');
            $config['total_rows']=  $this->db->get('FINES')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);


            $this->db->like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(USERNAME)',$search);
            $this->db->or_like('LOWER(EMAIL)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);
            $this->db->join('MEMBER', 'FINES.MEMBER_ID=MEMBER.MEMBER_ID');
            $query= $this->db->get('FINES',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


          $this->load->view('member_fines_list',$data);

  

    }

  






}
