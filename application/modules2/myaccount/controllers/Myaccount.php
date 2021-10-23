<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		if(! $this->session->userdata('uid')){
redirect('login');
}
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
        error_reporting(0);
    }

	public function index()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$data['accountinfo'] = $app->getaccountinfo($userid);
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$customerid=$this->input->post('customerid');
		
		if ($this->form_validation->run()==false)
            {
			 
			 
				
             $this->template->load('frontend/myaccount', 'index', $data);
			  
            }
            else
            {
				
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');				
				$phone                  = $this->input->post('phone');
				
				$data               = array(
							
							'customer_firstname'       =>  $firstname,
						     'customer_lastname'     =>  $lastname,
					         'customer_phone'     =>  $phone
					    
						    
                            
                        );
					
				
		      $this->db->where('customer_id', $customerid);
              $this->db->update('customers', $data);
		
             redirect('myaccount');
				
			}
			  
         
        
	}
	
	
	public function account_address()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$data['addressshipping'] = $app->getaccountaddress_shipping($userid);
		$data['addressbilling'] = $app->getaccountaddress_billing($userid);
		
		$data['alladdress'] = $app->getaccountaddress_all($userid);
		
		
		
				$this->template->load('frontend/myaccount', 'account_address', $data);
			
		
        
			  
         
        
	}
	
	
	public function editaddress()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$id=$this->uri->segment(2);
		
		
			$data['editaddress'] = $app->geteditaddress($id);   
		  
		
		$this->template->load('frontend/myaccount', 'edit_address', $data);
		
		
		
		
			  
         
        
	}


public function updateaddress(){
	
	$main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	
	$this->form_validation->set_rules('streetaddress', 'Address', 'required');
		
		$this->form_validation->set_rules('city', 'City', 'required');
		
		$this->form_validation->set_rules('state', 'State', 'required');
		
		$this->form_validation->set_rules('zip', 'Zipcode', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'edit_address', $data);
			  
            }
            else
            {
				$pid                  = $this->input->post('id');
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
				$streetaddress2                = $this->input->post('streetaddress2');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,
							'address2'         =>  $streetaddress2, 
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				
				$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
				
				
				if($_POST['default'])
				{
					
					$data               = array(
							
							'def_bill'       =>  "0"
						     
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
					
					
					$data               = array(
							
							'def_bill'       =>  "1"
						     
						    
                            
                        );
					
					$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
						
					
				
					
				}
				
				if($_POST['defaultship'])
				{
					
					$data               = array(
							
							'def_ship'       =>  "0"
						    
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
					
					$data               = array(
							
							'def_ship'       =>  "1"
						     
						    
                            
                        );
					
					$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
						
					
				}
				
				
		
				redirect('account_address');
			
			}
	
	
}
	
	
	public function new_address()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		//$data['accountaddress'] = $app->getaccountaddress_shipping($userid);
		
		$data['accountinfo'] = $app->getaccountinfo($userid);
		
		$this->form_validation->set_rules('streetaddress', 'Address', 'required');
		
		$this->form_validation->set_rules('city', 'City', 'required');
		
		$this->form_validation->set_rules('state', 'State', 'required');
		
		$this->form_validation->set_rules('zip', 'Zipcode', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'new_address', $data);
			  
            }
            else
            {
				
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
				$streetaddress2                = $this->input->post('streetaddress2');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				if($_POST['default'])
				{
					
				$defaultbilling="1";
					
				}
				else{
					
				$defaultbilling="0";	
					
				}
				if($_POST['defaultship'])
				{
					
				$defaultshipping="1";
					
				}
				else{
					
				$defaultshipping="0";	
					
				}
				
				if($defaultbilling)
				{ 
					
					$data               = array(
							
							'def_bill'       =>  "0"
						    
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
						
					}
					
				

                
				 if($defaultshipping)
				{
					
					
					$data               = array(
							
							'def_ship'       =>  "0"
						   
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);	
						
					}
					
				
				
				 
			
		
		
		 $data               = array(
							'customer_id'       =>  $userid,
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,
							'address2'         =>  $streetaddress2, 
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country,
							'def_bill'       =>  $defaultbilling,
			                'def_ship'       =>  $defaultshipping
							
                            
                        );
				
				 $complted= $this->db->insert('customer_address', $data);
				
				redirect('myaccount');
				
		
		  }
        
			  
         
        
	}
	
	
	
	public function orders()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$data['orders'] = $app->getorders($userid);  
		
		  
		  
		
		$this->template->load('frontend/myaccount', 'orders', $data);
		
		
	}
	
	
	public function order_details()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$orderid=$this->uri->segment(2);
		
	    $data['order_details']=$app->getorderdetails($orderid); 
		
	    
		
		$g="0";
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$app->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $app->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid);  
		
		  
		  
		
		$this->template->load('frontend/myaccount', 'order-details', $data);
		
		
	}
	
	
	
	
	public function logout()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		$this->session->unset_userdata('uid');
        $this->session->sess_destroy();
        return redirect('login');
			  
         
        
	}
	
	
	
	
	
	



}

