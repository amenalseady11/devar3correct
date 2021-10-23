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
        $res = $this->db->get('catalog_product')->result();
		
		//echo $this->db->last_query();
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
	
	
	function getaccountinfo($userid)
    {
        $this->db->where('customer_id',$userid);       
        $query = $this->db->get('customers');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getaccountaddress_shipping($userid)
    {
        $this->db->where('customer_id',$userid);
		$this->db->where('def_ship',"1");		
        $query = $this->db->get('customer_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getaccountaddress_billing($userid)
    {
        $this->db->where('customer_id',$userid);
		$this->db->where('def_bill',"1"); 		
        $query = $this->db->get('customer_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getaccountaddress_all($userid)
    {
        $this->db->where('customer_id',$userid);
		$this->db->where('def_bill',"0");
		$this->db->where('def_ship',"0");
        $query = $this->db->get('customer_address');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function geteditaddress($id)
    {
        $this->db->where('id',$id);		
        $query = $this->db->get('customer_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	public function counttype($userid,$type)
   {
                 $query=$this->db->select('*')
                 ->where('customer_id',$userid) 
				->where('type',$type)   
                 ->get('customer_address');
               return  $query->num_rows();
   }


    function getorders($userid)
    {
        $this->db->where('customer_id',$userid);		
        $query = $this->db->get('orders');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	 function getorderdetails($orderid)
    {
        $this->db->select('*');	
        $this->db->from('orders');
		$this->db->join('order_item', 'order_item.order_id = orders.order_id');
		 $this->db->where('orders.order_id',$orderid);
		
		$res=$this->db->get()->result_array();
		
        return $res;
    }
    
     function getordersingle($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('orders');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function getitem($itemid)
    {
        $this->db->where('order_item_id',$itemid);		
        $query = $this->db->get('order_files');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    
}
?>