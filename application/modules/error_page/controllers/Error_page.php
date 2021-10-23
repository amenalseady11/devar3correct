<?php
class Error_page extends MY_Controller
{
	
	
	
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
       
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
		
		//$this->Main->getComments($userid);
		
        error_reporting(0);
		
    }
    function index()
    {
		
		
		$this->template->load('admin_blank', 'error_page');
       
    }
	
	
	
	
	
	
	

	
	

    
}
?>