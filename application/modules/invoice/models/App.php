<?php
class App extends CI_Model
{
   
    

    function invoicelisting()
    {
      $this->db->order_by("invoice_id","DESC");		
   $res = $this->db->get('invoice')->result();
		//$query=$this->db->get('invoice');
		
		
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	
	 function customerlisting($customerid,$orderid)
    {
        $this->db->select('*');
        $this->db->where('customer_id', $customerid);
		 $this->db->where('order_id', $orderid);
        $query = $this->db->get('customer_order_billing_address');
        $res=$query->row();
        return $res;
    }
    
    
    function editdesignation($designation_id)
    {
        $this->db->select('*');
        $this->db->where('designation_id', $designation_id);
        $query = $this->db->get('designation');
        $res=$query->row();
        return $res;
    }
	
	 function deletedesignation($designation_id)
    {
        
        $this->db->where('designation_id', $designation_id);
        $this->db->delete('designation');
       redirect('designation/designation_list');
    }

     function getcountryname($scode)
    {
        $this->db->where('country_code',$scode);		
        $query = $this->db->get('country');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	 function customerlist()
    {
      		
      $query = $this->db->get('customers');
		
		$res=$query->result_array();
		
        
       return $res;
    }
	
	 function invsearchlisting($customer,$invno,$status)
    {
		if($customer)
		{
			$this->db->where("customer_id", $customer);
		}
		 if($invno)
		{
			//$this->db->where("invoice_id", $invno);
            $invno=(int)$invno;
            $this->db->where('invoice_id', $invno);
		}
		 if($status)
		{
			$this->db->where("invoice_status", $status);
		}
		
		 
      $this->db->order_by("invoice_id", "desc");		
      $res = $this->db->get('invoice')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	
	 function employeelist()
    {
      		
      $query = $this->db->get('employee');
		
		$res=$query->result_array();
		
        
       return $res;
    }
	
	
	 function checkpayment($invoiceid)
    {
        $this->db->where('invoice_id',$invoiceid);		
        $query = $this->db->get('invoice_payments');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function invoicetotal($invoiceid)
    {
        $this->db->where('invoice_id',$invoiceid);		
        $query = $this->db->get('invoice');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	

 }
?>