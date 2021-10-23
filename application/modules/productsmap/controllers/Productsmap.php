<?php
class Productsmap extends MY_Controller
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
	
	function file_selected_test(){

    $this->form_validation->set_message('file_selected_test', 'Please select Product Image.');
    if (empty($_FILES['prdimage']['name'])) {
            return false;
        }else{
            return true;
        }
}
    function index()
    {

		$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

        if($access['add_access']=="1" || $type=="Admin")
        {
    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
			$productmapid=$this->input->post('productmapid');
            $productmap = new App();
            $this->app = new App();            
            $this->form_validation->set_rules('product', 'Product Name', 'required');
			$this->form_validation->set_rules('dependableattribute-1', 'Dependable Attribute Name', 'required');
			$this->form_validation->set_rules('nondependableattribute-1', 'Non Dependable Attribute Name', 'required');
			
			$this->form_validation->set_message('is_unique', 'The %s is already taken, Please use another %s'); 
            
            $data['products'] = $productmap->productlisting();			
			 $data['dependattributes'] = $productmap->dependattributelisting();			
			 $data['nondependattributes'] = $productmap->nondependattributelisting();		
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_productmap',$data);
            }
            else
            {
            
                $product               = $this->input->post('product');
				$dependablearr=array();
				$nondependablearr=array();
				
				for ($x = 1; $x <= 10; $x++) {
					if($this->input->post('dependableattribute-'.$x))
					{
					$dependablearr[] = $this->input->post('dependableattribute-'.$x);
					}
						}
				for ($x = 1; $x <= 10; $x++) {
					if($this->input->post('nondependableattribute-'.$x))
					{
					$nondependablearr[] = $this->input->post('nondependableattribute-'.$x);
					}
					
						}
				$status                = $this->input->post('status');
				
				$jsonarrdependable=array();
				
				foreach ($dependablearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrdependable[]=array('id'=> $text[0],'name'=> $text[1]);				  
				  }
				$jsonarrdependable = json_encode($jsonarrdependable);
				
				
				$jsonarrnondependable=array();
				
				foreach ($nondependablearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrnondependable[]=array('id'=> $text[0],'name'=> $text[1]);				  
				  }
				
				$jsonarrnondependable = json_encode($jsonarrnondependable);
				
				
                

                 #Category INSERT
                        $data               = array(
                            'product_id'                   =>  $product, 
							'dependable_attributes'               =>  $jsonarrdependable, 
							'non_dependable_attributes'                   =>  $jsonarrnondependable,                           
                            'status'                 =>  $status
                            
                        );
				
				
				
				
				       if($productmapid)
                        {
                           $this->db->where('product_map_id', $productmapid);
                           $this->db->update('product_map', $data);

                        } else
					   {
                        $complted= $this->db->insert('product_map', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('productsmap/productmap_list');
				
			}

                   
             }

			}
			else{

				redirect('error_page');

			}

       
    }
	
	
	public function edit()
		{
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['edit_access']=="1" || $type=="Admin")
			{
		  $productmap = new App();
		  $this->app = new App();
		  $productmap_id=$this->uri->segment(3);
		  $data['products'] = $productmap->productlisting();			
	      $data['dependattributes'] = $productmap->dependattributelisting();			
		  $data['nondependattributes'] = $productmap->nondependattributelisting();	
		  $data['result']=$productmap->editproductmap($productmap_id);
		
		  $this->template->load('admin_blank','edit_productmap',$data);
			}
			else{

				redirect('error_page');
			}
		}
    
    
   function updateattribute()
    {
    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
			$productmapid=$this->input->post('productmapid');
            $productmap = new App();
            $this->app = new App();            
           // $this->form_validation->set_rules('product', 'Product Name', 'required');
			$this->form_validation->set_rules('dependableattribute-1', 'Dependable Attribute Name', 'required');
			$this->form_validation->set_rules('nondependableattribute-1', 'Non Dependable Attribute Name', 'required');
			
			
            
            $data['products'] = $productmap->productlisting();			
			 $data['dependattributes'] = $productmap->dependattributelisting();			
			 $data['nondependattributes'] = $productmap->nondependattributelisting();		
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','edit_productmap',$data);
            }
            else
            {
            
                //$product               = $this->input->post('product');
				$dependablearr=array();
				$nondependablearr=array();
				
				for ($x = 1; $x <= 10; $x++) {
					if($this->input->post('dependableattribute-'.$x))
					{
					$dependablearr[] = $this->input->post('dependableattribute-'.$x);
					}
						}
				for ($x = 1; $x <= 10; $x++) {
					if($this->input->post('nondependableattribute-'.$x))
					{
					$nondependablearr[] = $this->input->post('nondependableattribute-'.$x);
					}
					
						}
				$status                = $this->input->post('status');
				
				$jsonarrdependable=array();
				
				foreach ($dependablearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrdependable[]=array('id'=> $text[0],'name'=> $text[1]);				  
				  }
				$jsonarrdependable = json_encode($jsonarrdependable);
				
				
				$jsonarrnondependable=array();
				
				foreach ($nondependablearr as $val)
				  {
				    $text=explode("|",$val);				  
				    $jsonarrnondependable[]=array('id'=> $text[0],'name'=> $text[1]);				  
				  }
				
				$jsonarrnondependable = json_encode($jsonarrnondependable);
				
				
                

                 #Product Map UPDATE
                        $data               = array(                            
							'dependable_attributes'               =>  $jsonarrdependable, 
							'non_dependable_attributes'                   =>  $jsonarrnondependable,                           
                            'status'                 =>  $status
                            
                        );
				
				
				
				
				       if($productmapid)
                        {
                           $this->db->where('product_map_id', $productmapid);
                           $this->db->update('product_map', $data);

                        } 
			
                        $data['success']="success";				       
                        redirect('productsmap/productmap_list');
				
			}

                   
             }

       
    }
	 

    
   
	
	public function delete()
		{
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['delete_access']=="1" || $type=="Admin")
			{
		  $productmap = new App();
		  $this->app = new App();
		  $productmap_id=$this->uri->segment(3);
		  $productmap->deleteproductmap($productmap_id);
		  redirect('productsmap/productmap_list');
			}
			else{

				redirect('error_page');
			}
		}
    
    

    function productmap_list(){
       
		$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

        if($access['view_access']=="1" || $type=="Admin")
        {

        if($this->ion_auth->logged_in()==1)
        {
			$productmap = new App();
            $this->app = new App();
			$data['productsmap'] = $productmap->productmaplisting();
			
            $this->template->load('admin_blank', 'productmap_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

	    }
		else{



			redirect('error_page');
		}
    }
	
	
	 function checkproduct(){
     
     $product               = $this->input->post('product');

     
      if($this ->ion_auth ->logged_in()==1)
        {
            $productmap = new App();
            $this->app = new App();
            $data['check']=$productmap->checkproductid($product);            
                          
			if($data['check']>="1")	
			{
				
				echo "notok";
				
			}
		  else
		  {
			  
			 echo "ok"; 
		  }
      

     
         }
     }



    
}
?>