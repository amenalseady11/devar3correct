<?php
class App extends CI_Model
{
   
    

    function categorylisting()
    {
      $this->db->order_by("category_name", "asc");
      $res = $this->db->get('catalog_category')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editcategory($category_id)
    {
        $this->db->select('*');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('catalog_category');
        $res=$query->row();
        return $res;
    }
	
	 function deletecategory($category_id)
    {
        
        $this->db->where('category_id', $category_id);
        $this->db->delete('catalog_category');
       redirect('category/category_list');
    }

    

 }
?>