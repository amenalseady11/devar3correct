<?php
class App extends CI_Model
{
   
    

    function supplierlisting()
    {
      $this->db->order_by("supplier_name", "asc");
      $res = $this->db->get('suppliers')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editsupplier($supplier_id)
    {
        $this->db->select('*');
        $this->db->where('supplier_id', $supplier_id);
        $query = $this->db->get('suppliers');
        $res=$query->row();
        return $res;
    }
	
	 function deletesupplier($supplier_id)
    {
        
        $this->db->where('supplier_id', $supplier_id);
        $this->db->delete('suppliers');
       redirect('supplier/supplier_list');
    }

    

 }
?>