<?php
class Employee extends MY_Controller
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
			
			$userinfo=$this->session->all_userdata();
			//print_r($userinfo);
			//echo "mmm".$userinfo[id];
			
			//exit;
            $emp = new App();
            $this->app = new App();
            $data['designation'] = $emp->designationlisting();
            //print_r($data['designation']);
            $data['departments'] = $emp->departmentlisting();
           // print_r($data['departments']);
            $this->form_validation->set_rules('employee', 'Employee Name', 'required');
            $this->form_validation->set_rules('designation', 'Designation Name', 'required');
            $this->form_validation->set_rules('department', 'Department Name', 'required');
			if($_POST['employeeid']=="")
			{
			
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('conpassword', 'Confirm Password', 'required|matches[password]');
				
			}
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
            $employeeid=$this->input->post('employeeid');
			
			$password=$_POST['password'];
			//echo "jjj".$this->ion_auth->hash_password($password);
			//exit;
          
			
             
              if ($this->form_validation->run() == FALSE)
            {
				  
				  if($employeeid)
					 {
						redirect('employee/edit/'.$employeeid); 
					 }
					 
				
                $this->template->load('admin_blank','add_employee',$data);
            }
            else
            {
				
            
                $employee               = $this->input->post('employee');
				$email               = $this->input->post('email');
                $description          = $this->input->post('description');				
				$status                = $this->input->post('status');
				$fullname                = $this->input->post('employee');
                $department                = $this->input->post('department');
                $designation                = $this->input->post('designation');
				$type                = $this->input->post('type');
				
				$password=$_POST['password'];
			$newpassword=$this->ion_auth->hash_password($password);
				
				if($_POST['password'])
				{
					
				
                

                 #Department INSERT
                        $data               = array(
                            'username'                   =>  $email,
							'fullname'                   =>  $fullname,
							'email'                           =>  $email,
							'password'                           =>  $newpassword,						
                            'description'            =>  $description,
                            'designation_id'            =>  $designation,
                            'department_id'            =>  $department,	
							'type'            =>  $type,	
                            'active'                 =>  $status
                            
                        );
					
				}
				else
				{
					
					 $data               = array(
                            'username'                   =>  $email,
						 'fullname'                   =>  $fullname,
							'email'                           =>  $email,												
                            'description'            =>  $description,
                            'designation_id'            =>  $designation,
                            'department_id'            =>  $department,
                            'type'            =>  $type,								
                            'active'                 =>  $status
                            
                        );
				}

                
				       if($employeeid)
                        {
                           $this->db->where('id', $employeeid);
                           $this->db->update('users', $data);
                           //echo $this->db->last_query();
                           //exit;

                        } else
					   {
                        $complted= $this->db->insert('users', $data);
					   }
			
                        $data['success']="success";				       
                        redirect('employee/employee_list');
				
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
		  $des = new App();
		  $this->app = new App();
		  $employee_id=$this->uri->segment(3);
		  $data['result']=$des->editemployee($employee_id);
          $data['designation'] = $des->designationlisting();          
          $data['departments'] = $des->departmentlisting();
		  $this->template->load('admin_blank','add_employee',$data);

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
		  $dep = new App();
		  $this->app = new App();
		  $employee_id=$this->uri->segment(3);
		  $dep->deleteemployee($employee_id);
		  redirect('employee/employee_list');

           }
            else{

               redirect('error_page');
           }
		}
    
    

    function employee_list(){

        $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

		if($access['view_access']=="1" || $type=="Admin")
		{
        if($this->ion_auth->logged_in()==1)
        {
			$des = new App();
            $this->app = new App();
			$data['employee'] = $des->employeelisting();

            $i="0";

            foreach ($data['employee'] as $emp)
			
		{
			
			
		$desid=$emp->designation_id;
        $i=$i+1;	
		
		$data['designation'][$i]=$des->getdes($desid);
       
       
			
		
			
		}
		
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'employee_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }


      } else {

        redirect('error_page');

      }
    }


    
}
?>