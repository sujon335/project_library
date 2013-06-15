<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Send_mail extends CI_Controller {

    public function __construct() {
         parent::__construct();
		$this->load->database();
		$this->load->helper('date');
                $this->load->helper('url');
		$this->load->helper('download');
		$this->load->helper(array('form', 'url'));
                

        }


     
        function password()
        {

               $data=array();

               $this->load->library('form_validation');
               $this->form_validation->set_rules('email','','trim|required|valid_email');
               if ($this->form_validation->run() == FALSE) {

                     $this->load->view('validation_error_view');
               }

               else
               {

                    $this->db->where('EMAIL',$this->input->post('email',true));
                    $q=$this->db->get('MEMBER');

                    if($q->num_rows==0)
                    {
                        $data['msg']="This is not an Email id of a regitered library member";
                        $this->load->view('validation_error_view');
                    }
                    else {

                    

                                foreach($q->result() as $row)
                                {
                                    $pass=$row->PASSWORD;
                                }


                               $base=base_url();
                               $site="http://www.md5online.org/";

                                $sender_mail="gkabswebsite@gmail.com";
                                $sender_name="Online Library Management";
                                $subject="Password Recovery";

                                $message="Your Password for $base
                                            is $pass (MD5 Encrypted).

                                            you can decrypt it here $site.
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
                                    $data['msg']="An email has been sent to your email id please check your email";
                                    $this->load->view('validation_error_view',$data);
                                }
                                else
                                {
                                    show_error($this->email->print_debugger());
                                }
                    



                    }

               }



        }




 


























}
