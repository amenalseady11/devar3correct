<?php
class App extends CI_Model
{
   
    

    function employeelisting()
    {
      $this->db->order_by("fullname", "asc");
      $res = $this->db->get('users')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }

    function designationlisting()
    {
      $this->db->order_by("designation_name", "asc");
      $res = $this->db->get('designation')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }

    function departmentlisting()
    {
      $this->db->order_by("department_name", "asc");
      $res = $this->db->get('departments')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editemployee($employee_id)
    {
        $this->db->select('*');
        $this->db->where('id', $employee_id);
        $query = $this->db->get('users');
        $res=$query->row();
        return $res;
    }
	
	 function deleteemployee($employee_id)
    {
        
        $this->db->where('id', $employee_id);
        $this->db->delete('users');
       redirect('employee/employee_list');
    }

    function getdes($desid)
    {
        $this->db->select('*');
        $this->db->where('designation_id', $desid);
        $query = $this->db->get('designation');
        $res=$query->row();
        return $res;
    }

    

 }
?>