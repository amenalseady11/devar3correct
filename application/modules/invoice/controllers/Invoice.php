<?php
class Invoice extends MY_Controller
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

			if($access['view_access']=="1" || $type=="Admin")
			{
	
    
     if($this->ion_auth->logged_in()==1)
        {
			$inv = new App();
            $this->app = new App();
			$data['invoices'] = $inv->invoicelisting();
		 
		
		 if($_POST[search])
		 {
			 $customer=$_POST['customer'];
			 $invno=$_POST['invoiceno'];
			 $status=$_POST['status'];
			$data['invoices'] = $inv->invsearchlisting($customer,$invno,$status); 
		 }
		 
		     $data['customers'] = $inv->customerlist();
		 
		 $k="0";
			
		 foreach ($data['invoices'] as $invoice)
				  {
			 
			 
			 $data['balancedue']="0";
			 
			 $invoiceid=$invoice->invoice_id;
			 
			 $data['check']=$inv->checkpayment($invoiceid);
				
				         $invtotal="0";
				
				         foreach ($data['check'] as $ch)
						 {
							 
							$invtotal=$invtotal+$ch['invoice_payment'];
						 }
						 
								 
				         
				
				          $data['invtotal']=$inv->invoicetotal($invoiceid);
				
				           $paymenttotal=$data['invtotal']['payment_total'];
			 
			 //echo $paymenttotal;
			 
			 $num=$paymenttotal-$invtotal;
			 
			    $data['baldue'][$invoiceid]=floatval($num);
			 
			
			
			
			 
			 
			 //echo "mmm".$data['balancedue'][$invoiceid]."<br>";
			 
			 $customerid=$invoice->customer_id;
			// echo $customerid;
			 
			 $orderid=$invoice->order_id;
					  
			 $data['customer'][$customerid]=$inv->customerlisting($customerid,$orderid);
			 
			 $scode=$data['customer'][$customerid]->country_code;
		$data['shipcountryarr'][$scode]=$inv->getcountryname($scode);
			 
			
		        $k=$k+1;
			       
				  }
		
			
		
            
            $this->template->load('admin_blank', 'invoice_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       }
       else{

        redirect('error_page');

       }
    }

       
   function inv_list()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
			$inv = new App();
            $this->app = new App();
			$data['invoices'] = $inv->invoicelisting();
		   
            
            $this->template->load('admin_blank', 'order_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }
	
	 function payment_invoice_view()
    {

        $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['edit_access']=="1" || $type=="Admin")
			{
	
    
     if($this->ion_auth->logged_in()==1)
        {
			$inv = new App();
            $this->app = new App();
			//$data['invoices'] = $inv->invoicelisting();
		   
            
            $this->template->load('admin_blank', 'payment_invoice_view',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }

       } else{
          
        redirect('error_page');

       }
    }
	
	
	
	 function invoice_view()
    {
    
     if($this->ion_auth->logged_in()==1)
        {
			$inv = new App();
            $this->app = new App();
			$data['invoices'] = $inv->invoicelisting();
		 
		 
            
            $this->template->load('admin_blank', 'invoice_view',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }

	
	
	public function edit()
		{
		  $des = new App();
		  $this->app = new App();
		  $designation_id=$this->uri->segment(3);
		  $data['result']=$des->editdesignation($designation_id);
		  $this->template->load('admin_blank','add_designation',$data);
		}
    
    
    function add_payment()
    {

        $user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
		$type=$user->type;
		$pageacces = new Main();
		$access=$pageacces->getpageaccess($adminid);

			if($access['add_access']=="1" || $type=="Admin")
			{


    
         $data['invoiceid'] = $this->uri->segment(3);
         

         

    
     $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        if($this -> ion_auth -> logged_in()==1)
        {
            $inv = new App();
            $this->app = new App();
            
			
			$data['employees'] = $inv->employeelist();
			
			
			$invoiceid               = $data['invoiceid'];
			
			
			 $data['check']=$inv->checkpayment($invoiceid);
				
				         $invtotal="0";
				
				         foreach ($data['check'] as $ch)
						 {
							 
							$invtotal=$invtotal+$ch['invoice_payment'];
						 }
						 
								 
				         
				
				          $data['invtotal']=$inv->invoicetotal($invoiceid);
				
				           $paymenttotal=$data['invtotal']['payment_total'];
			
			     $data['balance']=$paymenttotal-$invtotal;
			
			
         
         //print_r($data['editreview']);
            $this->form_validation->set_rules('payment', 'Payment', 'required');
           // $this->form_validation->set_rules('rating', 'Rating', 'required');


             
              if ($this->form_validation->run() == FALSE)
            {
                $this->template->load('admin_blank','add_payment',$data);
            }
            else
            {
            
                $payment               = $this->input->post('payment');
                $method                = $this->input->post('method');
				
				$collect                = $this->input->post('collect');
				$status                = "2";
				
				$payment_details                = $this->input->post('payment_details');
				
				$receipt_details                = $this->input->post('receipt_details');
               
                $paymentid               = $this->input->post('paymentid');
				
				 $invoiceid               = $this->input->post('invoiceid');
				
				$invoicedate=date('Y-m-d H:i:s');


                 #Review INSERT
                        $data               = array(
                            'invoice_payment'                   =>  $payment,
							'invoice_id'                   =>  $invoiceid,
                            'invoice_payment_method'               =>  $method,
                            'invoice_payment_date'                 =>  $invoicedate,
							'invoice_payment_status'                 =>  $status,
							'invoice_collected_by'                 =>  $collect,
							'payment_details'                 =>  $payment_details,
							'receipt_notes'                 =>  $receipt_details
							
                           
                           
                        );
                        
                    if($paymentid)
                        {
                           $this->db->where('payment_id', $paymentid);
                           $this->db->update('invoice_payments', $data);

                        }
                        else
                        {    
                           $complted= $this->db->insert('invoice_payments', $data);
							$insert_id = $this->db->insert_id();
							
							 $data               = array(
							'payment_id'                   =>  $insert_id,
							'type'                   =>  "invoice",
                            'invoice_payment'                   =>  $payment,
							'invoice_id'                   =>  $invoiceid,
                            'invoice_payment_method'               =>  $method,
                            'invoice_payment_date'                 =>  $invoicedate,
							'invoice_payment_status'                 =>  $status,
							'invoice_collected_by'                 =>  $collect,
							'payment_details'                 =>  $payment_details,
							'receipt_notes'                 =>  $receipt_details
							
                           
                           
                        );
							
							$this->db->insert('invoice_activity', $data);
							
							
                         }
				
				        
				         $data['check']=$inv->checkpayment($invoiceid);
				
				         $invtotal="0";
				
				         foreach ($data['check'] as $ch)
						 {
							 
							$invtotal=$invtotal+$ch['invoice_payment'];
						 }
						 
								 
				         
				
				          $data['invtotal']=$inv->invoicetotal($invoiceid);

                         
                         $orderid=$data['invtotal']['order_id'];
                         
				
				           $paymenttotal=$data['invtotal']['payment_total'];

                           if($invtotal > "0")
						 {
							 $status="Partially Paid";
							 
						  	 
							 
							  $data               = array(
                            'invoice_status'                   =>  $status
                        );
							 
							$this->db->where('invoice_id', $invoiceid);
                           $this->db->update('invoice', $data); 
						 }
                        
				
				         if($invtotal>=$paymenttotal)
						 {
							 $status="Paid";
							 
						  	 
							 
							  $data               = array(
                            'invoice_status'                   =>  $status
                        );
							 
							$this->db->where('invoice_id', $invoiceid);
                           $this->db->update('invoice', $data); 
						 }
				
				
				         if($paymenttotal=="0")
						 {
							 $status="UnPaid";
							 
						  	 
							 
							  $data               = array(
                            'invoice_status'                   =>  $status
                        );
							 
							$this->db->where('invoice_id', $invoiceid);
                           $this->db->update('invoice', $data); 
						 }


                         
						
						
				
				
                          $data['success']="success";                         
                          redirect('ad_order/payment_invoice_view/'.$orderid);

                   
             }

        }
        else
        {
            $this->template->load('admin','content');
        }

       } else{


        redirect('error_page');

       }
    }

    
   
	
	public function delete()
		{
		  $dep = new App();
		  $this->app = new App();
		  $designation_id=$this->uri->segment(3);
		  $dep->deletedesignation($designation_id);
		  redirect('designation/designation_list');
		}
    
    

    function designation_list(){
        if($this->ion_auth->logged_in()==1)
        {
			$des = new App();
            $this->app = new App();
			$data['designation'] = $des->designationlisting();
			//print_r($data['categories']);
            
            $this->template->load('admin_blank', 'designation_list',$data);
        }
        else
        {
            $this->template->load('login_master','content');
        }
    }


    
}
?>