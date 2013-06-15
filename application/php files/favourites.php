<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Favourites extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->helper('date');
		$this->load->library('image_lib');
        $this->load->helper('url');
        $this->load->model('favourites_model');
		$this->load->helper(array('form', 'url'));
		$is_logged_in_user=$this->session->userdata('is_logged_in_user');
        if (!isset($is_logged_in_user) || $is_logged_in_user != TRUE)  {

            redirect();

        }

    }
	public function user_favourites(){
	$this->db->join('RECIPE','FAVOURITES.RECIPE_ID=RECIPE.RECIPE_ID');
	$this->db->where('USER_NAME',$this->session->userdata('username'));
	
	 $q=$this->db->get('FAVOURITES');
	if($q)
	$data['record']=$q->result();
	        $this->load->view('favourites_view',$data);
	}
	public function add_to_favourites()
	{
	$this->db->where('USER_NAME',$this->session->userdata('username'));
	$this->db->where('RECIPE_ID',$_GET['id']);
	$this->db->from('FAVOURITES');
	$count=$this->db->count_all_results();
	
	
	if($count==0)
	{
	$data['recipe_id']=$_GET['id'];
	$data['user_name']=$this->session->userdata('username');
	$query=$this->favourites_model->save_favourites($data);
	if($query)
	$this->user_favourites();
	else
	echo "unsuccessful database insertion.";
	}
	else
	$this->user_favourites();
	}
	}