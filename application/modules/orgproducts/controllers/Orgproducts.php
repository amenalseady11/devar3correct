<?php
class Orgproducts extends MY_Controller
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
            $productorg = new App();
            $this->app = new App();
            $data['products'] = $productorg->productlisting();
          $this->form_validation->set_rules('product', 'Product Name', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            //$categoryid=$this->input->post('categoryid');
			/*
			 $product               = $this->input->post('product');
			
			if($product)
             {
				 $data['productmap']=$productorg->productmaplisting($product);
				 $dependable= json_decode($data['productmap']->dependable_attributes);
		        $nondependable= json_decode($data['productmap']->non_dependable_attributes);
				
				 foreach ($dependable as $k=>$v)
	                     {
					 
					 $this->form_validation->set_rules($v->name, $v->name, 'required'); 
					 
				
			  }
				
				 foreach ($nondependable as $k=>$v)
	                     {
					 
					 $this->form_validation->set_rules($v->name, $v->name, 'required'); 
					 
				
			  }
               
               
          
			}
			
			*/
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_orgproduct',$data);
            }
            else
            {
				
				
                $product               = $this->input->post('product');
               
                $data['productmap']=$productorg->productmaplisting($product);
				 $dependable= json_decode($data['productmap']->dependable_attributes);
		        $nondependable= json_decode($data['productmap']->non_dependable_attributes);
				$jsonarrdependable=array();
				
				 foreach ($dependable as $k=>$v)
	                     {
                            
					        $nameval=str_replace(" ","",$v->name);
					        $val=$this->input->post($nameval);
					 
					   $jsonarrdependable[]=array('id'=> $v->id,'name'=> $v->name,'value'=> $val);
					  
				 }
				
				$jsonarrdependable = json_encode($jsonarrdependable);
				
				$jsonarrnondependable=array();
				
				
				foreach ($nondependable as $k=>$v)
	                     {
                            
					 
					        $nameval=str_replace(" ","",$v->name);
					        $val=$this->input->post($nameval);
					        $nameprice=$nameval."_price";
					        $price=$this->input->post($nameprice);
					 
					   $jsonarrnondependable[]=array('id'=> $v->id,'name'=> $v->name,'value'=> $val,'price'=>$price);
					  
				 }
				
				   $jsonarrnondependable = json_encode($jsonarrnondependable);
				
				    $quantity               = $this->input->post('quantity');
				    $quantityprice           = $this->input->post('quantity_price');
				$minquantity               = $this->input->post('min_quantity');
				    $perprice           = $this->input->post('per_price');
				
				  $type_price           = $this->input->post('type');
				
				
				$status="1";
				
				

                 #Product dependable INSERT
                        $data               = array(
                            'product_id'                   =>  $product,                            
                            'dependable_values'            =>  $jsonarrdependable,
							'non_dependable_values'         =>  $jsonarrnondependable, 
							'type_price'         =>  $type_price,
                            'status'                 =>  $status
                            
                        );
				
				       if($dependableid)
                        {
                           $this->db->where('dependable_id', $dependableid);
                           $this->db->update('dependable_product', $data);

                        } else
					   {
                        $complted= $this->db->insert('dependable_product', $data);
						   $insert_id = $this->db->insert_id();
						   
						   if($type_price=="1")
					 {
							   
							   $datadepend               = array(
                            'dependable_id'                   =>  $insert_id,                            
                            'quantity'            =>  $minquantity,
							'price'         =>  $quantityprice,
							    'min_quantity'            =>  $minquantity,
							'per_price'         =>  $perprice 
                            
                            
                        );  
							   
							   
							   
						   }
						   else{
							   
							   
						  
						   
						   $datadepend               = array(
                            'dependable_id'                   =>  $insert_id,                            
                            'quantity'            =>  $quantity,
							'price'         =>  $quantityprice,
							    'min_quantity'            =>  $minquantity,
							'per_price'         =>  $perprice 
                            
                            
                        );
							   
							    }
						   
						   $this->db->insert('dependable_quantity', $datadepend);
					   }
				
				     if($type_price=="1")
					 {
						 
						$quarr=$this->input->post('qua'); 
						 $quapricerr=$this->input->post('quaprice');
						 
						 $g="0";
						 
						 foreach ($quarr as $val)
						 {
							 
							 $dataqua               = array(
                            'dependable_id'                   =>  $insert_id,                            
                            'quantity'            =>  $quarr[$g],
							'price'         =>  $quapricerr[$g]
							    
                            
                            
                        ); 
							 
							  $this->db->insert('dependable_quantity', $dataqua);
							 
							 $g=$g+1;
							 
						 }
						 
						 
						 
						 
					 }
				
				      
			
                        $data['success']="success";				       
                        redirect('orgproducts/view/'.$insert_id);
				
			}

                   
             }

			}
			else{

				redirect('error_page');

			}

       
    }
	
	
	
	function updatedependable()
    {
    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $productorg = new App();
            $this->app = new App();
            $data['products'] = $productorg->productlisting();
			
			
				
				$this->form_validation->set_rules('dependid', 'Dependable Id', 'required');
          
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','edit_orgproduct',$data);
            }
            else
            {
				
				 $product               = $this->input->post('product');
				
				
                $dependid               = $this->input->post('dependid');
               
                $data['productmap']=$productorg->productmaplisting($product);
				 $dependable= json_decode($data['productmap']->dependable_attributes);
		        $nondependable= json_decode($data['productmap']->non_dependable_attributes);
				$jsonarrdependable=array();
				
				
				
				
				
				 foreach ($dependable as $k=>$v)
	                     {
					 
					 $new_name="";
					 
					 
					
                            
					        $nameval=str_replace(" ","",$v->name);
					        $val=$this->input->post($nameval);
					     //---uploading dependable thumb image---------------------
					 $thumbfile=$nameval."_image";
                  if($_FILES[$thumbfile]['tmp_name'])
                  {
					  
					 
			        
	                  $config['upload_path'] = './assets/uploads/thumb/';  
	                  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	                  $config['max_size'] = 0;
	                  $new_name = time() . '-'.$nameval.'-image-' . $_FILES[$thumbfile]['name'];  
	                  $config['file_name'] = $new_name;
	                  $this->load->library('upload', $config);  
					  
					   $this->upload->initialize($config); 
	                  
				        if (!$this->upload->do_upload($thumbfile)) {			            
				            $data['error']=array('error' => $this->upload->display_errors());
				        } else {
				            $upload_data = $this->upload->data($new_name); 
							
						}
					  
					  
				  }
					 
					 if($new_name)
					 {
						 
						 $jsonarrdependable[]=array('id'=> $v->id,'name'=> $v->name,'value'=> $val,'file_name'=> $new_name);
						 
					 } else{
						 
						  $jsonarrdependable[]=array('id'=> $v->id,'name'=> $v->name,'value'=> $val,'file_name'=> '');
					 }
					 
				  
					
					
					
					  
				 }
				
				$jsonarrdependable = json_encode($jsonarrdependable);
				
				$jsonarrnondependable=array();
				
				
				foreach ($nondependable as $k=>$v)
	                     {
                            
					 
					        $nameval=str_replace(" ","",$v->name);
					        $val=$this->input->post($nameval);
					        $nameprice=$nameval."_price";
					        $price=$this->input->post($nameprice);
					
					
					
					 
					   $jsonarrnondependable[]=array('id'=> $v->id,'name'=> $v->name,'value'=> $val,'price'=>$price);
					  
				 }
				
				   $jsonarrnondependable = json_encode($jsonarrnondependable);
				
				   
				
				
				$status="1";
				
				

                 #Product dependable Update
                        $data               = array(
                                                       
                            'dependable_values'            =>  $jsonarrdependable,
							'non_dependable_values'         =>  $jsonarrnondependable, 
                            'status'                 =>  $status
                            
                        );
				
				       if($dependid)
                        {
                           $this->db->where('dependable_id', $dependid);
                           $this->db->update('dependable_product', $data);

                        } 
				
				      
			
                        $data['success']="success";				       
                        redirect('orgproducts/orgproduct_list');
				
			}

                   
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
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['edit_access']=="1" || $type=="Admin")
			{
		  $orgproducts = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $data['result']=$orgproducts->viewdependant($orgproduct_id);
		  $data['depresult']=$orgproducts->dependantproducts($orgproduct_id);
		  $data['products'] = $orgproducts->productlisting();
		  $this->template->load('admin_blank','edit_orgproduct',$data);

			}
			else{

				redirect('error_page');
			}
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
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['delete_access']=="1" || $type=="Admin")
			{
		  $orgproduct = new App();
		  $this->app = new App();
		  $orgproduct_id=$this->uri->segment(3);
		  $orgproduct->deleteorgproduct($orgproduct_id);
		  redirect('category/categorylist');
			}
			else{

				redirect('error_page');
			}
		}
    
    

    function orgproduct_list(){

		$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

		if($access['view_access']=="1" || $type=="Admin")
		{

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
	   else
	   {

		redirect('error_page');

	   }
    }
	
	
	function orgdependable(){
     
     $product               = $this->input->post('product');

     
      if($this ->ion_auth ->logged_in()==1)
        {
            $productorg = new App();
            $this->app = new App();
            $data['prodmap']=$productorg->checkdependable($product); 
		  $dependable= json_decode($data['prodmap']->dependable_attributes);
		  $nondependable= json_decode($data['prodmap']->non_dependable_attributes);
				  $selectedattributearr=array();	            
	               foreach ($dependable as $k=>$v)
	                     {
                            $selectedattributearr[]=$v->id; // etc.
					   ?>
					   
					     <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label"><?php echo $v->name;?> :</label>
														<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>" placeholder="Enter <?php echo $v->name;?>" type="text"  required>
									                </div>
								                </div>
								            </div>

<?php
                         }  
                          
	?>
<div class="row ">
										<div class="col-12 col-lg-6">
								            <hr>
								        </div>
								    </div>

								    
<br>
				                         
<?php


 foreach ($nondependable as $k=>$v)
	                     {
                            
					   ?>
					   
					      <div class="row ">
										<div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label"><?php echo $v->name;?>  :</label>
														<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>" placeholder="<?php echo $v->name;?> " type="text"  >
									                </div>
								                </div>
								                <div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Price :</label>
														<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>_price" placeholder="Enter Price" type="text"  >
									                </div>
								                </div>
								            </div>
<?php
                         }  
                          
			?>
  
<?php
     
         }
     }



    
}
?>