<?php
class Non_dependable_attributes extends MY_Controller
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
    
        if($this -> ion_auth -> logged_in()==1)
        {
            $attributes = new App();
            $this->app = new App();
            $data['attributes'] = $attributes->attributelisting();
            redirect('non_dependable_attributes/attribute_list');
				
			}

                   
            

       
    }
	
	
	public function edit()
		{
		  $attributes = new App();
		  $this->app = new App();
		  $attribute_id=$this->uri->segment(3);
		  $data['result']=$attributes->editattribute($attribute_id);
		  $this->template->load('admin_blank','add_attribute',$data);
		}
    
    
    function add_attribute()
    {
    
          $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $attributes = new App();
            $this->app = new App();
           // $data['products'] = $review->productslisting();
            $this->form_validation->set_rules('attribute', 'Attribute Name', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            $attributeid=$this->input->post('attributeid');
          
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_attribute',$data);
            }
            else
            {
            
                $attribute               = $this->input->post('attribute');               
				$status                = $this->input->post('status');
                

                 #Category INSERT
                        $data               = array(
                            'dependable_attribute_name'    =>  $attribute,
                            'status'                 =>  $status
                            
                        );
				
				       if($attributeid)
                        {
                           $this->db->where('non_dependable_attribute_id', $attributeid);
                           $this->db->update('non_dependable_attributes', $data);

                        } else
					   {
                        $complted= $this->db->insert('non_dependable_attributes', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('non_dependable_attributes/attribute_list');
				
			}

                   
             }
    }

    
   
	
	public function delete()
		{
		  $attributes = new App();
		  $this->app = new App();
		  $attribute_id=$this->uri->segment(3);
		  $attributes->deleteattribute($attribute_id);
		  redirect('non_dependable_attributes/attribute_list');
		}
    
    

    function attribute_list(){
        if($this->ion_auth->logged_in()==1)
        {
			$attributes = new App();
            $this->app = new App();
			$data['attributes'] = $attributes->attributelisting();
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'attribute_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    
}
?>