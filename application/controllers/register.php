<?php
require_once('recaptchalib.php');
class Register extends CI_Controller {



    public function __construct() {
        parent::__construct();
        $this->load->model('registration_model');

    }




    public function registration() {

        $public_key = "6LchPOESAAAAACDK1kUYERoUb2DW227kIJp09Gi9";
        $private_key = "6LchPOESAAAAAAqi24ZRmEHJAzbL_vM00B4igi_B";
        $resp = recaptcha_check_answer ($private_key,
                        $_SERVER["REMOTE_ADDR"],
                        $this->input->post("recaptcha_challenge_field"),
                        $this->input->post("recaptcha_response_field"));
        


        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', '', 'required');
         $this->form_validation->set_rules('email', '', 'trim|required|valid_email');
        $this->form_validation->set_rules('contact', '', 'required');
        $this->form_validation->set_rules('username', '', 'required');
        $this->form_validation->set_rules('password', '', 'required');
         $this->form_validation->set_rules('password_confirmation', '', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('registration_view');
       
        } else {

//                    if(!$resp->is_valid){
//
//                            $data['msg']='The reCAPTCHA wasnt entered correctly. Go back and enter it again';
//                            $this->load->view('registration_view',$data);
//			//echo "The reCAPTCHA wasn't entered correctly. Go back and try it again.";
//                    }else{




                    $pass1=$this->input->post('password');
                    $pass2=$this->input->post('password_confirmation');

                    if($pass1==$pass2)
                    {



                              if ($this->registration_model->create_member())
                                {
                                    $data['msg']='Registration successfull.. You can sign in after the approval of librarian';
                                    $this->load->view('registration_view',$data);
                                }
                            else {
                                    $data['msg'] = "username already exists try another username";
                                    $this->load->view('registration_view',$data);

                            }


                    }
                     else {

                        $data['msg']='password did not confirmed correctly';
                        $this->load->view('registration_view',$data);
                    }

                //}


            }


         



     }
    







}

