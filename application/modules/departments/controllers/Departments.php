<?php
class Departments extends MY_Controller
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
            $category = new App();
            $this->app = new App();
           // $data['products'] = $review->productslisting();
            $this->form_validation->set_rules('department', 'Department Name', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            $departmentid=$this->input->post('departmentid');
          
			
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_department',$data);
            }
            else
            {
            
                $department               = $this->input->post('department');
                $description          = $this->input->post('description');				
				$status                = $this->input->post('status');
                

                 #Department INSERT
                        $data               = array(
                            'department_name'                   =>  $department,                            
                            'department_description'            =>  $description,							
                            'department_status'                 =>  $status
                            
                        );
				
				       if($departmentid)
                        {
                           $this->db->where('department_id', $departmentid);
                           $this->db->update('departments', $data);

                        } else
					   {
                        $complted= $this->db->insert('departments', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('departments/department_list');
				
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
		  $depart = new App();
		  $this->app = new App();
		  $department_id=$this->uri->segment(3);
		  $data['result']=$depart->editdepartment($department_id);
		  $this->template->load('admin_blank','add_department',$data);
            }
            else{

                redirect('error_page');
            }
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
            $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['delete_access']=="1" || $type=="Admin")
			{
		  $dep = new App();
		  $this->app = new App();
		  $department_id=$this->uri->segment(3);
		  $dep->deletedepartment($department_id);
		  redirect('departments/department_list');
            }
            else{

                redirect('error_page');
            }
		}
    
    

    function department_list(){
        
        $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

		if($access['view_access']=="1" || $type=="Admin")
		{

        if($this->ion_auth->logged_in()==1)
        {
			$category = new App();
            $this->app = new App();
			$data['departments'] = $category->departmentlisting();
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'department_list',$data);
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