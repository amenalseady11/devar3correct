<?php
class App extends CI_Model
{
   
    

   
    function orderlisting()
    {
		
	   $this->db->select('*');
		 $this->db->from('customers as cu');
      $this->db->join('orders as ord', 'ord.customer_id = cu.customer_id'); 
		$this->db->order_by(order_id,"desc");
      $res = $this->db->get()->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	 function orgproductlisting()
    {
		
	  $this->db->select('*');	      
      $res = $this->db->get('orders')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	
	  function checkdependable($product)
    {
	  $this->db->where('product_id', $product); 
      
	$query = $this->db->get('product_map');
        $res=$query->row();
		//echo $this->db->last_query();
		
        return $res;
	
       
    }
	
	function productmaplisting($product)
    {
	  $this->db->where('product_id', $product); 
      
	$query = $this->db->get('product_map');
        $res=$query->row();
		
        return $res;
	
       
    }
	
	
	 function productlisting()
    {
		
	  $this->db->select('*,cp.status as pstatus');
	  $this->db->from('catalog_product as cp');
      $this->db->join('product_map as pm', 'pm.product_id = cp.product_id');
      $this->db->order_by("cp.product_name", "asc");
      $res = $this->db->get()->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
	  function viewdependant($view_id)
    {
	  $this->db->where('dp.dependable_id', $view_id); 
      
	 $this->db->select('*,dq.price as dprice');
	  $this->db->from('dependable_product as dp');
      $this->db->join('dependable_quantity as dq', 'dq.dependable_id = dp.dependable_id'); 
	$this->db->join('catalog_product as cp', 'cp.product_id = dp.product_id'); 
      $res = $this->db->get()->result();
	
        return $res;
    }
	
	function dependantproducts($view_id)
    {
	  $this->db->where('dependable_id', $view_id); 
      
	$query = $this->db->get('dependable_product');
        $res=$query->row();
		
        return $res;
	
       
    }
	
	function edit_orgproduct($orgproduct_id)
    {
	  $this->db->where('dependable_id', $orgproduct_id); 
      
	$query = $this->db->get('dependable_product');
        $res=$query->row();
		
        return $res;
	
       
    }
	
	function deleteorgproduct($orgproduct_id)
    {
        
        $this->db->where('dependable_id', $orgproduct_id);
        $this->db->delete('dependable_product');
		 $this->db->where('dependable_id', $orgproduct_id);
        $this->db->delete('dependable_quantity');
		// echo $this->db->last_query();
		// exit;
        redirect('orgproducts/orgproduct_list');
    }
	
	
	 function getorderdetails($ordid)
    {
        $this->db->select('*');	
        $this->db->from('orders');
		$this->db->join('order_item', 'order_item.order_id = orders.order_id');
		 $this->db->where('orders.order_id',$ordid);
		
		$res=$this->db->get()->result_array();
		
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
	
	
     function getordersingle($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('orders');
		
		$res=$query->row_array();
		
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

	function getprice($sql,$productid)
    {
        $sql=$sql." and dependable_product.product_id=$productid";
		
	     $query=$this->db->query($sql);
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	 function getcustomers()
    {
		
	  $this->db->select('*');	      
      $res = $this->db->get('customers')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	
	function geteditaddress($id)
    {
        $this->db->where('id',$id);		
        $query = $this->db->get('customer_order_shipping_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function geteditbillingaddress($id)
    {
        $this->db->where('id',$id);		
        $query = $this->db->get('customer_order_billing_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function getorderitems($itemid)
    {
        $this->db->where('id',$itemid);		
        $query = $this->db->get('order_item');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
	function gettempfiles($randomid)
    {
       
		$this->db->where('randomid',$randomid);       
        $query = $this->db->get('temp_files');		
		$res=$query->result_array();
        return $res;
           
      
    }
	
	function getuser($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('orders');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function deletetempfiles($randomid)
    {
       
		$this->db->where('randomid',$randomid);       
        $query = $this->db->delete('temp_files');		
		
           
      
    }
	
	
	function getviewproducts()
    {
              
        $res = $this->db->get('catalog_product')->result();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function deleteorderitem($itemid)
    {
       
		$this->db->where('id',$itemid);       
        $query = $this->db->delete('order_item');
		
           
      
    }
	

	function checkinvoiceorder($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('invoice');
		
		$res=$query->num_rows();
		
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
        $this->db->where('id',$collect);		
        $query = $this->db->get('users');
		
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

	
	function cartlisting($adminid,$rowid)
    {
       
		$this->db->where('admin_id',$adminid); 
		$this->db->where('row_id',$rowid);
        $query = $this->db->get('admin_cart');		
		$res=$query->result_array();
        return $res;
           
      
    }
	
	function deleteadmincart($admincartid)
    {
       
		$this->db->where('admin_cart_id',$admincartid);       
        $query = $this->db->delete('admin_cart');
		
           
      
    }

    function getorderitemdetails($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('order_item');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
		 
        return $res;
    }
	
	function getshippingaddress($customerid)
    {
        $this->db->where('customer_id',$customerid);		
		$this->db->order_by('def_ship',"DESC"); 
        $query = $this->db->get('customer_address');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getbillingaddress($customerid)
    {
        $this->db->where('customer_id',$customerid);		
		$this->db->order_by('def_bill',"DESC"); 
        $query = $this->db->get('customer_address');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	
    function getshipping($cuid)
    {
        $this->db->where('id',$cuid);	
		
        $query = $this->db->get('customer_address');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function getadmincartfiles($adminid,$cartid)
    {
       
		$this->db->where('admin_id',$adminid); 
		$this->db->where('admin_cart_id',$cartid);  
        $query = $this->db->get('admin_files');		
		$res=$query->result_array();
        return $res;
           
      
    }
	
	function getgroups()
    {
       
		 $this->db->where('group_status',"1"); 
        $query = $this->db->get('groups');		
		$res=$query->result_array();
		//echo $this->db->last_query();
        return $res;
           
      
    }
	
	public function gettaskorder($orderid)
   {
                 $query=$this->db->select('*')
                 ->where('order_id',$orderid) 				  
                 ->get('order_tasks');
               return  $query->num_rows();
   }

   function getpreviousdiscount($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('orders');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

 }
?>