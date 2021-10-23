<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->library('form_validation');
        $this->load->library('Memcached_library');
		 $this->load->library('cart');
        error_reporting(0);
    }

	public function index()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		//$categoryid="14";
		
		//$categoryid=$this->uri->segment(2);
      
		//$data['categoryproducts'] = $app->getcategoryproducts($categoryid);
		
		
		
		//echo "hai";
		//exit;
		
		
        $this->template->load('frontend/cart', 'index', $data);
	}
	
	public function category()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		//$categoryid="14";
		
		$categoryid=$this->uri->segment(3);
		//echo $categoryid."<br>";
      
		$data['categoryproducts'] = $app->getcategoryproducts($categoryid);
		
		
		
		
		
		
        $this->template->load('frontend/home', 'index', $data);
	}
	
	
	
	 function delete_cart(){ 
		 
		 $rowid=$this->uri->segment(3);
        $data = array(
            'rowid' => $rowid, 
            'qty' => 0, 
        );
        $this->cart->update($data);
		 
		 redirect('cart');
        //echo $this->show_cart();
    }
	
     function update_cart(){ 
		 
		 $rowid=$this->input->post('rowid');
		 $qt='qty_'.$rowid;
		  $qty=$this->input->post($qt);
        $data = array(
            'rowid' => $rowid, 
            'qty' => $qty, 
        );
        $this->cart->update($data);
		 
		 redirect('cart');
        //echo $this->show_cart();
    }


}

