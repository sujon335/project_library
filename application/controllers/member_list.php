<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Member_list extends CI_Controller {

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



      function member_delete($member_id)
        {
            $this->db->where('MEMBER_ID',$member_id);
            $this->db->delete('MEMBER');
            redirect('member_list/show_members');
        }
    

    public function show_members()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/member_list/show_members';


            $this->db->where('STATUS',1);
            $config['total_rows']=  $this->db->get('MEMBER')->num_rows();
            $config['per_page']=6;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';

            $this->pagination->initialize($config);

         
            $this->db->where('STATUS',1);
            $query= $this->db->get('MEMBER',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('member_list_view_admin',$data);

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



            $config['base_url']=''.base_url().'index.php/member_list/member_search';


            $this->db->like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(USERNAME)',$search);
            $this->db->or_like('LOWER(EMAIL)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);
            
             $this->db->where('STATUS',1);
            $config['total_rows']=  $this->db->get('MEMBER')->num_rows();
            $config['per_page']=6;
            $config['num_links']=20;
            $config['full_tag_open']='<div id="pagination">';
            $config['full_tag_close']='</div>';


            $this->pagination->initialize($config);


            $this->db->like('LOWER(NAME)',$search);
            $this->db->or_like('LOWER(USERNAME)',$search);
            $this->db->or_like('LOWER(EMAIL)',$search);
            $this->db->or_like('LOWER(LIBRARY_CARD_NO)',$search);

             $this->db->where('STATUS',1);
            $query= $this->db->get('MEMBER',$config['per_page'],$this->uri->segment(3));
            $data['member_list']=$query->result();
            $data['num']=$config['total_rows'];


        $this->load->view('member_list_view_admin',$data);



    }

  







}
