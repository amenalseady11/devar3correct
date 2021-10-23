<?php
class App extends CI_Model
{
   
    

    function departmentlisting()
    {
      $this->db->order_by("department_name", "asc");
      $res = $this->db->get('departments')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editdepartment($department_id)
    {
        $this->db->select('*');
        $this->db->where('department_id', $department_id);
        $query = $this->db->get('departments');
        $res=$query->row();
        return $res;
    }
	
	 function deletedepartment($department_id)
    {
        
        $this->db->where('department_id', $department_id);
        $this->db->delete('departments');
       redirect('departments/department_list');
    }

    

 }
?>