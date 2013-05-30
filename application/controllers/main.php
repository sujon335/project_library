
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    function __construct()
    {
        parent::__construct();

        /* Standard Libraries of codeigniter are required */
        $this->load->database();
        $this->load->helper('url');
        /* ------------------ */

        $this->load->library('grocery_CRUD');

    }
 
    public function index()
    {
        echo "<h1>Welcome to the world of Codeigniter</h1>";//Just an example to ensure that we get into the function
        die();
    }

function _example_output($output = null)

    {
        $this->load->view('our_template.php',$output);
    }

		public function test()
		{
		 try {
            $crud = new grocery_CRUD();

            $crud->set_theme('datatables');
            $crud->set_table('MEMBER');
            $crud->set_subject('Ser');



            $output = $crud->render();

            $this->_example_output($output);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
	}

        
}