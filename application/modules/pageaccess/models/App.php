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


    function getmenulinks()
    {
       
           
        $query = $this->db->get('menu_links');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function editmenus($menuid,$designationid)
    {
       
        $this->db->where('menu_id',$menuid);
        $this->db->where('designation_id',$designationid);	  
        $query = $this->db->get('page_access');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function getgroups()
    {
       
           
        $query = $this->db->get('groups');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function getdesignations()
    {
       
           
        $query = $this->db->get('designation');
		
		$res=$query->result_array();
		
		//echo $this->db->last_query();
        return $res;
    }


    function menucheck($menuid,$designationid)
    {
        $this->db->where('menu_id',$menuid);
        $this->db->where('designation_id',$designationid);		
        $query = $this->db->get('page_access');
		
		$res=$query->num_rows();
		
		//echo $this->db->last_query();
        return $res;
    }

    

 }
?>