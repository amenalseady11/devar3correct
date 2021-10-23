<?php
class App extends CI_Model
{
   
    

   
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
	
	 function orgproductlisting()
    {
		
	  $this->db->select('*');
	  $this->db->from('dependable_product as dp');
      $this->db->join('catalog_product as cp', 'cp.product_id = dp.product_id');      
      $res = $this->db->get()->result();
		
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
	
	
	
    

 }
?>