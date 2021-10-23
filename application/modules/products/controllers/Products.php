<?php
class Products extends MY_Controller
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
			$productid=$this->input->post('productid');
            $category = new App();
            $this->app = new App();
            $data['categories'] = $category->categorylisting();
            $this->form_validation->set_rules('category', 'Category Name', 'required');
			$this->form_validation->set_rules('product', 'Product Name', 'required');
			if($productid==""){
			$this->form_validation->set_rules('prdimage', 'Document', 'callback_file_selected_test');
			}
			$this->form_validation->set_rules('price', 'Price', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            
          
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_product',$data);
            }
            else
            {
            
                $category               = $this->input->post('category');
				$product               = $this->input->post('product');
				$product_arabic               = $this->input->post('product_arabic');
                $price                  = $this->input->post('price');				
                $description          = $this->input->post('description');
				$description_arabic          = $this->input->post('description_arabic');
				$status                = $this->input->post('status');
				
				
				
                

                 #Category INSERT
                        $data               = array(
                            'category'                   =>  $category, 
							'product_name'               =>  $product, 
							'product_name_arabic'               =>  $product_arabic, 
							'price'                   =>  $price,							
                            'description'            =>  $description,
							'description_arabic'            =>  $description_arabic,
                            'status'                 =>  $status
                            
                        );
				
				
				//---uploading logo---------------------
                  if($_FILES["prdimage"]['tmp_name'])
                  {
			        
	                  $config['upload_path'] = './assets/uploads/products/';  
	                  $config['allowed_types'] = 'gif|jpg|png|jpeg';
	                  $config['max_size'] = 0;
	                  $new_name = time() . '-' . $_FILES["prdimage"]['name'];  
	                  $config['file_name'] = $new_name;
	                  $this->load->library('upload', $config);             
	                  
				        if (!$this->upload->do_upload('prdimage')) {			            
				            $data['error']=array('error' => $this->upload->display_errors());
				        } else {
				            $upload_data = $this->upload->data(); 
				            //$this->app->update_image($new_name,$idlogo);
							//$data['image']=$new_name;
							
							 $data               = array(
                            'category'                   =>  $category, 
							'product_name'               =>  $product,
							'product_name_arabic'               =>  $product_arabic,
							'product_image'                    =>  $new_name,								 
							'price'                   =>  $price,							
                            'description'            =>  $description,
							'description_arabic'            =>  $description_arabic,
                            'status'                 =>  $status
                            
                        );
  
				        }
				        
				       			        
                   }
                   
				
				       if($productid)
                        {
                           $this->db->where('product_id', $productid);
                           $this->db->update('catalog_product', $data);

                        } else
					   {
                        $complted= $this->db->insert('catalog_product', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('products/product_list');
				
			}

                   
             }


            }else{

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
		  $category = new App();
		  $this->app = new App();
		  $product_id=$this->uri->segment(3);
		  $data['categories'] = $category->categorylisting();
		  $data['result']=$category->editproduct($product_id);
		  $this->template->load('admin_blank','add_product',$data);
            }
            else{

                redirect('error_page');
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
		  $product = new App();
		  $this->app = new App();
		  $product_id=$this->uri->segment(3);
		  $product->deleteproduct($product_id);
		  redirect('products/product_list');
            }
            else{

                redirect('error_page');
            }
		}
    
    

    function product_list(){
       
        
        $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['view_access']=="1" || $type=="Admin")
			{

        if($this->ion_auth->logged_in()==1)
        {
			$product = new App();
            $this->app = new App();
			$data['products'] = $product->productlisting();
			
            $this->template->load('admin_blank', 'product_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       } else{

        redirect('error_page');

       }
    }


    
}
?>