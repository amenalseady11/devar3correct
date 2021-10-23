<?php
class App extends CI_Model
{
   
    

    function grouplisting()
    {
      $this->db->order_by("group_name", "asc");
      $res = $this->db->get('groups')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editgroup($group_id)
    {
        $this->db->select('*');
        $this->db->where('group_id', $group_id);
        $query = $this->db->get('groups');
        $res=$query->row();
        return $res;
    }
	
	 function deletegroups($group_id)
    {
        
        $this->db->where('group_id', $group_id);
        $this->db->delete('groups');
       redirect('groups/group_list');
    }

     function emplisting()
    {
      $this->db->order_by("fullname");
      $res = $this->db->get('users')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	function unselectedmembers($memb)
    {
      $this->db->where_not_in('id', $memb);
      $res = $this->db->get('users')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	function selectedmembers($memb)
    {
      $this->db->where_in('id', $memb);
      $res = $this->db->get('users')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    

 }
?>