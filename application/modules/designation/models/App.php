<?php
class App extends CI_Model
{
   
    

    function designationlisting()
    {
      $this->db->order_by("designation_name", "asc");
      $res = $this->db->get('designation')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editdesignation($designation_id)
    {
        $this->db->select('*');
        $this->db->where('designation_id', $designation_id);
        $query = $this->db->get('designation');
        $res=$query->row();
        return $res;
    }
	
	 function deletedesignation($designation_id)
    {
        
        $this->db->where('designation_id', $designation_id);
        $this->db->delete('designation');
       redirect('designation/designation_list');
    }

    

 }
?>