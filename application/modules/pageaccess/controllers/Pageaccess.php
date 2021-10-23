<?php
class Pageaccess extends MY_Controller
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
            $page = new App();
            $this->app = new App();
           // $data['products'] = $review->productslisting();
            $this->form_validation->set_rules('designation', 'Designation Name', 'required');
            //$this->form_validation->set_rules('rating', 'Rating', 'required');
           // $departmentid=$this->input->post('departmentid');
          
           $data[designations]=$page->getdesignations();          
          $menulinks=$page->getmenulinks();

          $designationid=$_POST['designation'];
             
              if ($this->form_validation->run() == FALSE)
            {
				
                $this->template->load('admin_blank','add_pageaccess',$data);
            }
            else
            {
            
               // $group               = $this->input->post('group');

               foreach ($menulinks as $menus)
                    {


                      $menuid=$menus[menu_id];

                   $checklink=$page->menucheck($menuid,$designationid);   

                $addmenu="add_".$menus[menu_id];
                $editmenu="edit_".$menus[menu_id];
                $deletemenu="delete_".$menus[menu_id];
                $viewmenu="view_".$menus[menu_id];

                if($_POST[$addmenu]=="1")
                {
                  $addpost="1";
                }
               else{

                $addpost="0";
               }

               if($_POST[$editmenu]=="1")
                {
                  $editpost="1";
                }
               else{

                $editpost="0";
               }


               if($_POST[$deletemenu]=="1")
                {
                  $deletepost="1";
                }
               else{

                $deletepost="0";
               }

               if($_POST[$viewmenu]=="1")
               {
                 $viewpost="1";
               }
              else{

               $viewpost="0";
              }




              
              

                 #Pageaccess INSERT
                        $data               = array(
                            'menu_id'                   =>  $menuid,                            
                            'designation_id'            =>  $designationid,							
                            'add_access'                 =>  $addpost,
                            'edit_access'                   =>  $editpost,                            
                            'delete_access'            =>  $deletepost,							
                            'view_access'                 =>  $viewpost
                            
                        );

                        if($checklink=="1")
                        {
                           $this->db->where('menu_id', $menuid);
                           $this->db->where('designation_id', $designationid);
                           $this->db->update('page_access', $data);

                        } else
                        {
                                    $complted= $this->db->insert('page_access', $data);
                        }
			


                      }
                 
				
				      
                        $data['success']="success";				       
                        redirect('pageaccess');
				
			}

                   
             }

            }else
            {

              redirect('error_page');
            }

       
    }
	
	
	public function edit()
		{
		  $depart = new App();
		  $this->app = new App();
		  $department_id=$this->uri->segment(3);
		  $data['result']=$depart->editdepartment($department_id);
		  $this->template->load('admin_blank','add_department',$data);
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
		  $dep = new App();
		  $this->app = new App();
		  $department_id=$this->uri->segment(3);
		  $dep->deletedepartment($department_id);
		  redirect('departments/department_list');
		}
    
    

    function accessdetails(){
     
     

     
      
          $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;

        $menulinks=$app->getmenulinks();

        $designationid=$_POST['designation'];
		
		
		?>
			

					<table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Pages</th>
            <th scope="col">View</th>
            <th scope="col">Add</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($menulinks as $menus)
         {

          $view_menu="view_".$menus['menu_id'];
          $add_menu="add_".$menus['menu_id'];
          $edit_menu="edit_".$menus['menu_id'];
          $delete_menu="delete_".$menus['menu_id'];

          $menuid=$menus['menu_id'];

          $pageaccess=$app->editmenus($menuid,$designationid);
          //print_r($pageaccess);

          $addaccess=$pageaccess[add_access];

          if($addaccess=="1")
          {

          $addcheck="checked";  
          }
          else{

            $addcheck=""; 
          }


          $editaccess=$pageaccess[edit_access];

          if($editaccess=="1")
          {

          $editcheck="checked";  
          }
          else{

            $editcheck=""; 
          }


          $deleteaccess=$pageaccess[delete_access];

          if($deleteaccess=="1")
          {

          $deletecheck="checked";  
          }
          else{

            $deletecheck=""; 
          }

          $viewaccess=$pageaccess[view_access];

          if($viewaccess=="1")
          {

          $viewcheck="checked";  
          }
          else{

            $viewcheck=""; 
          }


          
           ?>
          <tr>
            <td>
              
                <div class="custom-control custom-checkbox">
                <?php echo ucfirst($menus['menu_name'])?>
				</div>
                  
            
                  
              
            </td>
            <td> <div class="custom-control custom-checkbox">
                 <input class="form-check-input" type="checkbox" value="1" id="<?php echo $view_menu?>" name="<?php echo $view_menu?>" <?php echo $viewcheck?>>
				</div></td>
            <td><div class="custom-control custom-checkbox">
                 <input class="form-check-input" type="checkbox" value="1" id="<?php echo $add_menu?>" name="<?php echo $add_menu?>" <?php echo $addcheck?>>
				</div></td>
            <td><div class="custom-control custom-checkbox">
                 <input class="form-check-input" type="checkbox" value="1" id="<?php echo $edit_menu?>" name="<?php echo $edit_menu?>" <?php echo $editcheck?>>
				</div></td>
            <td><div class="custom-control custom-checkbox">
                 <input class="form-check-input" type="checkbox" value="1" id="<?php echo $delete_menu?>" name="<?php echo $delete_menu?>" <?php echo $deletecheck?>>
				</div></td>
          </tr>

          <?php } ?>
          
        </tbody>
      </table>
				
      
<?php
		
			
			
	
        
          
     
        
     }
	

    
}
?>