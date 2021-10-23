<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facebook_login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('facebook');

    }
    public function index()
    {
       
    }

    public function fblogin()
    {
        $data['user'] = array();
        if ($this->facebook->is_authenticated()) {
            // User logged in, get user details
            $user = $this->facebook->request('get', '/me?fields=id,name,email');
            if (!isset($user['error'])) {
               $data['user'] = $user;
               //echo $email        = $user['email'];
               //echo "<br>";
             //echo   $name = $user['name'];
             
             $name=$user['name'];
             
             $email=$user['email'];
             $namearr=explode(" ",$name);
             $firstname=$namearr[0];
             $lastname=$namearr[1];
             
             $query=$this->db->where(['customer_email'=>$email]);
	           $account=$this->db->get('customers')->row();
	           
	           $url=base_url()."myaccount/";
				
			//echo $this->db->last_query();
				      
                  if($account->customer_id)
				  {
				      
				     $this->session->set_userdata('uid',$account->customer_id);
				     
				     header("Location: $url");
				  }
				  else
				  {
				      if($email){
				    $data               = array(
                            'customer_firstname'         =>  $firstname,
							'customer_lastname'         =>  $lastname, 
                            'customer_email'        =>  $email,
							'customer_status'       =>  "1"
                            
                        );
				      }
				      else
				      {
				          
				          $data               = array(
                            'customer_firstname'         =>  $firstname,
							'customer_lastname'         =>  $lastname, 
							'customer_status'       =>  "1"
                            
                        ); 
				      }
                        
                        $complted= $this->db->insert('customers', $data);
						   $insert_id = $this->db->insert_id();
						   $this->session->set_userdata('uid',$insert_id);
						  header("Location: $url");
				  }

            }

        } else {
            $data['title'] = 'Login - IPL Quiz';
            $this->load->view('login', $data);
        }
    }

}
