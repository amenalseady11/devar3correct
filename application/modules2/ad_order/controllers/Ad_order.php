<?php
class Ad_order extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->model('ion_auth_model');
        $this->load->helper('url');
        $this->load->library('grocery_CRUD');
        $this->load->library('image_CRUD');
        error_reporting(0);
    }
    function index()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
			$adorder = new App();
            $this->app = new App();
			$data['orders'] = $adorder->orderlisting();
		 
		 foreach ($data['orders'] as $ord)
			
		{
			
			
			$ordid=$ord->order_id;

			$data['order_details'][$ordid]=$adorder->getorderdetails($ordid);
			 
			 foreach ($data['order_details'][$ordid] as $val)
			 {
				 $itemid=$val['id'];
				
				$data['farr'][$itemid]=$adorder->getitem($itemid); 
				 
				//print_r($data['filearr'][$itemid]);
				 
			 }
			 
			
			
		
			
		}
		 
		
		
		 
	
			
            $this->template->load('admin_blank', 'adorder_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       
    }
	
	
	
	
	
	
	public function update()
		{
		   $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
				if($this -> ion_auth -> logged_in()==1)
				{
					
					 $productorg = new App();
                    $this->app = new App();           
                   // $this->form_validation->set_rules('quantity', 'Quantity', 'required');
					//$this->form_validation->set_rules('quantity_price', 'Price', 'required');
            
			   $dependid               = $this->input->post('dependid');
             
             // if ($this->form_validation->run() == FALSE)
          //  {
				
                 //redirect('orgproducts/view/'.$dependid);
            //}
           // else
           // {
				 $quantity               = $this->input->post('quantity');
				    $quantityprice           = $this->input->post('quantity_price');
					$minquantity               = $this->input->post('min_quantity');
				    $perprice           = $this->input->post('per_price');
				
				$datadepend               = array(
                            'dependable_id'                   =>  $dependid,                            
                            'quantity'            =>  $quantity,
							'price'         =>  $quantityprice,
					        'min_quantity'            =>  $minquantity,
							'per_price'         =>  $perprice 
                            
                            
                        );
						   
						   $this->db->insert('dependable_quantity', $datadepend);
				
				         $data['success']="success";				       
                        redirect('orgproducts/view/'.$dependid);
				


			//}
		  }
			
	   }
	
	public function edit()
		{
		  $orgproducts = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $data['result']=$orgproducts->viewdependant($orgproduct_id);
		  $data['depresult']=$orgproducts->dependantproducts($orgproduct_id);
		  $data['products'] = $orgproducts->productlisting();
		  $this->template->load('admin_blank','edit_orgproduct',$data);
		}
	
	public function view()
		{
		  $orgproducts = new App();
		  $this->app = new App();
		  $view_id=$this->uri->segment(3);
		  $data['result']=$orgproducts->viewdependant($view_id);
		  $data['depresult']=$orgproducts->dependantproducts($view_id);
		$data['products'] = $orgproducts->productlisting();
		//print_r($data['result']);
		//exit;
		  $this->template->load('admin_blank','view_orgproduct',$data);
		}
    
    
    
   
   
	
	public function delete()
		{
		  $orgproduct = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $orgproduct->deleteorgproduct($orgproduct_id);
		  redirect('category/categorylist');
		}
    
    

    function orgproduct_list(){
        if($this->ion_auth->logged_in()==1)
        {
			$productorg = new App();
            $this->app = new App();
			$data['products'] = $productorg->orgproductlisting();
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'orgproduct_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
	
	
	


    
}
?>