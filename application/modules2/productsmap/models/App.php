<?php
class App extends CI_Model
{
   
    

    function productlisting()
    {
		
	  $this->db->select('*,cp.status as pstatus');
	  $this->db->from('catalog_product as cp');
      $this->db->join('catalog_category as cc', 'cp.category = cc.category_id');
      $this->db->order_by("cp.product_name", "asc");
      $res = $this->db->get()->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	function dependattributelisting()
    {
	  $this->db->where('status', "1");
      $this->db->order_by("dependable_attribute_name", "asc");
      $res = $this->db->get('dependable_attributes')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	function nondependattributelisting()
    {
       $this->db->where('status', "1");
      $this->db->order_by("dependable_attribute_name", "asc");
      $res = $this->db->get('dependable_attributes')->result();
       return $res;
    }
    
    
    
    
    function editproductmap($productmap_id)
    {
        $this->db->select('*');
        $this->db->where('product_map_id', $productmap_id);
        $query = $this->db->get('product_map');
        $res=$query->row();
		//echo $this->db->last_query();
		
        return $res;
    }
	
	 function deleteproductmap($productmap_id)
    {
        
        $this->db->where('product_map_id', $productmap_id);
        $this->db->delete('product_map');
		// echo $this->db->last_query();
		// exit;
        redirect('productsmap/productmap_list');
    }
	
	function productmaplisting()
    {
		
	  $this->db->select('*');	
	  $this->db->from('product_map');
	 $this->db->join('catalog_product', 'product_map.product_id = catalog_product.product_id');
      $res = $this->db->get()->result();
		//echo $this->db->last_query();
	
       return $res;
    }
	
	function checkproductid($product)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product);
        $query = $this->db->get('product_map');
        return $query->num_rows();
        
    }
	

    

 }
?>