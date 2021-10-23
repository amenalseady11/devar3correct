<?php
class App extends CI_Model
{
   
    

    function pagelisting()
    {
      $this->db->order_by("page_name", "asc");
      $res = $this->db->get('pages')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
    
    
    function editpage($page_id)
    {
        $this->db->select('*');
        $this->db->where('page_id', $page_id);
        $query = $this->db->get('pages');
        $res=$query->row();
        return $res;
    }
	
	 function deletepage($page_id)
    {
        
        $this->db->where('page_id', $page_id);
        $this->db->delete('pages');
       redirect('cms/page_list');
    }

    

 }
?>