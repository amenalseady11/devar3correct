<?php
class App extends CI_Model
{
   
    

    function attributelisting()
    {
      $this->db->order_by("dependable_attribute_name", "asc");
      $res = $this->db->get('non_dependable_attributes')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editattribute($attribute_id)
    {
        $this->db->select('*');
        $this->db->where('non_dependable_attribute_id', $attribute_id);
        $query = $this->db->get('non_dependable_attributes');
        $res=$query->row();
        return $res;
    }
	
	 function deleteattribute($attribute_id)
    {
        
        $this->db->where('non_dependable_attribute_id', $attribute_id);
        $this->db->delete('non_dependable_attributes');
       redirect('non_dependable_attributes/attribute_list');
    }

    

 }
?>