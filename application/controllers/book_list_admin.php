<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Book_list_admin extends CI_Controller {

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




    public function add_book()
    {
      $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '', 'required');
         $this->form_validation->set_rules('author', '', 'required');
        $this->form_validation->set_rules('extension_no', '', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('add_book_view');

        } else {



                              if ($this->book_model->create_book())
                                {
                                    redirect('book_list_admin/show_books');
                                    
                                }
                            else {
                                    $data['msg'] = "username already exists try another username";
                                    $this->load->view('registration_view',$data);

                            }



        }

    }



    public function book_edit($book_id)
    {

         $this->db->where('BOOK_ID',$book_id);
        $q=$this->db->get('BOOK');
        $data['record']=$q->result();

      $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '', 'required');
         $this->form_validation->set_rules('author', '', 'required');
        $this->form_validation->set_rules('extension_no', '', 'required');
           if ($this->form_validation->run() == FALSE) {

                       $this->load->view('edit_book_view',$data);
                   }

                   else
                   {
                       if($query=$this->book_model->update_book($book_id))
                       {
                            redirect('book_list_admin/show_books');
                       }

                       else{
                           echo "error while updating";
                       }
                   }


    }

      function book_delete($book_id)
        {
            $this->db->where('BOOK_ID',$book_id);
            $this->db->delete('BOOK');
            redirect('book_list_admin/show_books');
        }
    

    public function show_books()
    {


        $data=array();


            $config['base_url']=''.base_url().'index.php/book_list_admin/show_books';

            $this->db->order_by('TITLE');

            $config['total_rows']=  $this->db->get('BOOK')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;



            $this->pagination->initialize($config);

            $this->db->order_by('TITLE');

            $query= $this->db->get('BOOK',$config['per_page'],$this->uri->segment(3));
            $data['book_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('book_list_view_admin',$data);

    }



    public function book_search_get()
    {
              $dat = array(
                       'search_typ' =>$this->input->post('search_type',true),
                       'search' =>$this->input->post('search',true)
                   );
                $this->session->set_userdata($dat);
                $this->book_search();

    }

    public function book_search()
    {


//        $search_type=  $this->input->post('search_type',true);
//        $search=  $this->input->post('search',true);
        $search=strtolower($this->session->userdata('search'));
        $search_type=$this->session->userdata('search_typ');
        $data=array();


        if($search_type=="all")
        {

            $config['base_url']=''.base_url().'index.php/book_list_admin/book_search';


            $this->db->like('LOWER(TITLE)',$search);
            $this->db->or_like('LOWER(AUTHOR)',$search);
            $this->db->or_like('LOWER(KEYWORD)',$search);
            $this->db->or_like('LOWER(CATEGORY)',$search);
            $this->db->or_like('LOWER(PUBLISHER)',$search);
            $config['total_rows']=  $this->db->get('BOOK')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;



            $this->pagination->initialize($config);


            $this->db->like('LOWER(TITLE)',$search);
            $this->db->or_like('LOWER(AUTHOR)',$search);
            $this->db->or_like('LOWER(KEYWORD)',$search);
            $this->db->or_like('LOWER(CATEGORY)',$search);
            $this->db->or_like('LOWER(PUBLISHER)',$search);
            $query= $this->db->get('BOOK',$config['per_page'],$this->uri->segment(3));
            $data['book_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('book_list_view_admin',$data);

        }

        else {



            $config['base_url']=''.base_url().'index.php/book_list_admin/book_search';

            
            $this->db->like("LOWER($search_type)",$search);
            $config['total_rows']=  $this->db->get('BOOK')->num_rows();
            $config['per_page']=7;
            $config['num_links']=20;



            $this->pagination->initialize($config);


            $this->db->like("LOWER($search_type)",$search);
            $query= $this->db->get('BOOK',$config['per_page'],$this->uri->segment(3));
            $data['book_list']=$query->result();
            $data['num']=$config['total_rows'];


           $this->load->view('book_list_view_admin',$data);


        }

    }









}
