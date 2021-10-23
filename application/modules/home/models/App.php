<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Main');
    }
	
	
	function getcategoryproducts($categoryid)
    {
        $this->db->where('category',$categoryid); 
        $this->db->where('status','1');      
        $res = $this->db->get('catalog_product')->result();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getallproducts()
    {
              
        $res = $this->db->get('catalog_product')->result();
		
		//echo $this->db->last_query();
		//exit;
        return $res;
    }
	
	
	function getproducts($productid)
    {
        $this->db->where('product_id',$productid);       
        $res = $this->db->get('dependable_product')->result();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getproductsname($productid)
    {
        $this->db->where('product_id',$productid);       
        $query = $this->db->get('catalog_product');
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getproductsmap($productid)
    {
        $this->db->where('product_id',$productid);       
        $query = $this->db->get('product_map');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getprice($sql,$productid)
    {
        $sql=$sql." and dependable_product.product_id=$productid";
		
	     $query=$this->db->query($sql);
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getdepend($sql,$productid)
    {
        $sql=$sql." and dependable_product.product_id=$productid";
		
		//echo $sql;
		//exit;
		
	     $query=$this->db->query($sql);
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }


	
	 function getcountry()
    {
       
           
        $query = $this->db->get('country');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getorder_addressship($shipid)
    {
       
		$this->db->where('id',$shipid);       
        $query = $this->db->get('customer_address');		
		$res=$query->row_array();		
        return $res;
           
      
    }
	
	function getorder_addressbill($billid)
    {
       
		$this->db->where('id',$billid);       
        $query = $this->db->get('customer_address');		
		$res=$query->row_array();		
        return $res;
           
      
    }
	
	function gettempfiles($userid)
    {
       
		$this->db->where('customer_id',$userid);       
        $query = $this->db->get('temp_files');		
		$res=$query->result_array();
		//echo $this->db->last_query();
        return $res;
           
      
    }
	
	function deletetempfiles($userid)
    {
       
		$this->db->where('customer_id',$userid);       
        $query = $this->db->delete('temp_files');		
		
           
      
    }


	
	function getcartfiles($userid,$rowid)
    {
       
		$this->db->where('customer_id',$userid);
		$this->db->where('row_id',$rowid);
        $query = $this->db->get('cart_files');		
		$res=$query->result_array();
		//echo $this->db->last_query();
        return $res;
           
      
    }
	
	function deletecartfiles($userid)
    {
       
		$this->db->where('customer_id',$userid);       
        $query = $this->db->delete('cart_files');		
		
           
      
    }
	
	/*
	function geteditcartfiles($userid,$rowid)
    {
       
		$this->db->where('customer_id',$userid);
		$this->db->where('row_id',$rowid);
        $query = $this->db->get('cart_files');		
		$res=$query->result_array();
		//echo $this->db->last_query();
        return $res;
           
      
    }
	
	*/
	
	public function countaddress($userid)
   {
                 $query=$this->db->select('*')
                 ->where('customer_id',$userid) 				  
                 ->get('customer_address');
               return  $query->num_rows();
   }
	
	 function getcountryname($countrycode)
    {
        $this->db->where('country_code',$countrycode);		
        $query = $this->db->get('country');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    

    
    
	
	function getcheckout_addressshipping($userid)
    {
        $this->db->where('customer_id',$userid);		
		$this->db->order_by('def_ship',"DESC"); 
        $query = $this->db->get('customer_address');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	//------send password------------------
public function sendpassword($email)
{
		
	
	 $this->db->where('customer_email',$email);		
        $query = $this->db->get('customers');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
}	
	
public function createrandom($random,$email)
{
	/*
		     $data=array('random_num' =>$random);
            return $this->db->where('username','admin')
                ->update('ct_user',$data);
				
				*/
	
	
	     $this->db->where('customer_email',$email); 
	    $data=array('random_num' =>$random);
        $query = $this->db->update('customers',$data);	
}	
	
	
	public function checkrnd($random)
{
              
		
		 $this->db->where('random_num',$random);		
        $query = $this->db->get('customers');
		return  $query->num_rows();
}
	
	//----reset password details----------------------------


public function updatepassword($newpassword,$random)
{
				
	
	         $this->db->where('random_num',$random); 
	    $data=array('customer_password' =>$newpassword);
        $query = $this->db->update('customers',$data);	

}

//----reset password details----------------------------

	
public function resetrandom($random)
{
			$this->db->where('random_num',$random); 
	    $data=array('random_num' =>"");
        $query = $this->db->update('customers',$data);	

}


	
	
	
}
?>