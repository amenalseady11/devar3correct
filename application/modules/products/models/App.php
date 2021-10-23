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
	
	function categorylisting()
    {
      $this->db->order_by("category_name", "asc");
      $res = $this->db->get('catalog_category')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    
    function editproduct($product_id)
    {
        $this->db->select('*');
        $this->db->where('product_id', $product_id);
        $query = $this->db->get('catalog_product');
        $res=$query->row();
        return $res;
    }
	
	 function deleteproduct($product_id)
    {
        
        $this->db->where('product_id', $product_id);
        $this->db->delete('catalog_product');
       redirect('products/product_list');
    }

    

 }
?>