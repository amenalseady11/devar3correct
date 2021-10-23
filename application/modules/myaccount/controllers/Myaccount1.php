<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Myaccount extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
		if(! $this->session->userdata('uid')){
redirect('login');
}
        $this->load->model('Main');
        $this->load->model('App');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->load->library('form_validation');
        $this->load->library('Memcached_library');
		 // Load cart library
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
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$data['accountinfo'] = $app->getaccountinfo($userid);
		
		$this->form_validation->set_rules('email', 'Email', 'required');
		
		$customerid=$this->input->post('customerid');
		
		if ($this->form_validation->run()==false)
            {
			 
			 
				
             $this->template->load('frontend/myaccount', 'index', $data);
			  
            }
            else
            {
				
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');				
				$phone                  = $this->input->post('phone');
				
				$data               = array(
							
							'customer_firstname'       =>  $firstname,
						     'customer_lastname'     =>  $lastname,
					         'customer_phone'     =>  $phone
					    
						    
                            
                        );
					
				
		      $this->db->where('customer_id', $customerid);
              $this->db->update('customers', $data);
		
             redirect('myaccount');
				
			}
			  
         
        
	}
	
	
	public function account_address()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$data['addressshipping'] = $app->getaccountaddress_shipping($userid);
		
		$shipcode=$data['addressshipping'][country_code];
		$data['shippingcountry']=$app->getcountryname($shipcode);
		
		
		
		$data['addressbilling'] = $app->getaccountaddress_billing($userid);
		
		$billcode=$data['addressbilling'][country_code];
		$data['billingcountry']=$app->getcountryname($billcode);
		
		$data['alladdress'] = $app->getaccountaddress_all($userid);
		
		foreach ($data['alladdress'] as $val)
		{
			
			$countrycode=$val['country_code'];
			
		 $data['allname'][$countrycode]=$app->getcountryname($countrycode);
		}
		
		
		
		
		
				$this->template->load('frontend/myaccount', 'account_address', $data);
			
		
        
			  
         
        
	}
	
	
	public function editaddress()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$id=$this->uri->segment(2);
		
		 $data['countries'] = $app->getcountry();
			$data['editaddress'] = $app->geteditaddress($id);   
		  
		
		$this->template->load('frontend/myaccount', 'edit_address', $data);
		
		
		
		
			  
         
        
	}


public function updateaddress(){
	
	$main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
	
	$this->form_validation->set_rules('streetaddress', 'Address', 'required');
		
		$this->form_validation->set_rules('city', 'City', 'required');
		
		$this->form_validation->set_rules('state', 'State', 'required');
		
		$this->form_validation->set_rules('zip', 'Zipcode', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'edit_address', $data);
			  
            }
            else
            {
				$pid                  = $this->input->post('id');
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
				$streetaddress2                = $this->input->post('streetaddress2');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				
				
				 $data               = array(
							
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,
							'address2'         =>  $streetaddress2, 
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country
							
                            
                        );
				
				
				$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
				
				
				if($_POST['default'])
				{
					
					$data               = array(
							
							'def_bill'       =>  "0"
						     
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
					
					
					$data               = array(
							
							'def_bill'       =>  "1"
						     
						    
                            
                        );
					
					$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
						
					
				
					
				}
				
				if($_POST['defaultship'])
				{
					
					$data               = array(
							
							'def_ship'       =>  "0"
						    
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
					
					$data               = array(
							
							'def_ship'       =>  "1"
						     
						    
                            
                        );
					
					$this->db->where('id', $pid);				
                $this->db->update('customer_address', $data);
						
					
				}
				
				
		
				redirect('account_address');
			
			}
	
	
}
	
	
	public function new_address()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		//$data['accountaddress'] = $app->getaccountaddress_shipping($userid);
		
		
			
		$data['addresscount'] = $app->countaddress($userid);
		
		 $data['countries'] = $app->getcountry();
		
		$data['accountinfo'] = $app->getaccountinfo($userid);
		
		$this->form_validation->set_rules('streetaddress', 'Address', 'required');
		
		$this->form_validation->set_rules('city', 'City', 'required');
		
		$this->form_validation->set_rules('state', 'State', 'required');
		
		$this->form_validation->set_rules('zip', 'Zipcode', 'required');
		
		$this->form_validation->set_rules('country', 'Country', 'required');
		
		
		
		  if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'new_address', $data);
			  
            }
            else
            {
				
				
				$firstname               = $this->input->post('firstname');
				$lastname               = $this->input->post('lastname');
				$phone               = $this->input->post('phone');				
				$streetaddress               = $this->input->post('streetaddress');
				$streetaddress2                = $this->input->post('streetaddress2');
                $city                   = $this->input->post('city');
				$state                = $this->input->post('state');               
				$zip                  = $this->input->post('zip');
				$country                  = $this->input->post('country');
				
				if($_POST['default'])
				{
					
				$defaultbilling="1";
					
				}
				else{
					
				$defaultbilling="0";	
					
				}
				if($_POST['defaultship'])
				{
					
				$defaultshipping="1";
					
				}
				else{
					
				$defaultshipping="0";	
					
				}
				
				if($defaultbilling)
				{ 
					
					$data               = array(
							
							'def_bill'       =>  "0"
						    
						    
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);
						
					}
					
				

                
				 if($defaultshipping)
				{
					
					
					$data               = array(
							
							'def_ship'       =>  "0"
						   
                            
                        );
					
				$this->db->where('customer_id', $userid);				
                $this->db->update('customer_address', $data);	
						
					}
					
				
				
			if($data['addresscount']=="0")	 
			{
				
				$defaultbilling="1";
				$defaultshipping="1";
				
			}
			
		
		
		 $data               = array(
							'customer_id'       =>  $userid,
							'first_name'         =>  $firstname,
							'last_name'         =>  $lastname,
							'phone_number'         =>  $phone,
                            'address'         =>  $streetaddress,
							'address2'         =>  $streetaddress2, 
                            'city'        =>  $city,
							'state'     =>  $state, 
							'zip_code'       =>  $zip,
							'country_code'       =>  $country,
							'def_bill'       =>  $defaultbilling,
			                'def_ship'       =>  $defaultshipping
							
                            
                        );
				
				 $complted= $this->db->insert('customer_address', $data);
				
				redirect('account_address');
				
		
		  }
        
			  
         
        
	}
	
	
	
	public function orders()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$data['orders'] = $app->getorders($userid);  
		
		  
		  
		
		$this->template->load('frontend/myaccount', 'orders', $data);
		
		
	}
	
	
	public function order_details()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		
		$orderid=$this->uri->segment(2);
		
	    $data['order_details']=$app->getorderdetails($orderid); 
		
		
		
			
			
			
		
	    
		
		$g="0";
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$app->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $app->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $app->getshippingorder($orderid);
		
		$data['billing'] = $app->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$app->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$app->getcountryname($scode);
		
		
		  
		  
		
		$this->template->load('frontend/myaccount', 'order-details', $data);
		
		
	}
	
	
	public function deleteaddress()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$id=$this->uri->segment(2);
		
		
			$app->getdeleteaddress($id);   
		  
		
        return redirect('account_address');
			  
         
        
	}
	
	public function Change_password()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		/*
		$this->form_validation->set_rules('old-pass','Current Password','required');	
$this->form_validation->set_rules('new-pass','Password','required|min_length[8]|callback_valid_password');
$this->form_validation->set_rules('confirm-pass','Confirm Password','required|min_length[8]|matches[new-pass]');
 if ($this->form_validation->run()==false)
            {
			 
			 
				
              $this->template->load('frontend/myaccount', 'index', $data);
			  
            }
            else
            {*/
				
	
		
		$oldpass               = $this->input->post('old-pass');
	    $newpass              = $this->input->post('new-pass');
		
		$cpass=$app->getcurrentpassword($userid);
        $dbpass=$cpass[customer_password];
		
		$cpassword=md5($oldpass);
		
		if($dbpass==$cpassword){
			
	      $newpass=md5($newpass);
			
			$data               = array(
							
							'customer_password'       =>  $newpass
						     
						    
                            
                        );
			
			$this->db->where('customer_id', $userid);				
                $this->db->update('customers', $data);
			
			
			
			 $this->session->set_flashdata('message', 'Password Updated Successfully');
			
			 //$this->template->load('frontend/myaccount', 'index', $data);
			
			redirect('myaccount');
			 
		}
		else{
			
			
			 $this->session->set_flashdata('message', 'Old Password does not match');
			//$this->template->load('frontend/myaccount', 'index', $data);
			redirect('myaccount');
		}
		
       
		/*	} */
         
        
	}
	
	
	public function re_orders()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		
		$userid=$this->session->userdata('uid');
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		
		$orderid=$this->input->post('orderid');
		//echo "mmm".$orderid;
		
		$data['orddetails'] = $app->getorderdetails($orderid);
		//print_r($data['orddetails']);
		
		foreach ($data['orddetails'] as $items)
         {
			
			//echo "hhhhhh"."<br>";
					
				/*	
	
					$options=json_decode($items['product_options']);
			
			foreach ($options as $key=>$value)
							 {
						
						
				
				$options[]=array('name'=> $value->name,'value'=> $value->value);
						
			 } 
			$options=json_encode($options);
			
			*/
			
			//print_r($items);
			
			 //print_r($_POST);
			/*
		SELECT * FROM dependable_product,dependable_quantity WHERE dependable_product.dependable_id=dependable_quantity.dependable_id and dependable_product.dependable_values RLIKE '"name":"[[:<:]]width[[:>:]]"' and dependable_product.dependable_values RLIKE '"value":"[[:<:]]44[[:>:]]"' and dependable_product.non_dependable_values RLIKE '"name":"[[:<:]]Paper Weights[[:>:]]"'	
		
		*/
			
			
        $data = array(
            'id' => $items['product_id'], 
			'name'=>$items['name'],
            'price' => $items['unit_price'], 
            'qty' => $items['qty'],
			'comments' => $items['comments'],
			'options' =>$items['product_options']
        );
			
			
		
	$this->cart->insert($data);
			
			 $itemid= $items['id'];
			//echo "kkk".$itemid;
			$data['orderfiles'] = $app->getitem($itemid);
			
			//print_r($data['orderfiles']);
			
			foreach ($this->cart->contents() as $items)
         {
			$itemrowid=$items['rowid'];
		}
			
		 
			
			
			foreach ($data['orderfiles']  as $val)
			
		{
			
			$filename=$val['order_file_name'];
		
			
			    $data               = array(
					
					        'customer_id'         =>  $userid,
							'file_name'         =>  $filename,
					        'row_id'         =>  $itemrowid
					
                        );
				
				
					$complted= $this->db->insert('cart_files', $data);
			
			
		}
			
			
			
			
		}
		
		
		
	
        
		  
		
		redirect('cart');
		
		
	}
	
	
	
	
	
	public function logout()
	{
        $main =new Main();
        $app  = new App();
        $main = new Main();
        $data['main'] = $main;
        $data['app'] = $app;
		$this->session->unset_userdata('uid');
        $this->session->sess_destroy();
        return redirect('login');
			  
         
        
	}
	
	
	
	
	public function invoice()
		{
		
		 $this->load->library('pdf');
       $adorder = new App();
					$this->app = new App();
		
		 $orderid=$this->uri->segment(3);

		 $userid=$this->session->userdata('uid');

		 $num_check=$adorder->checkorder($orderid,$userid); 

		 if($num_check=="0")
		 {

			redirect('myaccount');
		 }
					 
					 $data['products']=$adorder->getviewproducts(); 
					 
					 
                       $ordid=$orderid;
                    $data['order_details']=$adorder->getorderdetails($ordid); 
					 
					 $g="0";
					
		
		foreach ($data['order_details'] as $item)
			
		{
			
			
		$itemid=$item['id'];
			
			//echo $itemid;
			
		$data['filearr'][$itemid]=$adorder->getitem($itemid);
			
			
		

       //print_r($data['filearr'][$itemid]);


      


			
			
		}
		
		
		
		
		
		//print_r($data['order_details']);
		
		$data['orders'] = $adorder->getordersingle($orderid);
		
		//$data['item_files'] = $app->getitemfiles($itemid); 
		
		
		$data['orderid'] = $orderid;
		
		$data['shipping'] = $adorder->getshippingorder($orderid);
		
		$data['billing'] = $adorder->getbillingorder($orderid);
		
		
		$shipcode=$data['billing'][country_code];
		$data['countryarr']=$adorder->getcountryname($shipcode);
		
		
		$scode=$data['shipping'][country_code];
		$data['shipcountryarr']=$adorder->getcountryname($scode);
		
		$data['ordernotes']=$adorder->ordernotes($orderid);
		 
		 $data['invoicedetails']=$adorder->invoiceinfo($orderid);
		 
		$invid=$data['invoicedetails'][invoice_id];
		
		 
	$data['invoicepayments']=$adorder->paymentinfo($invid);
		 
		 foreach ($data['invoicepayments'] as $pa)
		 {
			 
			 $collect=$pa['invoice_collected_by'];
			 
			
		 
		 $data['cby'][$collect]=$adorder->getcollectedby($collect);
			 
			//echo "jjj".$data['colledtedby'][$collect][employee_name];
			 
		 }
		 
		 $data['invoiceactivity']=$adorder->paymentactivity($invid);
		
		
		$invdate=date("d/m/Y", strtotime($data[invoicedetails]['invoice_date']));
		
		
		
		$html_content = '<style type="text/css">
		body {
    font-family: "Open Sans", sans-serif;
}
.invoice-wrap table {
    font-size: 12px;
}
		        table.table.table-hover.mb-0.text-md-nowrap td{
            padding: 10px 20px;
    border-bottom: 1px solid #e5e2f5 !important;
    color: #575757;
    font-size: 13px;
    font-weight: 500;
         }
         table.table.table-hover.mb-0.text-md-nowrap th {
    padding: 10px 20px;
    font-weight: 600;
    background-color: #f2f1f9;
        font-size: 13px;
}
table.table.table-hover.mb-0.text-md-nowrap {
  margin-top: 20px;
}
.total-row {
         background-color: #e5e5e5;
         /*border-bottom: 1px solid #555555;*/
         /*border-top: 1px solid #555555;*/
         }
         .total-table td {
         border-left: 1px solid #555555;
         }
         .total-table td:last-child {
         border-right: 1px solid #555555;
         }
         .total-table th:last-child {
         border-right: 1px solid #555555;
         }
.invoice-listing-table th {
         background-color: #e5e5e5;
         border-bottom: 1px solid #555555;
         border-top: 1px solid #555555;
         font-weight: bold;
         text-align: left;
         padding: 6px 4px;
		
         }
         .invoice-listing-table td {
         border-bottom: 1px solid #555555;
         text-align: left;
         padding: 5px 6px;
         vertical-align: top;
		
		
         }
         .invoice-wrap h1 {
    font-size: 28px;
}


.invoice-wrap {
    width: 700px;
    margin: 0 auto;
    background: #FFF;
    color: #000;
}
	</style>
</head>
<body>


<div id="invoice_id" class="tab-pane fade in active show">
                                                <div class="invoice-wrap">
                                                   <div class="invoice-inner">
                                                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                         <tbody>
                                                            <tr>
                                                               <td width="33%">
                                                                  <img src="'.base_url().'assets/deyar/img/brand/logo.png" style="width: 150px;">
                                                               </td>
                                                               <td class="text-left" valign="top" width="33%">
                                                                 
                                                                    <p>
                                                                     <span class="bussines-name">Deyar</span><br>
                                                                     Fahad ibn ibrahim<br>
                                                                     Malaz<br>
                                                                     Riyadh, AL Riyadh 11242 <br>
                                                                     VAT : 3000742361400003

                                                                  </p>
                                                                  
                                                               </td>
                                                               <td class="text-right" valign="top">
                                                                  <h1>Invoice</h1>
                                                               </td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                      <div class="invoice-address" style="padding-top: 20px;border-top: 1px solid darkgrey;">
                                                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                            <tbody>
                                                               <tr>
                                                                  <td id="second_left" width="65%" class="text-left" valign="top">
                                                                      <p>
                                                                        <strong>Bill to:</strong><br>
																		
                                                                       '.$data['billing']['first_name'].'&nbsp;'.$data['billing']['last_name'].'<br>
											'.$data['billing']['address'].'<br>
											'.$data['billing']['city'].'<br>
											'.$data['billing']['state'].'<br>
											'.$data['countryarr']['country_name'].'<br>
											<a href="tel:'.$data['billing']['phone_number'].'"> '.$data['billing']['phone_number'].'</a>

                                                                     </p>
                                                                     <p>
                                                                        <strong>Ship to:</strong><br>
                                                                        '.$data['shipping']['first_name'].'&nbsp;'.$data['shipping']['last_name'].'<br>
											'.$data['shipping']['address'].'<br>
											'.$data['shipping']['city'].'<br>
											'.$data['shipping']['state'].'<br>
											'.$data['shipcountryarr']['country_name'].'<br>
											<a href="tel:'.$data['shipping']['phone_number'].'"> '.$data['shipping']['phone_number'].'</a>

                                                                     </p>
                                                                  </td>
                                                                  <td id="second_right" width="35%" class="text-right" valign="top">
                                                                     <table id="invoice_fields" border="0" cellspacing="0" cellpadding="0" class="text-right float-right">
                                                                        <tbody>
                                                                           <tr>
                                                                              <td class="text-right">
                                                                                 <strong>Invoice </strong>
                                                                              </td>
                                                                              <td style="padding-left:20px;" class="text-left">
                                                                                 #0000'.$data[invoicedetails]['invoice_id'] .'                                       
                                                                              </td>
                                                                           </tr>
                                                                           <tr>
                                                                              <td class="text-right"><strong>Invoice Date</strong></td>
                                                                              <td style="padding-left:20px;" class="text-left">'.$invdate.'</td>
                                                                           </tr>
                                                                          
                                                                        </tbody>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </tbody>
                                                         </table>
                                                      </div>
                                                      <table cellspacing="0" cellpadding="2" border="0" width="100%" id="listing_table" class="invoice-listing-table total-table" style="">
                                                         <tbody>
                                                            <tr>
                                                               <th width="" bgcolor="#E5E5E5" style="border-left:1px solid #555;">Item</th>
                                                               <th width="210" bgcolor="#E5E5E5">Description</th>
                                                               <th width="80" bgcolor="#E5E5E5">Unit Price</th>
                                                               <th width="40" bgcolor="#E5E5E5">Qty</th>
                                                               <th width="60" bgcolor="#E5E5E5">Subtotal</th>
                                                            </tr>';
		
		            
				$total="0";
				 $tot="0";
				foreach ($data[order_details] as $items)
{
					
					
					$total=$total+$item['price'];
					
					
	
					$options=json_decode($items['product_options']);
					
					$co="0";
					
										
                                                            $html_content.='<tr>
                                                               <td width="">'.$items['name'].'</td>
                                                               <td width="210">';
					
					foreach ($options as $key=>$value)
							 {
						
						if($co<=1){
							
						
						
						$subprice=$items['price']*$items['qty'];
								 
						
           
             
            
						///echo $value->name." : <b>".$value->value."</b><br>";
							
							$html_content.=''.$value->name.'&nbsp;<b>'.$value->value.'</b><br>';
						
           
			$co=$co+1; } 
			  } 
					
					 $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				
					
					$html_content.='</td>
                                                               <td width="80">'.$items['unit_price'].'</td>
                                                               <td width="40">'.$items['qty'].'</td>
                                                               <td width="80">'.$pr.' SR</td>
                                                            </tr>';
					
				}
		
		
	
	if($orders['vat_price'])
	{
	  $vat=$orders['vat_price'];
		
	}
	else
	{
	  $vat=$tot*15/100;	
	}
															 
															 
	$gtotal=$orders['shipping_price']+$vat+$tot-$orders['discount'];
	
	$grandtotal=$orders['shipping_price']+$vat+$tot-$orders['discount']-$orders['deposit'];
	   
	 
                                                             $html_content.='
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Subtotal:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$tot.' SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Discount:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">-'.$data[orders]['discount'].' SR</td>
                                                            </tr>
                                                            <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>VAT (15%):</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$vat.' SR</td>
                                                            </tr>
															 <tr class="">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Shipping :</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$data[orders]['shipping_price'].' SR</td>
                                                            </tr>
                                                            <tr class="total-row">
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Total:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$gtotal.' SR</td>
                                                            </tr>';
		$duepayment="0"; 
															 
															 foreach ($data[invoicepayments] as $payments) {
	
	   $duepayment=$duepayment+$payments['invoice_payment'];
	
	
}
															 
														$duepaymenttotal=$data[invoicedetails]['payment_total']-$duepayment;
															 $deposit=$data[orders]['deposit']+$duepayment;
															 
                                                           $html_content.='<tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Paid:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$deposit.' SR</td>
                                                            </tr>
                                                            <tr>
                                                               <td style="border:none" bgcolor="#FFF" colspan="2"></td>
                                                               <td style="border-left:none;border-right:none;" colspan="2"><strong>Balance Due:</strong></td>
                                                               <td style="border-left:none;border-right:none;" class="text-left">'.$duepaymenttotal.' SR</td>
                                                            </tr>
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                             </div>';
		$invoiceid=$data[invoicedetails]['invoice_id'];
												
			
			$this->pdf->loadHtml($html_content);
			$this->pdf->render();
			$this->pdf->stream($invoiceid.".pdf", array("Attachment"=>0));
					
		
		}
	



}

