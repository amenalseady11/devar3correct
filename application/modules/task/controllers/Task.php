<?php
class Task extends MY_Controller
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
		//echo "kkk".$adminid;
		//$pageacces = new Main();
		//$access=$pageacces->getpageaccess($adminid);

			//if($access['add_access'])
			//{
    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
           
				
			$task = new App();
            $this->app = new App();
            $groupcheck=$task->getgroups($adminid);

           // print_r($groupcheck);

            $groupstr="";

            foreach ($groupcheck as $va)
			{  

                $groupstr.=$va['group_id'].",";

            }

            $groupstr=substr($groupstr,0,strlen($groupstr)-1);

            //echo "mmm".$groupstr;
			//exit;
			
			if($type=="Admin")
			{
				
			
				 $data['tasks'] = $task->taskfulllisting();
			}
			
			else
			{
				
			
			$data['tasks'] = $task->tasklisting($groupstr);
				
			}
			$i="0";
			foreach ($data['tasks'] as $va)
			{
				$groupid=$va[assigned_groups];
				$data[group_name][$i]=$task->groupname($groupid);
				$i=$i+1;
				
			}
			//print_r($data['categories']);
			
			
            
            $this->template->load('admin_blank', 'task_list',$data);

                   
             }

            //}
            //else{

                //redirect('error_page');

           // }

       
    }
	
	
	public function edit()
		{
            $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['edit_access'])
			{
		  $category = new App();
		  $this->app = new App();
		  $category_id=$this->uri->segment(3);
		  $data['result']=$category->editcategory($category_id);
		  $this->template->load('admin_blank','add_category',$data);

            }
            else{

                redirect('error_page');
            }
		}
    
    
    function add_comments()
    {
    
        
         

       $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	  

    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $comments = new App();
            $this->app = new App();
           
           // $this->form_validation->set_rules('comments', 'Comments', 'required');
           // $this->form_validation->set_rules('rating', 'Rating', 'required');


             
             
            
                $comments               = $this->input->post('comments');
			     $ordid               = $this->input->post('orderid');
                
                $commentdate=date('Y-m-d H:i:s');

                 #Review INSERT
                        $data               = array(
                            'comments'                   =>  $comments,
							'user_id'                   =>  $adminid,
							'comment_date'                   =>  $commentdate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_comments', $data);
			              $insertid=$this->db->insert_id();
			
			                  $task=" created new comments "."(".$comments.")";
			 $dataactivity              = array(
                            'type'                   =>  'comments',
				             'task'                   =>  $task,
							'user_id'                   =>  $adminid,
				             'comment_id'                   =>  $insertid,
							'activity_date'                   =>  $commentdate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_activity', $dataactivity );
			
			               echo json_encode($data);
                        
                        

                   
            

        }
        else
        {
            $this->template->load('admin','content');
        }
    }

    
   
	
	public function task_view()
		{
            $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);
		
		$orderid=$this->uri->segment(3);

			if($access['edit_access'])
			{
		  $task = new App();
		  $this->app = new App();
	$data['history']=$task->taskhistory($orderid);
		
		$ordid=$orderid;
     $data['order_details']=$task->getorderdetails($ordid); 
		
		$data['tasks']=$task->taskdetails($orderid); 
		
		
		

    $count=count($data['history']);

    
    $i="1";
    foreach ($data['history'] as $val)
    {
        
        //$j=$count-$i;
		
		/*
        
        if($val->type=="comments")
        {
			
			$check=$task->checkcomments($commentid);
			
			if($check)
			{
				
				
			

           $commentid= $val->comment_id;
           
            $data['commenthistory'][$i]=$task->taskcommenthistory($commentid);
				
			}
			else
			{
				
			$data['commenthistory'][$i]=array();	
				
			}

        

        
        }
        else{

            $fileid= $val->file_id;
            $data['filehistory'][$i]=$task->taskfilehistory($fileid);

            

           
        }
		
		*/

        $userid= $val->user_id;
        
        $data['userhistory'][$i]=$task->taskuserhistory($userid);

        $i=$i+1;

       
    }
    //exit;
		
		$data['task_status']=$task->taskstatus($orderid); 
    
		$data['orderid']=$orderid;
		 $this->template->load('admin_blank','task_view',$data);
          }
           else{

               redirect('error_page');
            }
		}
    
    

    function show_comments(){
      

        if($this->ion_auth->logged_in()==1)
        {
			$comments = new App();
            $this->app = new App();
			//$orderid=$this->uri->segment(3);
			$orderid=$_POST['orderid'];
			$data['comments'] = $comments->commentlisting($orderid);
			//print_r($data['categories']);
			
			echo json_encode($data['comments']);
			
			//$this->template->load('admin_blank','task_view',$data);
            
           // $this->template->load('admin_blank', 'category_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

   

    }
	
	
	function show_files(){
      

        if($this->ion_auth->logged_in()==1)
        {
			$files = new App();
            $this->app = new App();
			$orderid=$_POST['orderid'];
			$data['files'] = $files->filelisting($orderid);
			//print_r($data['categories']);
			
			echo json_encode($data['files']);
			
			//$this->template->load('admin_blank','task_view',$data);
            
           // $this->template->load('admin_blank', 'category_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

   

    }
	
	
	function attachment_upload(){
		
		 $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	  
		
		$attachment = new App();
        $this->app = new App();
        $config['upload_path']="./assets/files";
        $config['allowed_types']='gif|jpg|png|pdf|docx|doc';
        //$config['encrypt_name'] = TRUE;

        //$rand= rand(100,1000);

        //$adminid."_".$rand."_";

        $imagePrefix = time(); 
        $imagename = $imagePrefix."_".$_FILES['attachment']['name'];
$config['file_name'] = $imagename; 
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("attachment")){
            $data = array('upload_data' => $this->upload->data());
 
            //$title= $this->input->post('title');

           
            $image= $data['upload_data']['file_name']; 
			
			$ordid               = $this->input->post('orderid');
			
			$document               = $this->input->post('document');
			
			$filedate=date('Y-m-d H:i:s');
			
			  $data               = array(
                            'file_name'                   =>  $image,
				            'document_name'                   =>  $document,
							'user_id'                   =>  $adminid,				  
							'order_id'                   =>  $ordid,
				            'file_date'                   =>  $filedate
                           
                            
                        );
			
			 $result= $this->db->insert('task_files', $data);
			$insertid=$this->db->insert_id();
			
			$task="File "."(".$document.")";
			
			 $dataactivity              = array(
                            'type'                   =>  'files',
				             'task'                   =>  $task,
				            'file_id'                   =>  $insertid,
							'user_id'                   =>  $adminid,
							'activity_date'                   =>  $filedate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_activity', $dataactivity );
             
           // $result= $attachment->save_upload($image);
			  
			
			               echo json_encode($data);
            //echo json_decode($result);
        }
}

function delete_comments(){
      
	 $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	 

        if($this->ion_auth->logged_in()==1)
        {
			$comments = new App();
            $this->app = new App();
			
			$commentid=$_POST['comment_id'];
			$commentdetails=$comments->taskcommenthistory($commentid);
			 $this->db->where('comment_id', $commentid);
             $this->db->delete('task_comments');
			
			$commentdate=date('Y-m-d H:i:s');
			$ordid=$commentdetails['order_id'];
			$comments=$commentdetails['comments'];
			
			$task="comments deleted "."(".$comments.")";
			
			 $dataactivity              = array(
                            'type'                   =>  'comments',
				             'task'                   =>  $task,
							'user_id'                   =>  $adminid,
				             'comment_id'                   =>  $commentid,
							'activity_date'                   =>  $commentdate,
							'order_id'                   =>  $ordid
                           
                            
                        );
			$this->db->insert('task_activity', $dataactivity );
			echo json_encode(array(
				"statusCode"=>200
			));
        }
        else
        {
            $this->template->load('login_master','content');
        }

   

    }
	
	
	function delete_files(){
      
          $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
        if($this->ion_auth->logged_in()==1)
        {
			$comments = new App();
            $this->app = new App();
			
			$fileid=$_POST['file_id'];
			$filedetails=$comments->taskfilehistory($fileid);
			 $this->db->where('file_id', $fileid);
             $this->db->delete('task_files');
			
			$task="File Deleted "."(".$filedetails['document_name'].")";
			$filedate=date('Y-m-d H:i:s');
			$ordid=$filedetails['order_id'];
			
			$dataactivity              = array(
                            'type'                   =>  'files',
				             'task'                   =>  $task,
				            'file_id'                   =>  $fileid,
							'user_id'                   =>  $adminid,
							'activity_date'                   =>  $filedate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_activity', $dataactivity );
			echo json_encode(array(
				"statusCode"=>200
			));
        }
        else
        {
            $this->template->load('login_master','content');
        }

   

    }
	
	
	// Upload file/image method
    public function upl() {
		
		 $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	  
        //$this->load->library('upload');
		$imagePrefix = time(); 
        $imagename = $imagePrefix."_".$_FILES['upl_file']['name'];
$config['file_name'] = $imagename; 
		$this->load->library('upload',$config);
        $json = array();
        $path = "./assets/files";
        // Define file rules
        $initialize = $this->upload->initialize(array(
            "upload_path" => $path,
            "allowed_types" => "gif|jpg|jpeg|png|bmp|pdf|doc|docx",
			"file_name"     =>$config['file_name'],
            "remove_spaces" => TRUE
        ));
		 
		//$this->load->library('upload',$config);
        if (!$this->upload->do_upload('upl_file')) {
            $error = array('error' => $this->upload->display_errors());
            echo $this->upload->display_errors();
            $json = 'failed';
        } else {
			
			$data = array('upload_data' => $this->upload->data());
 
            //$title= $this->input->post('title');

           
            $image= $data['upload_data']['file_name']; 
			
           // $data = $this->upload->data();
			
			 $image= $data['upload_data']['file_name']; 
			
			$ordid               = $this->input->post('orderid');
			
			$document               = $this->input->post('document');
			
			$filedate=date('Y-m-d H:i:s');
			
			  $data               = array(
                            'file_name'                   =>  $image,
				            'document_name'                   =>  $document,
							'user_id'                   =>  $adminid,				  
							'order_id'                   =>  $ordid,
				            'file_date'                   =>  $filedate
                           
                            
                        );
			
			 $result= $this->db->insert('task_files', $data);
			$insertid=$this->db->insert_id();
			
			$task=" Created new File "."(".$document.")";
			
			 $dataactivity              = array(
                            'type'                   =>  'files',
				             'task'                   =>  $task,
				            'file_id'                   =>  $insertid,
							'user_id'                   =>  $adminid,
							'activity_date'                   =>  $filedate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_activity', $dataactivity );
             
           // $result= $attachment->save_upload($image);
			  
			               $json = 'success'; 
			               //echo json_encode($data);
        
			
            //$imagename = $data['file_name'];
            
        }
        header('Content-Type: application/json');
        echo json_encode($json);            
    }  
	

  function add_comments_update()
    {
    
        
         

       $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	  

    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $comments = new App();
            $this->app = new App();
           
           // $this->form_validation->set_rules('comments', 'Comments', 'required');
           // $this->form_validation->set_rules('rating', 'Rating', 'required');

            //update status
             
             
			
            
                $comments               = $this->input->post('comments_new');
			     $ordid               = $this->input->post('orderid');
			
			$status=$this->input->post('status');
			
			
			 $data               = array(
                           
							'status'                   =>  $status
							
                        );
			  $this->db->where('order_id', $ordid);
			  $this->db->update('order_tasks', $data);
                
                $commentdate=date('Y-m-d H:i:s');
			
			if($comments)
			{
				
				
			

                 #Review INSERT
                        $data               = array(
                            'comments'                   =>  $comments,
							'user_id'                   =>  $adminid,
							'comment_date'                   =>  $commentdate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_comments', $data);
			              $insertid=$this->db->insert_id();
				
			}
			else
			{
			 $insertid="0";	
				
			}
			if($insertid=="0")
			{
				
				$type="Task";
				if($status=="Processing")
				{
					
					$task=$status." Updated";
					
				}
				else
				{
					
					$task=$status;
				}
				
			}
			else
			{
				$type="comments";
				$task=$status." Comments "."(".$comments.")";
			}
			                  
			 $dataactivity              = array(
                            'type'                   =>  $type,
				             'task'                   =>  $task,
							'user_id'                   =>  $adminid,
				             'comment_id'                   =>  $insertid,
							'activity_date'                   =>  $commentdate,
							'order_id'                   =>  $ordid
                           
                            
                        );
                        
                  
                           $complted= $this->db->insert('task_activity', $dataactivity );
			
			              redirect("task/task_view/".$ordid);
                        
                        

                   
            

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
		  $task = new App();
		  $this->app = new App();
		  $task_id=$this->uri->segment(3);
		  $task->deletetask($task_id);
		  redirect('task');
            }
            else{

                redirect('error_page');
            }
		}
    

    
	
    
}
?>