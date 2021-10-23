<?php
class Category extends MY_Controller
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
    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $category = new App();
            $this->app = new App();
           // $data['products'] = $review->productslisting();
            $this->form_validation->set_rules('category', 'Category Name', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            $categoryid=$this->input->post('categoryid');
          
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_category',$data);
            }
            else
            {
            
                $category               = $this->input->post('category');
                $description          = $this->input->post('description');
				$category_arbic               = $this->input->post('category_arabic');
                $description_arabic          = $this->input->post('description_arabic');
				$status                = $this->input->post('status');
                

                 #Category INSERT
                        $data               = array(
                            'category_name'                   =>  $category,                            
                            'description'            =>  $description,
							'category_name_arabic'                   =>  $category_arbic,                            
                            'description_arabic'            =>  $description_arabic ,
                            'status'                 =>  $status
                            
                        );
				
				       if($categoryid)
                        {
                           $this->db->where('category_id', $categoryid);
                           $this->db->update('catalog_category', $data);

                        } else
					   {
                        $complted= $this->db->insert('catalog_category', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('category/category_list');
				
			}

                   
             }

       
    }
	
	
	public function edit()
		{
		  $category = new App();
		  $this->app = new App();
		  $category_id=$this->uri->segment(3);
		  $data['result']=$category->editcategory($category_id);
		  $this->template->load('admin_blank','add_category',$data);
		}
    
    
    function add_category()
    {
    
         $review_id = $this->uri->segment(3);
         

         

    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $review = new App();
            $this->app = new App();
            //$data['products'] = $review->productslisting();
            //$data['editreview']=$review->get_review_data($review_id);
         
         //print_r($data['editreview']);
            $this->form_validation->set_rules('category', 'Category Name', 'required');
           // $this->form_validation->set_rules('rating', 'Rating', 'required');


             
              if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('admin_blank','add_category',$data);
            }
            else
            {
            
                $product               = $this->input->post('product');
                $rating                = $this->input->post('rating');
                $rating1               = $this->input->post('rating1');
                $rating2               = $this->input->post('rating2');
                $rating3               = $this->input->post('rating3');
                $rating4               = $this->input->post('rating4');
                $description           = $this->input->post('description');
                $status                = $this->input->post('status');
                $reviewid               = $this->input->post('reviewid');


                 #Review INSERT
                        $data               = array(
                            'product_id'                   =>  $product,
                            'overall_rating'               =>  $rating,
                            'value_rating'                 =>  $rating1,
                            'comfortable_rating'           =>  $rating2,
                            'greatdesign_rating'           =>  $rating3,
                            'wellmade_rating'             =>  $rating4,
                            'description'            =>  $description,
                            'status'                 =>  $status
                            
                        );
                        
                    if($reviewid)
                        {
                           $this->db->where('review_id', $reviewid);
                           $this->db->update('reviews', $data);

                        }
                        else
                        {    
                           $complted= $this->db->insert('reviews', $data);
                         }
                          $data['success']="success";
                          redirect('reviews/review');

                   
             }

        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    
   
	
	public function delete()
		{
		  $category = new App();
		  $this->app = new App();
		  $category_id=$this->uri->segment(3);
		  $category->deletecategory($category_id);
		  redirect('category/categorylist');
		}
    
    

    function category_list(){
        if($this->ion_auth->logged_in()==1)
        {
			$category = new App();
            $this->app = new App();
			$data['categories'] = $category->categorylisting();
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'category_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    
}
?>