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
	
	
	public function countaddress($userid)
   {
                 $query=$this->db->select('*')
                 ->where('customer_id',$userid) 				  
                 ->get('customer_address');
               return  $query->num_rows();
   }


    function getorders($userid)
    {
        $this->db->where('customer_id',$userid);
		$this->db->order_by('order_id',"DESC");
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
	
	 function getdeleteaddress($id)
    {
        $this->db->where('id',$id);		
        $this->db->delete('customer_address');
		
		
    }
	
	function getcountry()
    {
       
           
        $query = $this->db->get('country');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	 function getcountryname($shipcode)
    {
        $this->db->where('country_code',$shipcode);		
        $query = $this->db->get('country');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	 function getcurrentpassword($userid)
    {
        $this->db->where('customer_id',$userid);		
        $query = $this->db->get('customers');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getshippingorder($orderid)
    {
        $this->db->where('order_id',$orderid);		 		
        $query = $this->db->get('customer_order_shipping_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getbillingorder($orderid)
    {
        $this->db->where('order_id',$orderid);		 		
        $query = $this->db->get('customer_order_billing_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getviewproducts()
    {
              
        $res = $this->db->get('catalog_product')->result();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function ordernotes($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('order_comments');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function invoiceinfo($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('invoice');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function paymentinfo($invid)
    {
        $this->db->where('invoice_id',$invid);
		$this->db->order_by('payment_id',"desc");
        $query = $this->db->get('invoice_payments');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }


    
	 function getcollectedby($collect)
    {
        $this->db->where('employee_id',$collect);		
        $query = $this->db->get('employee');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function deletepayment($paymentid)
    {
       
		$this->db->where('payment_id',$paymentid);       
        $query = $this->db->delete('invoice_payments');
		
           
      
    }
	
	function getinvoice($paymentid)
    {
       $this->db->select('*');	
        $this->db->from('invoice_payments');
		$this->db->join('invoice', 'invoice_payments.invoice_id = invoice.invoice_id');		
		$this->db->where('invoice_payments.payment_id',$paymentid);
		$res=$this->db->get()->row_array();
		
		//echo $this->db->last_query();
		
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
	
	
	function getinvoiceorder($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('invoice');
		
		$res=$query->row_array();	
		
        return $res;
    }
	
	
	function paymentactivity($invid)
    {
        $this->db->where('invoice_id',$invid);
		$this->db->order_by('activity_id',"desc");
        $query = $this->db->get('invoice_activity');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }

	
	public function checkorder($orderid,$userid)
   {
                 $query=$this->db->select('*')
                 ->where('customer_id',$userid) 
				->where('order_id',$orderid)   
                 ->get('orders');
               return  $query->num_rows();
   }
	
	public function checkeditaddress($id,$userid)
   {
                 $query=$this->db->select('*')
                 ->where('customer_id',$userid) 
				->where('id',$id)   
                 ->get('customer_address');
               return  $query->num_rows();
   }

   function getnotifications($userid)
    {
        $this->db->where('customer_id',$userid);
		$this->db->order_by('comment_id',"DESC");
        $query = $this->db->get('order_comments');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    
}
?>