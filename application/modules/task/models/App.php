<?php
class App extends CI_Model
{
   
    

    function tasklisting($groupstr)
    { 
		/*
        $this->db->where_in('assigned_groups', $groupstr);         
      $this->db->order_by("assigned_date", "asc");
      $res = $this->db->get('order_tasks')->result();
		
		echo $this->db->last_query();
		exit;
        
       return $res;
	   
	   */
       
      
       //$searchValues  = [1,2,5,6];
		
		if($groupstr==""){$groupstr="0"; }
	   
	   $searchValues  = explode(",",$groupstr);
    $this->db->select('*')->from('order_tasks');
    $this->db->group_start();
   foreach($searchValues as $value)
    {
        $this->db->or_where("find_in_set($value,assigned_groups)!=", 0);
    }
   $this->db->group_end();
    $res = $this->db->get()->result_array();
		
	//echo $this->db->last_query();
		//exit;
		
		return $res;

   
    }
	
	function taskfulllisting()
    {
      $this->db->order_by("task_id", "desc");
     $query = $this->db->get('order_tasks');
		
		$res=$query->result_array();
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	
	function taskdetails($orderid)
    {
       $this->db->where('order_id', $orderid);
     $query = $this->db->get('order_tasks');
		
		$res=$query->row_array();
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }


	
	
	function groupname($groupid)
    {
      $returnstr="";
		$grouparr=explode(",",$groupid);
		foreach ($grouparr as $gr)
		{
			
		
       $this->db->where('group_id', $gr);
        $query = $this->db->get('groups');
        $res=$query->row();
			
			$returnstr.=$res->group_name.", ";
			
		}
		
		
        
       return $returnstr;
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


    public function getgroups($adminid)
   {
		/*
    $this->db->where_in('group_members',$adminid); 
    $query = $this->db->get('groups');		
    $res=$query->result_array();
    echo $this->db->last_query();
    //exit;
    return $res;
	
	*/
		 
    $this->db->select('*')->from('groups');
    
     $this->db->where("find_in_set($adminid, group_members)");
  
    
    $res = $this->db->get()->result_array();
		// echo $this->db->last_query();
		//exit;
	return $res;
   }
	
	function commentlisting($orderid)
    {
		
	  $this->db->select('*');
	  $this->db->from('task_comments as tc');
      $this->db->join('users as us', 'tc.user_id = us.id'); 
	  $this->db->where("tc.order_id", $orderid);
      $this->db->order_by("tc.comment_id", "desc");
		
	 $res = $this->db->get()->result();
      //$res = $this->db->get('task_comments')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	function taskcomments($orderid)
    {
		
			$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
	   $this->db->where("user_id", $adminid);
	  $this->db->where("order_id", $orderid);
      $this->db->order_by("comment_id", "desc");
      $res = $this->db->get('task_comments')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }
	
	function filelisting($orderid)
    {
		
	   $this->db->where("order_id", $orderid);
      $this->db->order_by("file_id", "desc");
      $res = $this->db->get('task_files')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }

    function taskhistory($orderid)
    {
      $this->db->order_by("activity_id", "DESC");
      $this->db->where("order_id", $orderid);
      $res = $this->db->get('task_activity')->result();
		
		//echo $this->db->last_query();
		//exit;
        
       return $res;
    }


    function taskcommenthistory($commentid)
    {
        $this->db->where('comment_id',$commentid);		
        $query = $this->db->get('task_comments');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }


    function taskfilehistory($fileid)
    {
        $this->db->where('file_id',$fileid);		
        $query = $this->db->get('task_files');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function taskuserhistory($userid)
    {
        $this->db->where('id',$userid);		
        $query = $this->db->get('users');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }
	
	function checkcomments($commentid)
    {
        $this->db->where('comment_id',$commentid);		
        $query = $this->db->get('task_comments');
		
		$res=$query->num_rows();
		
		//echo $this->db->last_query();
        return $res;
    }
	
    function getorderdetails($ordid)
    {
        $this->db->select('*');	
        $this->db->from('orders');
		$this->db->join('order_item', 'order_item.order_id = orders.order_id');
		 $this->db->where('orders.order_id',$ordid);
		
		$res=$this->db->get()->result_array();
		
        return $res;
    }
	
	
	function taskstatus($orderid)
    {
        $this->db->where('order_id',$orderid);		
        $query = $this->db->get('order_tasks');
		
		$res=$query->row_array();
		
		//echo $this->db->last_query();
        return $res;
    }

    function deletetask($task_id)
    {
        
        $this->db->where('task_id', $task_id);
        $this->db->delete('order_tasks');
      // redirect('task');
    }
    

 }
?>