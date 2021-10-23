<?php
class App extends CI_Model
{
   
    

    function customerlisting()
    {
      $this->db->order_by("customer_id", "desc");
      $res = $this->db->get('customers')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editcustomer($customer_id)
    {
        $this->db->select('*');
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get('customers');
        $res=$query->row();
        return $res;
    }
	
	 function deletesupplier($customer_id)
    {
        
        $this->db->where('customer_id', $customer_id);
        $this->db->delete('customers');
       redirect('customers/customer_list');
    }


    function checkcustomer($email)
    {
        $this->db->where('customer_email',$email);        	
        $query = $this->db->get('customers');
		
		$res=$query->num_rows();
		
		//echo $this->db->last_query();
        return $res;
    }

    

 }
?>