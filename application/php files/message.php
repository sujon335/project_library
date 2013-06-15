<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
		public function __construct() {
        parent::__construct();
		$this->load->database();
		$this->load->helper('date');
        $this->load->helper('url');
		$this->load->model('message_model');
		$this->load->helper('download');
		
		$this->load->helper(array('form', 'url'));
		$is_logged_in_user=$this->session->userdata('is_logged_in_user');
        if (!isset($is_logged_in_user) || $is_logged_in_user != TRUE)  {

            redirect();

        }
    }
	public function send_message($student_id)
	{
	  $this->db->where('student_id',$student_id);
	  $q=$this->db->get('student_info');

            foreach($q->result() as $row)
            {
				$data['sender_mail']=$row->email;
            }
	$this->load->view('send_message_view',$data);
	}
	
	public function send_message_new()
	{
	$this->load->view('send_message_view');
	}
	
	public function save_message()
	{           
	$this->load->library('form_validation');
        $this->form_validation->set_rules('reciever_mail', '', 'trim|required');
       
      
        if ($this->form_validation->run() == FALSE) {
		      $data['msg']="Please try again";
              $this->load->view('registration_view',$data);
        }
		else
		{
            $config = array(
                'upload_path' => dirname($_SERVER["SCRIPT_FILENAME"])."/attachment/",
                'upload_url' => base_url()."attachment/",
                'allowed_types' => "gif|jpg|png|jpeg|pdf|doc|xml",
                'overwrite' => TRUE,
                'max_size' => "1000KB",
                'max_height' => "768",
                'max_width' => "1024"
				);
                $datestring = "%Y-%m-%d  %h:%i:%s";
		        $time = time();
	  $student_id=$this->session->userdata('student_id');
	  $this->db->where('student_id',$student_id);
	  $q=$this->db->get('student_info');

            foreach($q->result() as $row)
            {
                $sender_name=$row->student_name;
				$sender_mail=$row->email;
            }
                $this->load->library('upload',$config);
                if($this->upload->do_upload()){
				$this->upload->display_errors();
                    $tmp = $this->upload->data();
                    $data['sender_id']=$this->session->userdata('student_id');
					$data['sender_name']=$sender_name;
					$data['sender_mail']=$sender_mail;
					$data['subject']=$this->input->post('subject');
					$data['message']=$this->input->post('message');
					$data['attach_path']='/attachment/'.$tmp['file_name'];
					$data['reciever_mail']=$this->input->post('reciever_mail');
					$data['date']=mdate($datestring, $time);
					$this->message_model->save_message($data);
					//sending mail
			$this->db->where('student_id',$this->session->userdata('student_id'));

            $q=$this->db->get('student_info');

            foreach($q->result() as $row)
            {
                $sender_mail=$row->email;
				$sender_name=$row->student_name;
            }
	$config2=Array(
	'protocol'=>'smtp',
	'smtp_host'=>'ssl://smtp.googlemail.com',
	'smtp_port'=>465,
	'smtp_user'=>'gkabswebsite@gmail.com',
	'smtp_pass'=>'gkabswebsitepassword'
	);
	$this->load->library('email',$config2);
	$this->email->set_newline("\r\n");
	
	$this->email->from($sender_mail,$sender_name);
	$this->email->to($this->input->post('reciever_mail'));
	$this->email->subject($this->input->post('subject'));
	$this->email->message($this->input->post('message'));
	$file=dirname($_SERVER["SCRIPT_FILENAME"]).'/attachment/'.$tmp['file_name'];
	$this->email->attach($file);
	if($this->email->send())
	{
	echo 'your email sent';
	}
	else
	{
	show_error($this->email->print_debugger());
	}
	//sending mail*/
					$this->load->view('send_message_view',$data);
                }
				else {
				//$tmp = $this->upload->data();
                    $data['sender_id']=$this->session->userdata('student_id');
					$data['sender_name']=$sender_name;
					$data['sender_mail']=$sender_mail;
					$data['subject']=$this->input->post('subject');
					$data['message']=$this->input->post('message');
					//$data['attach_path']='/attachment/'.$tmp['file_name'];
					$data['reciever_mail']=$this->input->post('reciever_mail');
					$data['date']=mdate($datestring, $time);
					$this->message_model->save_message($data);
					//sending mail
			$this->db->where('student_id',$this->session->userdata('student_id'));

            $q=$this->db->get('student_info');

            foreach($q->result() as $row)
            {
                $sender_mail=$row->email;
				$sender_name=$row->student_name;
            }
	$config2=Array(
	'protocol'=>'smtp',
	'smtp_host'=>'ssl://smtp.googlemail.com',
	'smtp_port'=>465,
	'smtp_user'=>'gkabswebsite@gmail.com',
	'smtp_pass'=>'gkabswebsitepassword'
	);
	$this->load->library('email',$config2);
	$this->email->set_newline("\r\n");
	
	$this->email->from($sender_mail,$sender_name);
	$this->email->to($this->input->post('reciever_mail'));
	$this->email->subject($this->input->post('subject'));
	$this->email->message($this->input->post('message'));
	$file=dirname($_SERVER["SCRIPT_FILENAME"]).'/attachment/'.$tmp['file_name'];
	$this->email->attach($file);
	if($this->email->send())
	{
	echo 'your email sent';
	}
	else
	{
	show_error($this->email->print_debugger());
	}
	//sending mail
					$this->load->view('send_message_view',$data);
				}
			}

	}
	
	
	public function inbox_message()
	{
	  $student_id=$this->session->userdata('student_id');
	  $this->db->where('student_id',$student_id);
	   $q=$this->db->get('student_info');

            foreach($q->result() as $row)
            {
                $reciever_mail=$row->email;
				
            }
	$this->load->library('pagination');

                $config['base_url']=''.base_url().'index.php/message/inbox_message';
				$this->db->where('reciever_mail',$reciever_mail);
				//$this->db->group_by('reciever_mail');
				$this->db->order_by('date','desc');
				$config['total_rows']=  $this->db->get('message')->num_rows();
                $config['per_page']=10;
                $config['num_links']=200;

            $this->pagination->initialize($config);	 
	        $this->db->where('reciever_mail',$reciever_mail);
			//$this->db->group_by('reciever_mail');
	        $this->db->order_by('date','desc');
	        $query= $this->db->get('message',$config['per_page'],$this->uri->segment(3));
	        $data['record']=$query->result();
	        $this->load->view('inbox_message_view',$data);
	  
	}
	public function sent_message()
	{
	$student_id=$this->session->userdata('student_id');
	$this->load->library('pagination');

                 $config['base_url']=''.base_url().'index.php/message/sent_message';
				$this->db->where('sender_id',$student_id);
				//$this->db->group_by('reciever_mail');
				$this->db->order_by('date','desc');
				$config['total_rows']=  $this->db->get('message')->num_rows();
                $config['per_page']=10;
                $config['num_links']=200;

            $this->pagination->initialize($config);	 
	        $this->db->where('sender_id',$student_id);
			//$this->db->group_by('reciever_mail');
	        $this->db->order_by('date','desc');
	        $query= $this->db->get('message',$config['per_page'],$this->uri->segment(3));
	        $data['record']=$query->result();
	        $this->load->view('sent_message_view',$data);
	}
	
	public function download_attach($attach_path)
	{
	$data = file_get_contents("$attach_path"); // Read the file's contents
    $name = 'Attached file';

      force_download($name, $data); 
	}
}