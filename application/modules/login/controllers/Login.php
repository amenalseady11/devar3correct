<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->library('form_validation');
        $this->load->library('Memcached_library');
		 // Load cart library
        $this->load->library('cart');
         $this->load->library('facebook');
        error_reporting(0);
    }

	public function index()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		 
		
		  if ($this->form_validation->run()==false)
            {
			 
			
			  
			
				
               $this->template->load('frontend/login', 'index', $data);
			  
            }
            else
            {
				
				
				
				$email               = $this->input->post('email');				
				$password                = $this->input->post('password');
				$password=md5($password);
				

                
				 $query=$this->db->where(['customer_email'=>$email,'customer_password'=>$password]);
	           $account=$this->db->get('customers')->row();
				
				//echo $this->db->last_query();
				      
                  if($account->customer_id)
				  {
					  
					$this->session->set_userdata('uid',$account->customer_id);
					  
					 if($this->session->userdata('prev'))
					 {
						 
					 redirect('checkout');	 
						 
					 }
					
                  
                  redirect('myaccount');
					  
					  
				  }
				else{
					
					$data['message']="Invalid Username/Password";
					
					$this->template->load('frontend/login', 'index', $data);
					
				}
                       
				 
			
				
             
			}

                   


		
		
		
		
		
        
	}
	
	
	
	
	



}

